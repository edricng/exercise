<!DOCTYPE html>
<html>
    <head>
        <title>SIRCLO</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" /><link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
        <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    </head>
    <body>
        <div class="container">
            <img class="img-responsive image-center" src="images/sirclo.png" width="200">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $( function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

        } );
        $(document).on('click', '.button-delete', function (e) {
            e.preventDefault();
            var uuid = $(this).data('id');
            swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/delete-weight')}}",
                        data: {uuid:uuid},
                        success: function (data) {
                            swal({
                                position: 'top-right',
                                type: 'success',
                                title: 'Weight has been deleted!',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        }         
                });
            });
        });
    });
</script>