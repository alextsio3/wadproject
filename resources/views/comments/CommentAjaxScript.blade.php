@section('scripts')

    <script>

        const AjaxComments = new Vue({
            el: '#AjaxComments',
            data: {
                comments: {},
                commentBox: '',
                commentbody: '',
                post: {!! $post->toJson() !!},
                user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!}
            },
            mounted() {
                this.getComments();
            },
            methods: {
                getComments() {
                    axios.get('/posts/'+this.post.id+'/comments')
                        .then((response) => {
                            this.comments = response.data
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                postComment() {
                    axios.post('/posts/'+this.post.id+'/comment', {
                        body: this.commentBox
                    })
                        .then((response) => {
                            this.comments.unshift(response.data);
                            this.commentBox = '';
                        })
                        .catch((error) => {
                            console.log(error);
                        })
                },
                deleteComment($comment_id) {
                    axios.delete('/posts/comment/delete/'+$comment_id, {
                    })

                        .then(() => {
                            if(confirm("Are You sure want to delete this comment?")){
                                this.comments.splice(this.commentIndex($comment_id), 1);
                            }
                        })
                            .catch((error) => {
                                if(alert("You can only delete your own comments")) {
                                    console.log(error);
                                }
                            })

                },

                updateComment($comment_id) {
                    axios.put('/posts/comment/edit/'+$comment_id, {
                        body: this.commentbody
                    })

                        .then(({data}) => {
                            this.comments[this.commentIndex($comment_id)].body = data.body;
                            this.commentbody = '';
                        })
                        .catch((error) => {
                            if(alert("You can only edit your own comments")) {
                                console.log(error);

                            }
                        })
                },
                commentIndex(commentId) {
                    return this.comments.findIndex((element) => {
                        return element.id === commentId;
                    });
                },


            }
        })

    </script>

@endsection
