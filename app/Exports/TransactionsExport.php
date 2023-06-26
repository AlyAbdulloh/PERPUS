<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaction::select('id', 'user_id', 'book_id', 'tglPinjam', 'tglKembali', 'status', 'denda')->get();
    }

    public function headings(): array
    {
        return ['id', 'user_id', 'book_id', 'tglPinjam', 'tglKembali', 'status', 'denda'];
    }
}
