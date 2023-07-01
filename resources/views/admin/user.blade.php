@extends('layouts.admin.main')

@section('title', 'User')

@section('page', 'User')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data User</h4>
                    <form class="d-flex" role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            style="border-radius: 5px; margin-right: 3px" name="search" id="search">
                        <button class="btn btn-outline-info" type="submit" style="border-radius: 5px"><i
                                class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="card-body" id="table-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <a href="" class="btn btn-danger delete-user"
                                            data-id="{{ $user->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
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
            $("#search").on('keyup', function(e) {
                e.preventDefault();
                var val = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/users",
                    data: {
                        'val': val
                    },
                    success: function(data) {
                        $('#table-data').html(data);
                    }
                });
            })
        });

        //delete user
        $(document).on('click', '.delete-user', function(e) {
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "users/" + id,
                success: function(data) {
                    $('#table-data').html(data);
                }
            });
        });
    </script>
@endsection
