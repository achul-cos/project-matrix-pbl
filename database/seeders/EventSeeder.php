<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'name' => 'Tournament Game Populer',
            'deskripsi' => 'Turnamen game 1 vs 1, Pemenang mendapatkan jam gratis di warnet.',
            'image' => 'storage/event_images/bola.webp',
            'link' => 'https://example.com/event/mlbb',
            'tanggal' => '2025-08-15',
            'status' => 'aktif',
        ]);

        Event::create([
            'name' => 'Night Gaming Marathon',
            'deskripsi' => 'Gaming dari malam sampai pagi (22.00-06.00).',
            'image' => 'storage/event_images/gaming_marathon.jpg',
            'link' => 'https://example.com/event/uiux',
            'tanggal' => '2025-08-01',
            'status' => 'aktif',
        ]);

        Event::create([
            'name' => 'Promo Bawa Teman',
            'deskripsi' => 'Bawa 2 Teman baru, dapat 1 jam gratis',
            'image' => 'storage/event_images/hari_game.png',
            'link' => 'https://example.com/event/laravel',
            'tanggal' => '2025-09-10',
            'status' => 'tidak aktif',
        ]);
        Event::create([
            'name' => 'Lucky Spin Mingguan',
            'deskripsi' => 'Setiap pengunjung yang main minimal 3 jam, dapat kupon spin.',
            'image' => 'storage/event_images/lucky_spin.webp',
            'link' => 'https://example.com/event/mlbb',
            'tanggal' => '2025-08-15',
            'status' => 'aktif',
        ]);

        Event::create([
            'name' => 'Event Mystery Box',
            'deskripsi' => 'Setiap top up 50 token, mendapatkan kesempatan ambil 1 mystery box',
            'image' => 'storage/event_images/mystery_box.webp',
            'link' => 'https://example.com/event/uiux',
            'tanggal' => '2025-08-01',
            'status' => 'aktif',
        ]);

        Event::create([
            'name' => 'Event Ranking Warnet Bulanan',
            'deskripsi' => 'Setiap main di warnet dapat poin berdasarkan durasi sewa.',
            'image' => 'storage/event_images/ranking_warnet.jpg',
            'link' => 'https://example.com/event/laravel',
            'tanggal' => '2025-09-10',
            'status' => 'tidak aktif',
        ]);
        Event::create([
            'name' => 'Turnamen 5 vs 5 Battle Mini',
            'deskripsi' => '8 tim, single elimination.',
            'image' => 'storage/event_images/5vs5-battle.webp',
            'link' => 'https://example.com/event/laravel',
            'tanggal' => '2025-09-10',
            'status' => 'tidak aktif',
        ]);
        Event::create([
            'name' => 'Event Malam Gaming',
            'deskripsi' => 'Begadang Battle. Jam 10 malam - 6 pagi.',
            'image' => 'storage/event_images/paket_malam.webp',
            'link' => 'https://example.com/event/mlbb',
            'tanggal' => '2025-08-15',
            'status' => 'aktif',
        ]);

        Event::create([
            'name' => 'Event Streamer Lokal',
            'deskripsi' => 'Undang Streamer lokal main di warnet.',
            'image' => 'storage/event_images/streaming.jpg',
            'link' => 'https://example.com/event/uiux',
            'tanggal' => '2025-08-01',
            'status' => 'aktif',
        ]);

        Event::create([
            'name' => 'Event Hari Libur Nasional',
            'deskripsi' => 'Hari libu nasional merupakan hari game matrix.',
            'image' => 'storage/event_images/hari_game.png',
            'link' => 'https://example.com/event/laravel',
            'tanggal' => '2025-09-10',
            'status' => 'tidak aktif',
        ]);
    }
}
