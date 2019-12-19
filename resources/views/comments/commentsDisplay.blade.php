    <div class="media"  v-for="comment in comments">
        <div class="card-body">
            <div class="d-flex">
                <h6>
                    <img src="{{ $post->user->profile->profileImage() }}" style="width:40px;" class="rounded mr-2" alt=" ">
                    <strong >@{{comment.user.Username}}</strong>
                    <a class="btn btn-default" data-toggle="modal" data-target="#basicExampleModal">Edit</a>
                    |<a class="btn btn-default"  v-on:click=" deleteComment(comment.id)">Delete</a>
                </h6>
            </div>
            <strong class="card-text">@{{comment.body}}</strong>
            <div class="card-text mt-3" >On @{{comment.created_at}}</div>
            <hr>

        </div>

        <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="comment-body">Edit the comment</label>
                                <textarea class="form-control" id="delete-court-form" rows="3" name="body" v-model="commentbody" data-body></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="updateComment(comment.id)" data-dismiss="modal">Update</button>
                    </div>
                </div>
            </div>
        </div>


