<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('pages.admin_management_information', compact('events'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:191',
        'deskripsi' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'link' => 'required|string|max:191',
        'tanggal' => 'required|date',
        'status' => 'required|in:aktif,tidak aktif',
    ]);

    try {
        $file = $request->file('image');
        $filename = time().'_'.str_replace(' ', '_', $file->getClientOriginalName());
        $destinationPath = public_path('event_images');

        // Pastikan folder ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Debug: Log sebelum move
        \Log::info("Mencoba menyimpan file: {$destinationPath}/{$filename}");

        $file->move($destinationPath, $filename);

        // Debug: Verifikasi file ada
        if (!file_exists($destinationPath.'/'.$filename)) {
            \Log::error("File tidak tersimpan: {$destinationPath}/{$filename}");
            throw new \Exception("Gagal menyimpan file gambar");
        } else {
            \Log::info("File berhasil disimpan: ".filesize($destinationPath.'/'.$filename)." bytes");
        }

        $imagePath = 'event_images/'.$filename;

        Event::create([
            'name' => $validated['name'],
            'deskripsi' => $validated['deskripsi'],
            'image' => $imagePath,
            'link' => $validated['link'],
            'tanggal' => $validated['tanggal'],
            'status' => $validated['status']
        ]);

        // Debug: Path yang disimpan di database
        \Log::info("Path gambar disimpan di database: {$imagePath}");

        return redirect()->route('admin.management.information')->with('success', 'Event berhasil ditambahkan!');

    } catch (\Exception $e) {
        \Log::error("Error creating event: ".$e->getMessage());
        return redirect()->back()
                       ->with('error', 'Gagal menambahkan event: '.$e->getMessage())
                       ->withInput();
    }
}

    public function eventsThisWeek()
    {
        $events = Event::whereBetween('tanggal', [
            now()->startOfWeek(),
            now()->endOfWeek()
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

        try {
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($event->image && file_exists(public_path($event->image))) {
                    unlink(public_path($event->image));
                }

                $file = $request->file('image');
                $filename = time().'_'.$file->getClientOriginalName();
                $destinationPath = public_path('event_images');
                $file->move($destinationPath, $filename);

                $validated['image'] = 'event_images/'.$filename;

                // Verifikasi file baru
                if (!file_exists($destinationPath.'/'.$filename)) {
                    Log::error("Gagal menyimpan file baru: {$destinationPath}/{$filename}");
                    throw new \Exception("Gagal menyimpan file gambar baru");
                }
            } else {
                $validated['image'] = $event->image;
            }

            $event->update($validated);
            Log::info("Event updated successfully. ID: {$id}");
            return redirect()->back()->with('success', 'Event berhasil diupdate!');

        } catch (\Exception $e) {
            Log::error("Error updating event ID {$id}: ".$e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate event: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        try {
            // Hapus gambar jika ada
            if ($event->image && file_exists(public_path($event->image))) {
                if (!unlink(public_path($event->image))) {
                    Log::error("Gagal menghapus file: ".public_path($event->image));
                }
            }

            $event->delete();
            Log::info("Event deleted successfully. ID: {$id}");
            return redirect()->back()->with('success', 'Event berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error("Error deleting event ID {$id}: ".$e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus event: '.$e->getMessage());
        }
    }
}
