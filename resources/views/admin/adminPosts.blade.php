@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="margin-top: 12px;" class="alert alert-success text-center">Admin Dashboard Post list</h2><br>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Caption</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    @foreach($posts as $p_info)
                        <tr id="post_id_{{ $p_info->id }}">
                            <td>{{ $p_info->id  }}</td>
                            <td>{{ $p_info->user->name  }}</td>
                            <td>{{ $p_info->title }}</td>
                            <td>{{ $p_info->caption }}</td>
                            <td colspan="2">
                                <a href="javascript:void(0)" id="delete-post" data-id="{{ $p_info->id }}" class="btn btn-danger delete-post">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    @include('admin.PostScript')

@endsection
