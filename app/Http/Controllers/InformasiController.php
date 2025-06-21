<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;


class InformasiController extends Controller
{
    public function index()
    {
        $events = Event::All();
        return view('pages.admin_management_information', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required',
            'tanggal' => 'required|date'
        ]);

        // Format tanggal dari d/m/Y ke Y-m-d
        $formattedDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d');

        $imagePath = $request->file('image1')->store('event_images', 'public');

        Event::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'image1' => $imagePath,
            'link' => $request->link,
            'tanggal' => $formattedDate  // Gunakan tanggal yang sudah diformat
        ]);

        return redirect()->route('pages.admin_management_information')->with('success', ['message' => 'Event berhasil ditambahkan!']);
    }

    // app/Http/Controllers/EventController.php

    public function eventsThisWeek()
    {
        $events = Event::whereBetween('tanggal', [
            now()->startOfWeek(),  // Senin minggu ini
            now()->endOfWeek()     // Minggu minggu ini
        ])->get();

        return view('events.this_week', compact('events'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'tanggal' => 'required|date'
        ]);

        $event->update = ([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'tanggal' => $request->tanggal
        ]);

        if ($request->hasFile('image1')) {
            $imagePath = $request->file('image1')->store('event_images', 'public');
            $data['image1'] = $imagePath;
        }

        $event->update($data);

        return redirect()->back()->with('success', ['message' => 'Event berhasil diupdate!']);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', ['message' => 'Event berhasil dihapus!']);
    }
}
