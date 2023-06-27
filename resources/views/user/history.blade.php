@extends('layouts.user.main')

@section('title', 'History')

@section('content')
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                            aria-controls="all" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="borrowed-tab" data-toggle="tab" href="#borrowed" role="tab"
                            aria-controls="borrowed" aria-selected="false">Borrowed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="returned-tab" data-toggle="tab" href="#returned" role="tab"
                            aria-controls="returned" aria-selected="false">Returned</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="row mt-3">
                            @if ($count == 0)
                                <div class="col-12 text-center">
                                    <h4>Belum ada transaksi</h4>
                                </div>
                            @endif
                            @foreach ($transactions as $item)
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex" style="padding: 20px 10px;">
                                            <img alt="image" src="{{ asset('storage/' . $item->book->gambar) }}"
                                                class="img-fluid mr-2" width="70">
                                            <div class="d-flex flex-column justify-content-around">
                                                <div style="font-size: 20px; font-weight: bold">{{ $item->book->judulBuku }}
                                                </div>
                                                <div class="{{ $item->denda > 0 ? 'text-danger' : '' }}">
                                                    {{ $item->tglPinjam . ' - ' . $item->tglKembali }}</div>
                                                <div>{{ $item->status }}</div>
                                            </div>
                                        </div>
                                        <div class="card-footer" style="background: #DDE6ED; padding: 15px">
                                            <a href="" class="btn btn-info">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="borrowed" role="tabpanel" aria-labelledby="borrowed-tab">
                        <div class="row mt-3">
                            @if ($count == 0)
                                <div class="col-12 text-center">
                                    <h4>Belum ada transaksi</h4>
                                </div>
                            @endif
                            @foreach ($transactions as $item)
                                @if ($item->status == 'borrowed')
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body d-flex" style="padding: 20px 10px">
                                                <img alt="image" src="{{ asset('storage/' . $item->book->gambar) }}"
                                                    class="img-fluid mr-2" width="70">
                                                <div class="d-flex flex-column justify-content-around">
                                                    <div style="font-size: 20px">{{ $item->book->judulBuku }}</div>
                                                    <div>{{ $item->tglPinjam . ' - ' . $item->tglKembali }}</div>
                                                </div>
                                            </div>
                                            <div class="card-footer" style="background: #DDE6ED; padding: 15px">
                                                <a href="" class="btn btn-info">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-12 text-center">
                                        <h4>Belum ada transaksi</h4>
                                    </div>
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="returned" role="tabpanel" aria-labelledby="returned-tab">
                    <div class="row mt-3">
                        @if ($count == 0)
                            <div class="col-12 text-center">
                                <h4>Belum ada transaksi</h4>
                            </div>
                        @endif
                        @foreach ($transactions as $item)
                            @if ($item->status == 'returned')
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex" style="padding: 20px 10px">
                                            <img alt="image" src="{{ asset('storage/' . $item->book->gambar) }}"
                                                class="img-fluid mr-2" width="70">
                                            <div class="d-flex flex-column justify-content-around">
                                                <div style="font-size: 20px">{{ $item->book->judulBuku }}</div>
                                                <div class="{{ $item->denda > 0 ? 'text-danger' : '' }}">
                                                    {{ $item->tglPinjam . ' - ' . $item->tglKembali }}</div>
                                            </div>
                                        </div>
                                        <div class="card-footer" style="background: #DDE6ED; padding: 15px">
                                            <a href="" class="btn btn-info">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 text-center">
                                    <h4>Belum ada transaksi</h4>
                                </div>
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
