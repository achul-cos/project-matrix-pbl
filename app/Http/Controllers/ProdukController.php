<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function show($id)
    {
        // Dummy data sementara
        $produk = [
            'id' => $id,
            'nama' => 'ASUS ROG A1',
            'merek' => 'ASUS',
            'processor' => 'AMD',
            'gpu' => 'RTX',
            'ram' => '8 GB',
            'ruangan' => 'PRIVATE ROOM',
            'lantai' => '1',
            'token' => '2 TOKEN / JAM',
            'review' => 'ASUS ROG A1 di sini bener-bener worth it! Performa mantap, nggak ada lag sama sekali. 3 token tapi serasa pake PC puluhan juta',
            'reviewer' => 'Ara gamers sejati',
        ];

        return view('produk.show', compact('produk'));
    }
}
