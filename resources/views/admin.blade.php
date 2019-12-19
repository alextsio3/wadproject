@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="margin-top: 12px;" class="alert alert-success text-center">Admin Dashboard User list</h2><br>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    @foreach($users as $u_info)
                        <tr id="user_id_{{ $u_info->id }}">
                            <td>{{ $u_info->id  }}</td>
                            <td>{{ $u_info->name }}</td>
                            <td>{{ $u_info->email }}</td>
                            <td colspan="2">
                                <a href="javascript:void(0)" id="delete-user" data-id="{{ $u_info->id }}" class="btn btn-danger delete-user">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>


    @include('admin.UserScript')


@endsection
