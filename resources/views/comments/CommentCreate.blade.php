<div class="container pt-3" >
    <div id="comment-form">
        <h5>Comments</h5>
        <textarea class="form-control" rows="3" name="body" placeholder="Leave a comment" v-model="commentBox"></textarea>
        <div class="form-group ">
            <button class="btn btn-primary" style=" margin-top: 10px;" @click.prevent="postComment">Save</button>
        </div>
    </div>
</div>
