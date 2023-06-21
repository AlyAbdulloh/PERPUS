@extends('layouts.user.main')

@section('title', 'Booking')

@section('content')
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card card-primary">
                    <div class="card-body">
                        <form method="POST" action="{{ route('bookingBook') }}">
                            @csrf
                            <div class="form-group d-none">
                                <label for="idBuku">Id</label>
                                <input id="idBuku" type="hidden" class="form-control" name="idBuku"
                                    value="{{ $book->id }}">
                            </div>
                            <div class="form-group">
                                <label for="judulBuku">Judul</label>
                                <input id="judulBuku" type="text" class="form-control" disabled
                                    value="{{ $book->judulBuku }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="tglPinjam">Tgl Pinjam</label>
                                    <input id="tglPinjam" type="date" class="form-control" name="tglPinjam">
                                </div>
                                <div class="form-group col-6">
                                    <label for="tglKembali">Tgl Kembali</label>
                                    <input id="tglKembali" type="date" class="form-control" name="tglKembali">
                                </div>
                            </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                        <a class="btn btn-primary" href="{{ route('bookDetail', $book->id) }}">Back</a></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
