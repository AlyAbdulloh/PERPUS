<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('role', 'user')
                ->where('name', 'LIKE', '%' . $request->val . '%')
                ->paginate(5);


            if ($users->count() > 0) {
                return view('admin.pagination.paginate_user', compact('users'))->render();
            } else {
                return  response()->json(
                    '
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr class="text-center">
                                <td colspan="5">No matching records found</td>
                            </tr>
                        </tbody>
                    </table>
                    '
                );
            }
        } else {
            $users = User::where('role', 'user')->paginate(5);
            return view('admin.user', ['users' => $users]);
        }
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
        $commnets = Comment::where('user_id', $id)->get();
        if ($commnets->count() >= 1) {
            Comment::where('user_id', $id)->delete();
        }

        User::find($id)->delete();
        $users = User::where('role', 'user')
            ->paginate(5);
        return view('admin.pagination.paginate_user', compact('users'))->render();
        // return redirect()->route('users.index');
    }

    public function showDashboard()
    {
        $bulan = Carbon::now()->format('F');
        // $currentMonth = Carbon::now()->month;
        $totAdmin = User::where('role', 'administrator')->count();
        $totUser = User::where('role', 'user')->count();
        $totBuku = Book::all()->count();
        // $totTransaksi = Transaction::whereMonth('tglPinjam', $currentMonth)->count();

        $booked = Transaction::where('status', 'booked')->count();
        $borrowed = Transaction::where('status', 'borrowed')->count();
        $returned = Transaction::where('status', 'returned')->count();
        return view('admin.dashboard', compact(['totAdmin', 'totUser', 'totBuku', 'bulan', 'booked', 'borrowed', 'returned']));
    }
}
