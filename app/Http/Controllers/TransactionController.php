<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('book', 'user')->get();
        return view('admin.peminjamanBuku', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transaction::find($id)->delete();
        return redirect()->route('transactions.index');
    }

    public function borrowedTransaction(string $id)
    {
        Transaction::find($id)->update(['status' => 'borrowed']);
        return redirect()->route('transactions.index');
    }

    public function returnedTransaction(string $id)
    {
        $tanggalSekarang = Carbon::now();
        $date = Transaction::find($id);

        // Tanggal yang ditentukan
        $tanggalTertentu = Carbon::create($date->tglKembali);

        // Menghitung selisih hari
        $selisih = $tanggalSekarang->day - $tanggalTertentu->day;
        if ($selisih > 0) {
            $denda = $selisih * 10000;
            Transaction::find($id)->update([
                'status' => 'returned',
                'denda' => $denda
            ]);
            $jumlahBuku = Book::find($date->book_id)->jumlahBuku + 1;
            Book::find($date->book_id)->update(['jumlahBuku' => $jumlahBuku]);
        } else {
            Transaction::find($id)->update([
                'status' => 'returned'
            ]);
            $jumlahBuku = Book::find($date->book_id)->jumlahBuku + 1;
            Book::find($date->book_id)->update(['jumlahBuku' => $jumlahBuku]);
        }
        return redirect()->route('transactions.index');
    }

    public function cetakData()
    {
        $transactions = Transaction::with('book', 'user')->get();
        return view('admin.cetakDataTransaksi', ['transactions' => $transactions]);
    }
}
