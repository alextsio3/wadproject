@section('scripts')

    <script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //delete user
        $('body').on('click', '.delete-user', function () {
            var user_id = $(this).data("id");
            if(confirm("Are You sure want to delete this user?")) {

                $.ajax({
                    type: "DELETE",
                    url: "admin/destroyuser"+'/'+user_id,
                    success: function (data) {
                        $("#user_id_" + user_id).remove();
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

