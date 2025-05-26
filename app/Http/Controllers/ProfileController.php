<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'cropped_image' => 'required',
        ]);

        $user = Auth::user();

        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $imageData = $request->input('cropped_image');
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        $filename = 'profile_photos/' . uniqid() . '.jpg';

        Storage::disk('public')->put($filename, $image);

        $user->photo = $filename;
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
