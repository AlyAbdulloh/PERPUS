<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserNewController extends Controller
{
    public function home()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('user.home', ['books' => $books]);
    }

    public function bookCategories(Request $request, string $kategori)
    {
        if ($request->ajax()) {
            $output = '';

            $books = Book::where('judulBuku', 'LIKE', '%' . $request->search . '%')
                ->where('kategori', $kategori)
                ->get();

            if ($books->count() >= 1) {
                foreach ($books as $book) {

                    $output .=
                        '<div class="col-2">
                            <div class="card text-center" style="padding: 10px">
                                <a href="' . route('bookDetail', $book->id) . '">
                                    <div style="overflow: hidden; position: relative; height: 180px;">
                                        <img alt="image" src="' . asset('storage/' . $book->gambar) . '" class="img-fluid">
                                    </div>
                                </a>
                                <div class="card-body" style="padding: 1px; padding-top: 5px">
                                    ' . \Illuminate\Support\Str::limit($book->judulBuku, 17, ' ...') . '
                                </div>
                            </div>
                        </div>
                    ';
                }
                return response()->json($output);
            } else {
                $output .=
                    '<div class="col-12 nofound">
                        <h1>Nothing found...</h1>        
                    </div>
                    ';
                return response()->json($output);
            }
        }
        $books = Book::where('kategori', $kategori)->get();
        $count = Book::where('kategori', $kategori)->count();
        return view('user.bookCategories', [
            'books' => $books,
            'count' => $count,
            'category' => $kategori
        ]);
    }

    public function bookDetail(int $id)
    {
        $book = Book::find($id);
        $bookedBook = 0;
        if (auth()->check()) {
            $bookedBook = Transaction::where('book_id', $id)
                ->where('user_id', auth()->user()->id)
                ->where('status', 'booked')
                ->count();
        }

        $comment = Book::find($id);

        return view('user.bookDetail', [
            'book' => $book,
            'booked' => $bookedBook,
            'comments' => $comment->UserKomentar
        ]);
    }

    public function showBookingForm(int $id)
    {
        $book = Book::find($id);
        return view('user.booking', ['book' => $book]);
    }

    public function bookingBook(Request $request)
    {
        Transaction::create([
            'user_id' => auth()->user()->id,
            'book_id' => $request->get('idBuku'),
            'tglPinjam' => $request->get('tglPinjam'),
            'tglKembali' => $request->get('tglKembali'),
            'status' => 'booked',
            'denda' => 0
        ]);

        $currStok = Book::find($request->get('idBuku'))->jumlahBuku;
        Book::find($request->get('idBuku'))->update(['jumlahBuku' => $currStok - 1]);

        return redirect()->route('bookDetail', $request->get('idBuku'));
    }

    public function komentar(Request $request, $id)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'book_id' => $id,
            'comment' => $request->get('komentar')
        ]);

        return redirect()->route('bookDetail', $id);
    }

    public function showHistory()
    {
        $transactions = Transaction::with('book', 'user')->where('user_id', auth()->user()->id)->get();
        $count = Transaction::where('user_id', auth()->user()->id)->count();
        return view('user.history', compact('transactions', 'count'));
    }
}
