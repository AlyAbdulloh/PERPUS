@extends('layouts.admin.main')

@section('title', 'Buku')

@section('page', 'Data Buku')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            @if (session()->has('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('fail') }}</strong>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
                    <div class="d-flex justify-content-between" style="gap: 5px;">
                        <form action="{{ route('books.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" style="width: 210px" id="import">
                            <button class="btn btn-info from-control" type="submit" id="btn" disabled>Import
                                Data</button>
                            <a href="{{ route('books.export') }}" class="btn btn-success"><i class="fas fa-print"></i>
                                Export Exel</a>
                            <a href="{{ route('books.print') }}" class="btn btn-danger" target="_blank"><i
                                    class="fas fa-print"></i>
                                Cetak
                                Pdf</a>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th width="150px">
                                        Judul Buku
                                    </th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Buku</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>
                                            {{ $book->judulBuku }}
                                        </td>
                                        <td>{{ $book->penerbit }}</td>
                                        <td>{{ $book->pengarang }}</td>
                                        <td>{{ $book->kategori }}</td>
                                        <td>{{ $book->jumlahBuku }}</td>
                                        <td>
                                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="" class="btn btn-secondary">Detail</a>
                                                <a href="{{ route('books.edit', $book->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#import').on("change", function() {
                if ($('#import').val() == '') {
                    $("#btn").prop("disabled", true);
                } else {
                    $("#btn").removeAttr("disabled");
                }
            });
        });
    </script>
@endsection
