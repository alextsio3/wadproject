@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="margin-top: 12px;" class="alert alert-success text-center">Admin Dashboard Comment list</h2><br>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Comment</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $c_info)
                        <tr id="comment_id_{{ $c_info->id }}">
                            <td>{{ $c_info->id  }}</td>
                            <td>{{ $c_info->user->name  }}</td>
                            <td>{{ $c_info->body }}</td>
                            <td colspan="2">
                                <a href="javascript:void(0)" id="delete-comment" data-id="{{ $c_info->id }}" class="btn btn-danger delete-comment">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $comments->links() }}
            </div>
        </div>
    </div>


    @include('admin.CommentScript')

@endsection
