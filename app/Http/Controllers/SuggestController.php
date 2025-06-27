<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSuggest;
use App\Exports\SuggestExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;



class SuggestController extends Controller
{

    public function index(Request $request)
    {
        $query = UserSuggest::query();

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $kritik = $query->orderBy('id', 'desc')->get();
        return view('pages.admin_saran_kritik', compact('kritik'));
    }

    public function store(Request $request)
    {
        $request->validate(['message' => 'required|string|max:500']);

        UserSuggest::create(['message' => $request->message]);

        return redirect()->back()->with('success', 'Terima kasih atas kritik dan saran Anda!');
    }

    public function destroy($id)
    {
        $kritik = UserSuggest::findOrFail($id);
        $kritik->delete();

        return redirect()->route('admin.management_kritik')->with('sukses', 'Kritik berhasil dihapus.');
    }

    public function clear()
    {
        UserSuggest::truncate(); // Menghapus semua data di tabel user_suggest

        return redirect()->route('admin.management_kritik')->with('sukses', 'Semua kritik berhasil dihapus.');
    }

    public function export(Request $request)
    {
    $query = UserSuggest::query();

    if ($request->filled('from')) {
        $query->whereDate('created_at', '>=', $request->from);
    }

    if ($request->filled('to')) {
        $query->whereDate('created_at', '<=', $request->to);
    }

    $data = $query->select('id', 'message', 'created_at')->get();

    return Excel::download(new \App\Exports\SuggestExportFiltered($data), 'data_kritik_matrix_filtered.xlsx');
    }

    // public function exportPdf(Request $request)
    // {
    // $query = \App\Models\UserSuggest::query();

    // if ($request->filled('from')) {
    //     $query->whereDate('created_at', '>=', $request->from);
    // }

    // if ($request->filled('to')) {
    //     $query->whereDate('created_at', '<=', $request->to);
    // }

    // $kritik = $query->orderBy('created_at', 'desc')->get();

    // $pdf = Pdf::loadView('pdf.kritik_saran', compact('kritik'));
    // return $pdf->download('kritik_saran_matrix.pdf');
    // }


    public function exportPdf()
    {
    $kritik = \App\Models\UserSuggest::orderBy('created_at', 'desc')->get();

    $html = '
        <h2 style="font-family: sans-serif;">Laporan Kritik & Saran</h2>
        <table width="100%" style="border-collapse: collapse; font-family: sans-serif; font-size: 12px;">
            <thead>
                <tr>
                    <th style="border:1px solid #ccc; padding:6px;">No</th>
                    <th style="border:1px solid #ccc; padding:6px;">Pesan</th>
                    <th style="border:1px solid #ccc; padding:6px;">Tanggal</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($kritik as $index => $item) {
        $html .= '
            <tr>
                <td style="border:1px solid #ccc; padding:6px;">' . ($index + 1) . '</td>
                <td style="border:1px solid #ccc; padding:6px;">' . htmlspecialchars($item->message) . '</td>
                <td style="border:1px solid #ccc; padding:6px;">' . $item->created_at->format('d M Y, H:i') . '</td>
            </tr>';
    }

    $html .= '
            </tbody>
        </table>';

    $pdf = Pdf::loadHTML($html);
    return $pdf->download('kritik_saran_matrix.pdf');
    }

}

