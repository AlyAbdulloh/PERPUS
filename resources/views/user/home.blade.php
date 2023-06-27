@extends('layouts.user.main')

@section('title', 'Home')

@section('content')
    {{-- <div class="section-header">
        <h1>Top Navigation</h1>
    </div> --}}
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel" style="flex: auto">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('/') }}assets/img/unsplash/iklan1.jpg"
                                alt="First slide" style="height: 500px">
                            {{-- <div class="carousel-caption d-none d-md-block">
                          <h5>Heading</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div> --}}
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/') }}assets/img/unsplash/iklan2.jpg"
                                alt="Second slide" style="height: 500px">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/') }}assets/img/unsplash/iklan3.jpg"
                                alt="Third slide" style="height: 500px">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($books as $book)
                <div class="col-2">
                    <div class="card text-center" style="padding: 10px">
                        <a href="{{ route('bookDetail', $book->id) }}">
                            <div style="overflow: hidden; position: relative; height: 180px;">
                                @if ($book->gambar != null)
                                    <img alt="image" src="{{ asset('storage/' . $book->gambar) }}" class="img-fluid">
                                @else
                                    <img alt="image" src="{{ asset('assets/img/products/book.png') }}" class="img-fluid">
                                @endif
                            </div>
                        </a>
                        <div class="card-body" style="padding: 1px; padding-top: 5px">
                            {{ \Illuminate\Support\Str::limit($book->judulBuku, 17, ' ...') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
