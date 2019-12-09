@section('scripts')
    <script>

        const AjaxComments = new Vue({
            el: '#AjaxComments',
            data: {
                comments: {},
                commentBox: '',
                post: {!! $post->toJson() !!},
                user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!}
            },
            mounted() {
                this.getComments();
            },
            methods: {
                getComments() {
                    axios.get('/api/posts/'+this.post.id+'/comments')
                        .then((response) => {
                            this.comments = response.data
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                postComment() {
                    axios.post('/api/posts/'+this.post.id+'/comment', {
                        api_token: this.user.api_token,
                        body: this.commentBox
                    })
                        .then((response) => {
                            this.comments.unshift(response.data);
                            this.commentBox = '';
                        })
                        .catch((error) => {
                            console.log(error);
                        })
                }

                
            }
        })

    </script>
@endsection
