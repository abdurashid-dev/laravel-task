<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.delete-btn').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                confirmButtonText: "Delete it!"
            }).then((result) => {
                if (result.value) {
                    $(this).closest('form').submit();
                }
            })
        });
        // $('.restore-btn').click(function (e) {
        //     e.preventDefault();
        //     Swal.fire({
        //         title: 'Ishonchingiz komilmi?',
        //         // text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         cancelButtonText: 'Bekor qilish',
        //         confirmButtonText: "Qayta tiklash!"
        //     }).then((result) => {
        //         if (result.value) {
        //             $(this).closest('form').submit();
        //         }
        //     })
        // });
    });
</script>
