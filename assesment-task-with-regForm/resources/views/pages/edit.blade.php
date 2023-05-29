@section('content')
<div class="reg-form mt-3">
    <div class="card">
      <div class="card-header">
        <h2>Registration Form </h2>
      </div>

      <form action="{{route('updateemployee')}}" id="frm" method="post" enctype="multipart/form-data">
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
                <textarea name="address_details" class="form-control" id="" cols="30" rows="5"
                  placeholder="Write your details address"></textarea>
              </div><br>

              {{-- Langague field start here  --}}
              <div class="row mt-3  ">
                <div class="col-md-3">
                  <label for=""><strong>Programming Langague: </strong></label>
                </div>

                <div class="col-md-3">
                  <input type="checkbox" class="form-check-input" id="java" name="skills[]" value="java">
                  <label class="form-check-label" for="Java">Java</label>
                </div>

                <div class="col-md-3">
                  <input type="checkbox" class="form-check-input" id="php" name="skills[]" value="php">
                  <label class="form-check-label" for="php">PHP</label>
                </div>

                <div class="col-md-3">
                  <input type="checkbox" class="form-check-input" id="python" name="skills[]" value="python">
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
@endsection