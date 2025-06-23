<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSuggest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuggestExport;

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

        $kritik = $query->orderBy('created_at', 'desc')->get();
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

        return redirect()->route('suggest.index')->with('success', 'Kritik berhasil dihapus.');
    }

    public function clear()
{
    UserSuggest::truncate(); // Menghapus semua data di tabel user_suggest
    return redirect()->route('suggest.index')->with('success', 'Semua kritik berhasil dihapus.');}

    public function export()
    {
        return Excel::download(new SuggestExport, 'data_kritik_matrix.xlsx');
    }
}
