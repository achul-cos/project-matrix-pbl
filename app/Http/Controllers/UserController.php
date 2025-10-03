<?php


namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\TopupReport;


class UserController extends Controller
{
    public function updateAccount(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:15',
        ]);


        // Ambil user yang sedang login
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;


        $user->save();


        return redirect()->back()->with('success', 'Informasi akun berhasil diperbarui!');
    }
    public function readUserManagement()
    {
        $users = User::latest()->get();


        // Transformasi Collection langsung
        $users->transform(function ($user) {
            $user->formatted_last_online = $user->last_online
                ? Carbon::parse($user->last_online)->translatedFormat('l, d F Y, h.i.s A')
                : '-';


            return $user;
        });


        return view('pages.admin_management_account', compact('users'));
    }
    public function simpanUserAdmin(Request $request)
    {
        $guestEmail = 'guest@matrix.com';
        $guestPhone = '1234567890';


        // Validasi umum
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',    // huruf kecil
                'regex:/[A-Z]/',    // huruf besar
                'regex:/[0-9]/',    // angka
                'confirmed',
            ],
        ];


        // Validasi email jika bukan guest
        if ($request->email !== $guestEmail) {
            $rules['email'] = 'required|email|unique:users,email';
        } else {
            $rules['email'] = 'required|email';
        }


        // Validasi phone jika bukan guest
        if ($request->phone !== $guestPhone) {
            $rules['phone'] = 'required|string|max:15|unique:users,phone';
        } else {
            $rules['phone'] = 'required|string|max:15';
        }


        $messages = [
            'password.regex' => 'Password harus mengandung minimal 1 huruf besar, 1 huruf kecil dan 1 angka.',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            // Ambil semua pesan error
            $errorMessages = $validator->errors()->all();


            // Gabungkan jadi satu string (atau bisa juga array kalau kamu ingin tampilkan banyak toast)
            $combinedErrors = implode(', ', $errorMessages);


            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error.message', $combinedErrors);
        }


        // Proses gambar jika ada
        $photoPath = null;
        if ($request->has('cropped_image') && $request->cropped_image) {
            $croppedImage = $request->cropped_image;


            // Pisahkan tipe dan base64
            [$type, $data] = explode(';', $croppedImage);
            [$prefix, $base64] = explode(',', $data);


            $imageData = base64_decode($base64);
            $extension = explode('/', mime_content_type($croppedImage))[1] ?? 'png';
            $filename = uniqid() . '.' . $extension;
            $path = 'profile_photos/' . $filename;


            Storage::disk('public')->put($path, $imageData);


            $photoPath = $path;
        }


        // Simpan user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'photo' => $photoPath,
            'token' => 0,
        ]);


        return redirect()->back()->with('success.message', 'Pengguna berhasil didaftarkan!');
    }
    public function ban($id)
    {
        $user = User::findOrFail($id);
        $user->is_block = true;
        $user->save();


        return back()->with('success', 'Akun telah berhasil diblokir.');
    }
    public function unban($id)
    {
        $user = User::findOrFail($id);
        $user->is_block = false;
        $user->save();


        return back()->with('success', 'Akun berhasil diaktifkan kembali.');
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'password' => 'nullable|confirmed|min:8',
        ]);


        $user->update([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);


        // Kalau password diisi, update password
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
            $user->save();
        }


        return back()->with('success', 'Data user berhasil diperbarui');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);


        // Jika ada file foto, hapus juga dari storage (opsional)
        if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
            unlink(storage_path('app/public/' . $user->photo));
        }


        $user->delete();


        return redirect()->back()->with('success', 'Akun berhasil dihapus.');
    }
    public function deleteAllUsers()
    {
        try {
            DB::beginTransaction();


            // Ambil semua user KECUALI yang sedang
            $users = User::where('id', '!=', Auth::user()->id)->get();


            foreach ($users as $user) {
                // Jika user punya foto, hapus dari storage
                if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
                    unlink(storage_path('app/public/' . $user->photo));
                }


                $user->delete();
            }


            // Reset ID auto increment
            DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');


            DB::commit();


            return redirect()->back()->with('success', 'Semua akun pengguna berhasil dihapus (kecuali akun Anda).');
        } catch (\Exception $e) {
            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }
            Log::error('Gagal menghapus semua user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus semua user: ' . $e->getMessage());
        }
    }
    public function showRiwayat()
    {
        /** @var \App\Models\User $user */
        $user = auth()->guard()->user();
        $riwayats = TopupReport::where('user_id', $user->id)->latest()->get();

        return view('user.topup-riwayat', compact('riwayats'));
    }
}
