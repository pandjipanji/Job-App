<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="{{asset('css/materialize.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('fonts/roboto/Roboto-Regular.woff2')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            #toast-container {
                top: auto !important;
                right: auto !important;
                bottom: 10%;
                left:7%;
            }
            
        </style>
    </head>
    <body style="background-color:rgb(226, 226, 226)">
        
        @include('templates.navbar')
        
        @yield("content")
          

    </body>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/materialize.js')}}"></script>

    <script>  
   $(document).ready(function(){
      $('.slider').slider();

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });

       $('select').material_select();
       


        @if (Session::has('notice'))
				Materialize.toast("{{Session::get('notice')}}",6000,'green');
			@endif

			
			@if (Session::has('error'))
				Materialize.toast("{{Session::get('error')}}",6000,'red');
			@endif

            @if (Session::has('warning'))
				Materialize.toast("{{Session::get('waning')}}",6000,'orange');
			@endif
        
        //initialize all modals           
        $('.modal').modal();

    });   
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $('#select_stats').on('change', function(e){
                $.ajax({
                type : "POST",
                url : "/status/get",
                data:{
                    'status' : $('#select_stats').val()
                },
                success: function(success){
                        $("#table_ajax").html(success);
                }
            });
                
            });

            
        });
    </script>
    <script>
            function status_ajax(status,id){
                $('#status_value').val(status);
                    $.ajax({
                    type : "POST",
                    dataType : 'json',
                    url : "/change_status/"+id,
                    data:{
                        'status' : status
                    },
                    success: function(success){
                        $('a#status'+success['id']).removeClass(success['remove1']).removeClass(success['remove2']).addClass(success['add']);    
                        document.getElementById('stats'+success['id']).innerHTML = success['status'];
                        $('#modal'+success['id']).modal('close');
                        Materialize.toast(success['flash'],6000,'green');
                            //return location.reload();
                    }
                    });
            }
        
    </script>
</html>