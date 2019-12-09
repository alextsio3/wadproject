@extends('layouts.app')

@section('content')

<div class="container" id="app">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{ $user->profile->image }}" class="rounded w-100" alt="no profile image ">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <h1>{{ $user->Username }}</h1>

                    <link-button user-id="{{ $user->id }}" connected="{{ $connected }}"></link-button>

                </div>

            </div>
            <div class="d-flex">
                <div class="pr-4 "><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $user->profile->linked->count() }}</strong> followers</div>
                <div class="pr-4"><strong>{{ $user->links->count() }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div> {{$user->profile->description}} </div>
            <div class="font-weight-bold pb-5" ><a href="">{{$user->profile->url}}</a></div>

        </div>
    </div>

    @can('update', $user->profile)
    <div class="card-text bg-white mx-auto rounded"  style="width:600px">
        <p class="card-title d-flex ">
        <form action="/post" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label"></label>
                        <input id="title"
                               placeholder="Write your title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ old('title') }}"
                               autocomplete="title" autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label"></label>
                        <input id="caption"
                               placeholder="What do you have to say"
                               type="text"
                               class="form-control @error('caption') is-invalid @enderror"
                               name="caption"
                               value="{{ old('caption') }}"
                               autocomplete="caption" autofocus>
                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <input type="file" class="form-control-file" id="image" name="image">
                        <button class="btn btn-primary">Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endcan

    @include('posts.PostsDisplay', ['posts' => $user->posts])


</div>
@endsection
