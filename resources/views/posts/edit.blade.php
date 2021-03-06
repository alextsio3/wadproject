@extends('layouts.app')

@section('content')
<div class="container py-5" id="edit-modal">
    <form action="/post/{{ $post->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Post</h1>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>


                    <input id="title"
                           type="text"
                           minlength="5"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           value="{{ old('title') ?? $post->title }}"
                           autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label ">Caption</label>


                    <input id="caption"
                           type="text"
                           class="form-control @error('caption') is-invalid @enderror"
                           name="caption"
                           value="{{ old('caption') ?? $post->caption }}"
                           autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror

                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Save Post</button>
                </div>

            </div>


        </div>
    </form>

</div>
@endsection
