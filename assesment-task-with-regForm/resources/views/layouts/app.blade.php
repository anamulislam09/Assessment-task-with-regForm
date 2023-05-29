<!DOCTYPE html>
<html lang="en">

<head>
  <title>Applicant Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>




  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }

    .reg-form {
      width: 1250px;
      margin: 0 auto;
    }
  </style>
</head>

<body>




  @include('layouts.header')

  @yield('content')

  

  @include('layouts.footer')



  {{-- Jquery cdn start here --}}
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $("#division").change(function() {
        let did = $(this).val();
        $("#upozilla").html('<option value="">Select One</option>')
        $.ajax({
          url: '/getDistrict',
          type: 'post',
          data: 'did=' + did + '&_token={{ csrf_token() }}',
          success: function(result) {
            $('#district').html(result);
          }
        })
      })


      $("#district").change(function() {
        let uid = $(this).val();
        // alert(cid);
        $.ajax({
          url: '/getUpozilla',
          type: 'post',
          data: 'uid=' + uid + '&_token={{ csrf_token() }}',
          success: function(rs) {
            $('#upozilla').html(rs);
          }
        })
      })

    });

    // $("#frm").submit(function(event){
    //   event.preventDefault();
    //   $.ajax({
    //     url: '/register',
    //     type: "POST",
    //     data:$('#frm').serializeArray()+'&_token={{ csrf_token() }}',,
    //     dataType: "JSON",
    //     success: function(response){

    //     }
    //   })
    // })
  </script>

</body>

</html>
