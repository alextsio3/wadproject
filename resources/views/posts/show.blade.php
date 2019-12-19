@extends('layouts.app')

@section('content')
    <div class="col-xs-12 py-5" id="AjaxComments" style="height:40px;">
        <div class="card mx-auto"  style="width:600px">
            <h5 class="card-title mt-2 ml-3 d-flex ">
                <a href="/profile/{{ $post->user->id }}">
                    <img src="{{ $post->user->profile->profileImage() }}" style="width:40px;" class="rounded mt-2 mr-2" alt=" ">
                </a>
                <div class="mt-3">
                    <div class="d-flex float-right">
                        <a href="/profile/{{ $post->user->id }}">
                            <strong class="text-dark mr-1"> {{ $post->user->Username }}</span>
                        </a>
                        <h6 class="mr-2" style="position: absolute; right: 0;">Views : {{ $post->views }}</h6>
                    </div>
                </div>
            </h5>
            <h4 class="card-body ml-1" data-postId="{{ $post->id }}">{{ $post->title }} </h4>
            <hr>
            <h5 class="card-body ml-1" data-postId="{{ $post->id }}">{{ $post->caption }}</h5>
            <div class="card-body">
                <img class="card-img mt-1" src="/storage/{{ $post->image }}" alt=" ">
            </div>
            @include('comments.CommentCreate')
            @include('comments.commentsDisplay')
            @include('comments.CommentAjaxScript')


        </div>
    </div>

@endsection



