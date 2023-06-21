@extends('layouts.user.main')

@section('title', 'Kategori')

@section('search')
    <div class="search-element">
        <input id="kategori" type="hidden" class="form-control" name="idBuku" value="{{ $category }}">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" name="search"
            id="search">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        {{-- <div class="search-backdrop"></div> --}}
        {{-- <div class="search-result">
            <div class="search-header">
                Histories
            </div>
            <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
            <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
            <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
            <div class="search-header">
                Result
            </div>
            <div class="search-item">
                <a href="#">
                    <img class="mr-3 rounded" width="30" src="{{ asset('/') }}assets/img/products/product-3-50.png"
                        alt="product">
                    oPhone S9 Limited Edition
                </a>
            </div>
            <div class="search-item">
                <a href="#">
                    <img class="mr-3 rounded" width="30" src="{{ asset('/') }}assets/img/products/product-2-50.png"
                        alt="product">
                    Drone X2 New Gen-7
                </a>
            </div>
            <div class="search-item">
                <a href="#">
                    <img class="mr-3 rounded" width="30" src="{{ asset('/') }}assets/img/products/product-1-50.png"
                        alt="product">
                    Headphone Blitz
                </a>
            </div>
            <div class="search-header">
                Projects
            </div>
            <div class="search-item">
                <a href="#">
                    <div class="search-icon bg-danger text-white mr-3">
                        <i class="fas fa-code"></i>
                    </div>
                    Stisla Admin Template
                </a>
            </div>
            <div class="search-item">
                <a href="#">
                    <div class="search-icon bg-primary text-white mr-3">
                        <i class="fas fa-laptop"></i>
                    </div>
                    Create a new Homepage Design
                </a>
            </div>
        </div> --}}
    </div>
@endsection

@section('content')
    <div class="section-body">
        <div class="row" id="items">
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
                                {{ \Illuminate\Support\Str::limit($book->judulBuku, 17, ' ...') }}
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val();
                var kategori = $('#kategori').val();
                $.ajax({
                    type: "get",
                    url: "/category/" + kategori,
                    data: {
                        'search': value
                    },
                    success: function(data) {
                        $('#items').html(data);
                    }
                });
            });
        });
    </script>

@endsection
