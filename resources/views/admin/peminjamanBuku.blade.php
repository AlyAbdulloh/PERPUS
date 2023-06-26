@extends('layouts.admin.main')

@section('title', 'Peminjaman Buku')

@section('page', 'Data Peminjaman Buku')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('transactions.print') }}" class="btn btn-danger" target="_blank"><i
                            class="fas fa-print"></i>
                        Cetak
                        Pdf</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Status</th>
                                    <th>Denda</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->book->judulBuku }}</td>
                                        <td>{{ $item->tglPinjam }}</td>
                                        <td>{{ $item->tglKembali }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->denda }}</td>
                                        @if ($item->status == 'booked')
                                            <td>
                                                <a href="{{ route('borrowed', $item->id) }}"
                                                    class="btn btn-primary">Borrowed</a>
                                            </td>
                                        @elseif($item->status == 'borrowed')
                                            <td>
                                                <a href="{{ route('returned', $item->id) }}"
                                                    class="btn btn-success">Returned</a>
                                            </td>
                                        @elseif($item->status == 'returned')
                                            <td>
                                                <form action="{{ route('transactions.destroy', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
