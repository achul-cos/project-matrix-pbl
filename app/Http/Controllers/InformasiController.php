<?php

namespace App\Http\Controllers;


use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use App\Models\Product;


class InformasiController extends Controller
{
    public function index()
    {
        $events = Event::All();
        return view('pages.admin_management_information', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|string|max:191',
            'tanggal' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        // simpan file kalau ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('event_images', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        Event::create($validated);

        return redirect()->back()->with('success', 'Event berhasil disimpan!');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'deskripsi' => 'required',
    //         'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'link' => 'required',
    //         'tanggal' => 'required|date'
    //     ]);

    //     // Format tanggal dari d/m/Y ke Y-m-d
    //     $formattedDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d');

    //     $imagePath = $request->file('photo')->store('event_images', 'public');

    //     Event::create([
    //         'name' => $request->name,
    //         'deskripsi' => $request->deskripsi,
    //         'photo' => $imagePath,
    //         'link' => $request->link,
    //         'tanggal' => $formattedDate  // Gunakan tanggal yang sudah diformat
    //     ]);

    //     return redirect()->route('pages.admin_management_information')->with('success', ['message' => 'Event berhasil ditambahkan!']);
    // }

    // app/Http/Controllers/EventController.php

    public function eventsThisWeek()
    {
        $events = Event::whereBetween('tanggal', [
            now()->startOfWeek(),  // Senin minggu ini
            now()->endOfWeek()     // Minggu minggu ini
        ])->get();

        return view('events.this_week', compact('events'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'deskripsi' => 'required',
            'link' => 'required|string|max:191',
            'tanggal' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // kalau user upload gambar baru
        if ($request->hasFile('image')) {
            // hapus gambar lama (opsional)
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }

            // simpan gambar baru ke folder
            $path = $request->file('image')->store('event_images', 'public');
            $validated['image'] = 'storage/' . $path; // ini penting! 👈
        } else {
            // kalau gak upload, pakai gambar lama
            $validated['image'] = $event->image;
        }

        $event->update($validated);

        return redirect()->back()->with('success', 'Event berhasil diupdate!');
    }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Hapus gambar jika ada
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event berhasil dihapus!');
    }
}
