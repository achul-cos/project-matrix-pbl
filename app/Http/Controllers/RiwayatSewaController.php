<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatSewaController extends Controller
{
    public function index()
    {
        // Data dummy bisa kamu ganti dari database nantinya
        $riwayat = [
            [
                'kode' => 'A',
                'komputer' => 'PC Acer Aspire C3 - Core i7-3770 - Ram 8 GB',
                'ruangan' => 'Public Room 3',
                'durasi' => '1 Jam',
                'token' => 2,
                'tanggal' => '22 February 2025',
                'gambar' => '/api/placeholder/150/150',
                'label' => 'ACER ASPIRE C3',
            ],
            [
                'kode' => 'B',
                'komputer' => 'PC Dell Optiplex - Core i5-9400 - Ram 16 GB',
                'ruangan' => 'Private Room 2',
                'durasi' => '2 Jam',
                'token' => 3,
                'tanggal' => '18 February 2025',
                'gambar' => '/api/placeholder/150/150',
                'label' => 'DELL OPTIPLEX',
            ],
        ];

        return view('riwayat_sewa', compact('riwayat'));
    }
}
