@extends('layouts.admin.main')

@section('title', 'Peminjaman Buku')

@section('page', 'Data Peminjaman Buku')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Basic DataTables</h4>
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
                                <td>
                                    1
                                </td>
                                <td>Create a mobile app</td>
                                <td>Create a mobile app</td>
                                <td>Create a mobile app</td>
                                <td>Create a mobile app</td>
                                <td>Create a mobile app</td>
                                <td>
                                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle"
                                        width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning">Edit</a>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
