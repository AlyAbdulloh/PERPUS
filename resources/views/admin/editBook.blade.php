<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/components.css">

</head>

<body>
    <div class="content d-flex mt-4" style="height: 100vh">
        <div class="col-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Buku</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judulBuku">Judul</label>
                            <input id="judulBuku" type="text"
                                class="form-control @error('judulBuku') is-invalid @enderror" name="judulBuku"
                                value="{{ $book->judulBuku }}">
                            @error('judulBuku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="penerbit">Penerbit</label>
                                <input id="penerbit" type="text"
                                    class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                                    value="{{ $book->penerbit }}">
                                @error('penerbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="pengarang">Pengarang</label>
                                <input id="pengarang" type="text"
                                    class="form-control @error('pengarang') is-invalid @enderror" name="pengarang"
                                    value="{{ $book->pengarang }}">
                                @error('pengarang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="novel" {{ $book->kategori == 'novel' ? 'selected' : '' }}>novel</option>
                                <option value="biografi" {{ $book->kategori == 'biografi' ? 'selected' : '' }}>biografi
                                </option>
                                <option value="fiksi" {{ $book->kategori == 'fiksi' ? 'selected' : '' }}>fiksi
                                </option>
                                <option value="non-fiksi" {{ $book->kategori == 'non-fiksi' ? 'selected' : '' }}>
                                    non-fiksi</option>
                                <option value="sejarah" {{ $book->kategori == 'sejarah' ? 'selected' : '' }}>sejarah
                                </option>
                                <option value="agama" {{ $book->kategori == 'agama' ? 'selected' : '' }}>agama
                                </option>
                                <option value="komik" {{ $book->kategori == 'komik' ? 'selected' : '' }}>komik
                                </option>
                                <option value="ensiklopedia" {{ $book->kategori == 'ensiklopedia' ? 'selected' : '' }}>
                                    ensiklopedia</option>
                                <option value="kamus" {{ $book->kategori == 'kamus' ? 'selected' : '' }}>kamus
                                </option>
                                <option value="majalah" {{ $book->kategori == 'majalah' ? 'selected' : '' }}>majalah
                                </option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <label for="jumlahBuku">Jumlah</label>
                                <input id="jumlahBuku" type="number"
                                    class="form-control @error('jumlahBuku') is-invalid @enderror" name="jumlahBuku"
                                    value="{{ $book->jumlahBuku }}">
                                @error('jumlahBuku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="gambar">Gambar</label>
                                <input id="gambar" type="file"
                                    class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                                    value="{{ $book->gambar }}" accept="image/*">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-3">
                                <img width="100px" height="100px" src="{{ asset('storage/' . $book->gambar) }}"
                                    class="object-fit-cover">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" type="submit">Submit</button>
                            <button class="btn btn-danger mr-1" type="reset">Reset</button>
                            <a class="btn btn-primary" href="{{ route('books.index') }}">Back</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('/') }}assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('/') }}assets/js/scripts.js"></script>
    <script src="{{ asset('/') }}assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>
