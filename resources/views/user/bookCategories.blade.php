@extends('layouts.user.main')

@section('title', 'Kategori')

@section('content')
    <div class="section-body">
        <div class="row">
            @if ($count > 0)
                @foreach ($books as $book)
                    <div class="col-2">
                        <div class="card text-center" style="padding: 10px">
                            <a href="{{ route('bookDetail', $book->id) }}">
                                <div style="overflow: hidden; position: relative; height: 180px;">
                                    <img alt="image" src="{{ asset('storage/' . $book->gambar) }}" class="img-fluid">
                                </div>
                            </a>
                            <div class="card-body" style="padding: 1px; padding-top: 5px">
                                {{ $book->judulBuku }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if ($count == 0)
            <div class="section-header" style="display: flex; justify-content: center">
                <h1>Belum Ada Buku</h1>
            </div>
        @endif
    </div>
@endsection
