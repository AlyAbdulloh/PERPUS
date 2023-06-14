<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'judulBuku' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required',
            'jumlahBuku' => 'required|integer|min:1',
            'gambar' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gambarBuku');
        } else {
            dd('kosong');
        }

        Book::create([
            'judulBuku' => $request->get('judulBuku'),
            'penerbit' => $request->get('penerbit'),
            'pengarang' => $request->get('pengarang'),
            'kategori' => $request->get('kategori'),
            'jumlahBuku' => $request->get('jumlahBuku'),
            'gambar' => $gambar
        ]);

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
            $request->validate([
                'judulBuku' => 'required',
                'penerbit' => 'required',
                'pengarang' => 'required',
                'kategori' => 'required',
                'jumlahBuku' => 'required|integer|min:1',
                'gambar' => 'required|mimes:jpg,png,jpeg'
            ]);

            $bks = Book::find($id);

            Storage::disk('public')->delete($bks->gambar);

            $gambar = $request->file('gambar')->store('gambarBuku');

            Book::find($id)->update([
                'judulBuku' => $request->get('judulBuku'),
                'penerbit' => $request->get('penerbit'),
                'pengarang' => $request->get('pengarang'),
                'kategori' => $request->get('kategori'),
                'jumlahBuku' => $request->get('jumlahBuku'),
                'gambar' => $gambar
            ]);
        } else {
            $request->validate([
                'judulBuku' => 'required',
                'penerbit' => 'required',
                'pengarang' => 'required',
                'kategori' => 'required',
                'jumlahBuku' => 'required|integer|min:1',
            ]);

            Book::find($id)->update([
                'judulBuku' => $request->get('judulBuku'),
                'penerbit' => $request->get('penerbit'),
                'pengarang' => $request->get('pengarang'),
                'kategori' => $request->get('kategori'),
                'jumlahBuku' => $request->get('jumlahBuku')
            ]);
        }

        return redirect()->route('books.index')->with('updateSuccess', 'Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bks = Book::find($id);
        Storage::disk('public')->delete($bks->gambar);

        Book::find($id)->delete();

        return redirect()->route('books.index');
    }
}
