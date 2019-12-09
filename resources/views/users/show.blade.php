@extends('layouts.app')

@section('content')

    @foreach($users as $user)

        <div class="py-5" id="app">
        <div class="col-xs-12" style="height:40px;">
        <div class="card mx-auto"  style="width:600px">
            <h5 class="card-title mt-2 ml-3 d-flex ">
                <a href="/profile/{{ $user->id }}">
                    <img src="/storage/{{ $user->profile->image }}" style="width:35px;" class="rounded mt-2 mr-2" alt=" ">
                </a>
                <a href="/profile/{{ $user->id }}">
                    <div class="mt-3">
                    <span class="text-dark"> {{ $user->name }}</span>
                    </div>
                </a>
                <div class="pt-2">
                <link-button user-id="{{ $user->id }}" connected="{{ $connected }}"></link-button>
                </div>
            </h5>
        </div>
        </div>

    @endforeach
            <div class="col-xs-12" style="height:40px;"></div>
            <div class="mx-auto"  style="width:150px">
                <h5>{{ $users->links() }}</h5>
            </div>

@endsection

