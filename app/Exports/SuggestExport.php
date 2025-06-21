<?php 
namespace App\Exports;

use App\Models\UserSuggest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuggestExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return UserSuggest::select('id', 'message', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Pesan', 'Tanggal'];
    }
}

