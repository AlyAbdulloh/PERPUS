<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Book::select('judulBuku', 'penerbit', 'pengarang', 'kategori', 'jumlahBuku')->get();
    }

    public function headings(): array
    {
        return ['judulBuku', 'penerbit', 'pengarang', 'kategori', 'jumlahBuku'];
    }
}
