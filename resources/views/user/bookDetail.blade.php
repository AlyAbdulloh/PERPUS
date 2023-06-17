@extends('layouts.user.main')

@section('title', 'Deatil buku')

@section('content')
    <div class="section-body">
        <div class="card p-3">
            <div class="row">
                <div class="col-2">
                    <div style="overflow: hidden; position: relative; height: 200px;">
                        <img alt="image" src="{{ asset('storage/' . $book->gambar) }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="height: 200px">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row " style="font-size: 15px">
                                        <div class="col-2">Judul</div>
                                        <div class="col-10">{{ $book->judulBuku }}</div>
                                        <div class="col-2">Pengarang</div>
                                        <div class="col-10">{{ $book->pengarang }}</div>
                                        <div class="col-2">Penerbit</div>
                                        <div class="col-10">{{ $book->penerbit }}</div>
                                        <div class="col-2">Kategori</div>
                                        <div class="col-10">{{ $book->kategori }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Sinopsis</h4>
                                    <div class="card-header-action">
                                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                                class="fas fa-minus"></i></a>
                                    </div>
                                </div>
                                <div class="collapse show" id="mycard-collapse">
                                    <div class="card-body">
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                        You can show or hide this card.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-12">
                    <div class="card" style="background: rgba(0, 0, 0, 0.05); border-radius: 10px">
                        <div class="card-header">
                            <h4>Sinopsis</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                        class="fas fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="collapse show" id="mycard-collapse">
                            <div class="card-body">
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                                You can show or hide this card.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card chat-box card-success" id="mychatbox2">
                <div class="card-header">
                    <h4>Komentar</h4>
                </div>
                <div class="card-body chat-content">
                    <div class="row mb-3">
                        <div class="col-1">
                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle"
                                width="55" data-toggle="tooltip" title="Wildan Ahdian">
                        </div>
                        <div class="col-10">
                            <p style="margin-bottom: 1px; font-weight: bold">Anda<span style="font-weight: lighter"> 23 jam
                                    yang
                                    lalu</span></p>
                            <p style="line-height: 20px">tolong tolongtolongtolongtolongtolongtolongtolongtolong
                                tolongtolongtolongtolong </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer chat-form">
                    <form id="chat-form2">
                        <input type="text" class="form-control" placeholder="Tambahkan komentar...">
                        <button class="btn btn-primary">
                            <i class="far fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="card chat-box card-success" id="mychatbox2">
            <div class="card-header">
                <h4>Komentar</h4>
            </div>
            <div class="card-body chat-content">
                <div class="row mb-3">
                    <div class="col-1">
                        <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="55"
                            data-toggle="tooltip" title="Wildan Ahdian">
                    </div>
                    <div class="col-10">
                        <p style="margin-bottom: 1px; font-weight: bold">Anda<span style="font-weight: lighter"> 23 jam yang
                                lalu</span></p>
                        <p style="line-height: 20px">tolong tolongtolongtolongtolongtolongtolongtolongtolong
                            tolongtolongtolongtolong </p>
                    </div>
                </div>
            </div>
            <div class="card-footer chat-form">
                <form id="chat-form2">
                    <input type="text" class="form-control" placeholder="Tambahkan komentar...">
                    <button class="btn btn-primary">
                        <i class="far fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div> --}}
    </div>
@endsection
