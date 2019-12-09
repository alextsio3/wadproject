<div class="card-body">
    <div class="media"  v-for="comment in comments">
        <div class="card-body">
            <hr>
            <div class="d-flex">
                <h6 class="mt-2">

                    <strong class="">@{{comment.user.Username}}</strong>
                        | <a class="btn btn-default" v-on:click=" showComment(comment.id)">Edit</a>
                        | <a class="btn btn-default" v-on:click=" deleteComment(comment.id)">Delete</a>
                </h6>
            </div>
            <div class="card-text mt-3">@{{comment.body}}</div>
            <div class="card-text mt-3" >On @{{comment.created_at}}</div>


        </div>
    </div>
</div>



