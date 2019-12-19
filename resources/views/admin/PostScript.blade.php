@section('scripts')

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //delete user
            $('body').on('click', '.delete-post', function () {
                var post_id = $(this).data("id");
                if(confirm("Are You sure want to delete this post?")) {

                    $.ajax({
                        type: "DELETE",
                        url: "/destroypost"+'/'+post_id,
                        success: function (data) {
                            $("#post_id_" + post_id).remove();
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

