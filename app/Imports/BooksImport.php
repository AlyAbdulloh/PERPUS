<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;

class BooksImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Book([
            'judulBuku' => $row['judulbuku'],
            'penerbit' => $row['penerbit'],
            'pengarang' => $row['pengarang'],
            'kategori' => $row['kategori'],
            'jumlahBuku' => $row['jumlahbuku'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
