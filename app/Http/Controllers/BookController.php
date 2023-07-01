<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use App\Imports\BooksImport;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('judulBuku', 'asc')->get();
        return view('admin.buku', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addBook');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judulBuku' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required',
            'jumlahBuku' => 'required|integer|min:1',
            'gambar' => 'required|mimes:jpg,png,jpeg',
            'sinopsis' => 'required'
        ]);

        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gambarBuku');
            $validateData['gambar'] = $gambar;
        } else {
            dd('kosong');
        }

        Book::create($validateData);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
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
        $book = Book::find($id);
        return view('admin.editBook', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->file('gambar')) {
            $validateData = $request->validate([
                'judulBuku' => 'required',
                'penerbit' => 'required',
                'pengarang' => 'required',
                'kategori' => 'required',
                'jumlahBuku' => 'required|integer|min:1',
                'gambar' => 'required|mimes:jpg,png,jpeg',
                'sinopsis' => 'required'
            ]);

            $bks = Book::find($id);

            if ($bks->gambar != null) {
                Storage::disk('public')->delete($bks->gambar);
            }

            $gambar = $request->file('gambar')->store('gambarBuku');
            $validateData['gambar'] = $gambar;

            Book::find($id)->update($validateData);
        } else {
            $validateData = $request->validate([
                'judulBuku' => 'required',
                'penerbit' => 'required',
                'pengarang' => 'required',
                'kategori' => 'required',
                'jumlahBuku' => 'required|integer|min:1',
                'sinopsis' => 'required'
            ]);

            Book::find($id)->update($validateData);
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bks = Book::find($id);

        //delete image in public
        if ($bks->gambar != null) {
            Storage::disk('public')->delete($bks->gambar);
        }

        // show message when book status is booked or borrowede
        $transactsions = Transaction::where('book_id', $id)
            ->where('status', 'booked')
            ->orWhere('status', 'borrowed')
            ->get();

        if ($transactsions->count() >= 1) {
            return redirect()->route('books.index')->with('fail', 'Status buku masih dipinjam atau dipesan');
        } else {
            Transaction::where('book_id', $id)->delete();
        }

        //delete comments
        $commnets = Comment::where('book_id', $id)->get();
        if ($commnets->count() >= 1) {
            Comment::where('book_id', $id)->delete();
        }

        //delete book
        Book::find($id)->delete();

        return redirect()->route('books.index');
    }

    public function cetakData()
    {
        $books = Book::all();
        return view('admin.cetakDataBuku', ['books' => $books]);
    }

    public function export()
    {
        return Excel::download(new BooksExport, 'books-' . Carbon::now()->timestamp . '.xlsx');
    }

    public function import()
    {
        Excel::import(new BooksImport, request()->file('file'));

        return redirect()->route('books.index')->with('success', 'Berhasil mengimport data buku');
    }
}
