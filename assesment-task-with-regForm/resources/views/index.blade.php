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

  <div class="p-5 bg-primary text-white text-center">
    <h1>Applicant Registration</h1>

  </div>

  <div class="reg-form mt-3">
    <div class="card">
      <div class="card-header">
        <h2>Registration Form </h2>
      </div>

      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="mb-5">
            {{-- Name field start here --}}
            <div class="">
              <label for="name"><strong>Full Name: </strong></label>
              <input type="text" class="form-control" name="name" value=""
                placeholder="Enter your fullName">
            </div><br>
            {{-- Email field start here --}}
            <div class="">
              <label for="email"><strong>Email: </strong></label>
              <input type="email" class="form-control" name="email" value=""
                placeholder="Enter your Valid Email">
            </div><br>

            {{-- Location information start here --}}
            <div class="row">
              <div class="col-md-2">
                <label for=""><strong>Location: </strong> </label>
              </div>
              <div class="col-md-3">
                <label for="">Division : </label>
                <select name="division" id="division">
                  <option value="" selected disabled>Select One</option>
                  @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->division_name }} </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3">
                <label for="">District : </label>
                <select name="district" id="district">
                  <option value="" selected disabled>Select One</option>
                </select>
              </div>

              <div class="col-md-3">
                <label for="">Upozilla : </label>
                <select name="upozilla" id="upozilla">
                  <option value="" selected disabled>Select One</option>
                </select>
              </div><br>
              {{-- Address details start here --}}
              <div class="mt-2">
                <label for="email"><strong>Address Details: </strong></label>
                <textarea name="address-details" class="form-control" id="" cols="30" rows="5"
                  placeholder="Write your details address"></textarea>
              </div><br>

              {{-- Langague field start here  --}}
              <div class="row mt-3  ">
                <div class="col-md-3">
                  <label for="email"><strong>Programming Langague: </strong></label>
                </div>

                <div class="col-md-3">
                  <input type="checkbox" class="form-check-input" id="java" name="java" value=""
                    >
                  <label class="form-check-label" for="Java">Java</label>
                </div>

                <div class="col-md-3">
                  <input type="checkbox" class="form-check-input" id="php" name="php" value=""
                    >
                  <label class="form-check-label" for="php">PHP</label>
                </div>

                <div class="col-md-3">
                  <input type="checkbox" class="form-check-input" id="python" name="python" value="">
                  <label class="form-check-label" for="python">Python</label>
                </div>

              </div><br>
              {{-- Education field start here  --}}
              <div class="row mt-3">
                <div class="col-md-3">
                  <label for=""><strong>Education Qualification: </strong> </label>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="">Exam : </label>
                      <select name="" id="exam">
                        <option value="exam" selected disabled>Select One</option>
                        <option value="">SSC </option>
                        <option value="">HSC </option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="">University : </label>
                      <select name="university" id="university">
                        <option value="" selected disabled>Select One</option>
                        <option value="">SSC </option>
                        <option value="">HSC </option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="">Board : </label>
                      <select name="board" id="board">
                        <option value="" selected disabled>Select One</option>
                        <option value="">SSC </option>
                        <option value="">HSC </option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="">Result : </label>
                      <select name="result" id="result">
                        <option value="" selected disabled>Select One</option>
                        <option value="">SSC </option>
                        <option value="">HSC </option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              {{-- Aplicant Photo field start here  --}}
              <div class="mt-3">
                <label for="aplicant Photo "><strong>Aplicant Photo :</strong></label>
                <input type="file" name="image" id="">
              </div>

              {{-- Aplicant CV field start here  --}}
              <div class="mt-3">
                <label for="aplicant Photo "><strong>Aplicant Cv :</strong></label>
                <input type="file" name="cv" id="">
              </div>

            </div>
          </div>
        </div>
        {{-- Footer section start here --}}
        <div class="card-footer">
          <button type="submit" value="register" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
    {{-- Address details start here --}}



  </div>

  <div class=" p-4 bg-dark text-white text-center">
    <p>Footer</p>
  </div>

  {{-- Jquery cdn start here --}}
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script>
    // $(document).ready(function(){
    //     $("#country").change(function(){
    //         let cid = jquery(this).val();
    //         alert(cid);
    //     })
    // })

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

    })
  </script>

</body>

</html>
