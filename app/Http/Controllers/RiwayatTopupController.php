<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatTopupController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // asumsi user login
        $topups = [
            [
                'tanggal' => '2025-03-05',
                'transaksi' => [
                    [
                        'nama' => 'Nabila',
                        'nomor_token' => '2790-167-35-9005-21',
                        'metode' => 'GoPay',
                        'tanggal' => 'Sabtu, 5 Maret 2025',
                        'nominal' => 9000,
                    ],
                ]
            ],
            [
                'tanggal' => '2025-03-04',
                'transaksi' => [
                    [
                        'nama' => 'Nabila',
                        'nomor_token' => '2790-120-35-0665-09',
                        'metode' => 'GoPay',
                        'tanggal' => 'Jumat, 4 Maret 2025',
                        'nominal' => 8000,
                    ],
                    [
                        'nama' => 'Nabila',
                        'nomor_token' => '2910-133-35-8005-03',
                        'metode' => 'DANA',
                        'tanggal' => 'Jumat, 4 Maret 2025',
                        'nominal' => 20000,
                    ],
                ]
            ],
        ];

        return view('riwayat_topup.index', compact('topups', 'user'));
    }
}
