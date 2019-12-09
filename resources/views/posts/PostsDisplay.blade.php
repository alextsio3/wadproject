
@foreach($posts as $post)

        <div class="col-xs-12" style="height:40px;"></div>
        <div class="card mx-auto"  style="width:600px">
            <h5 class="card-title mt-2 ml-3 d-flex ">
                <a href="/profile/{{ $post->user->id }}">
                    <img src="/storage/{{ $post->user->profile->image }}" style="width:40px;" class="rounded mt-2 mr-2" alt=" ">
                </a>

                <div class="mt-3">
                    <div class="d-flex">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark mr-1"> {{ $post->user->Username }}</span>
                        </a>
                        <h6 class="mr-2" style="position: absolute; right: 0;">Views : {{ $post->views }}</h6>
                        <div>
                            |<a href="/post/{{ $post->id }}" class="text-justify ml-1">View Post </a>
                            @can('update', $post->user->profile)
                                |<a href="{{route('post.edit', [$post->id])}}" class="edit text-success ml-1">Edit Post </a>|
                            @endcan
                            @can('update', $post->user->profile)
                                    <a class="text-danger" data-toggle="modal" data-target="#modalConfirmDelete">Delete</a>
                            @endcan

                        </div>
                    </div>
                </div>
            </h5>
            <h4 class="card-body ml-1" data-postId="{{ $post->id }}">{{ $post->title }}</h4>
        </div>


        <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="heading">Are you sure you want to delete this post?</h5>
                    </div>
                    <div class="modal-footer flex-center">
                        <a href="{{route('post.delete', [$post->id])}}" class="btn btn-outline-danger">Yes</a>
                        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

