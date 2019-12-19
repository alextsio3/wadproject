@section('scripts')

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //delete comment
            $('body').on('click', '.delete-comment', function () {
                var comment_id = $(this).data("id");
                if(confirm("Are You sure want to delete this comment?")) {

                    $.ajax({
                        type: "DELETE",
                        url: "/destroycomment"+'/'+comment_id,
                        success: function (data) {
                            $("#comment_id_" + comment_id).remove();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });



        })

    </script>

@endsection

