@extends('layouts.app')

@section('content')

    @if(count($posts) === 0)
        <div class="col-xs-12" style="height:40px;"></div>
        <div class="card mx-auto"  style="width:600px">
            <h5 class="card-title mt-2 ml-3 mx-auto">Nothing to show! You don't follow any users</h5>
        </div>
    @else
    @include('posts.PostsDisplay', ['posts' => $posts])


        <div class="col-xs-12" style="height:40px;"></div>
        <div class="mx-auto"  style="width:150px">
            <h5>{{ $posts->links() }}</h5>
        </div>

    @endif

@endsection

