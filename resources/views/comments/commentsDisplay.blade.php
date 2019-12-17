<div class="card-body">
    <div class="media"  v-for="comment in comments">
        <div class="card-body">
            <hr>
            <div class="d-flex">
                <h6 class="mt-2">

                    <strong>@{{comment.user.Username}}</strong>@{{comment.user.image}}
                    |<a class="btn btn-default" id="hey" data-target="commentBox"  v-on:click=" updateComment(comment.id)">Update</a>
                    | <a class="btn btn-default"  v-on:click=" deleteComment(comment.id)">Delete</a>
                </h6>
            </div>
            <strong class="card-text">@{{comment.body}}</strong>
            <div class="card-text mt-3" >On @{{comment.created_at}}</div>
    </div>
</div>

@include('comments.commentsedit')

