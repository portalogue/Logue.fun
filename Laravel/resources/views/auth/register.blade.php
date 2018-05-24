<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Logue</title>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
          <div class="row w-100">
            <div class="col-lg-8 mx-auto">
              <div class="row">
                @if ($errors->any())
                    <div class="col-md-12">
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    </div>
                @endif
                <div class="col-lg-12 bg-white">
                  <div class="auth-form-light text-left p-5">
                    <h2>Register</h2>
                    <h4 class="font-weight-light">Hello! let's get started</h4>
                    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" name="name" class="form-control" id="fullname" placeholder="Fullname" required>
                          </div>
                          <div class="form-group pt-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                          </div>
                          <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required>
                          </div>
                          <div class="form-group">
                            <label for="password_confirmation">Confirmation Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmation password" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" checked required>
                              <label class="form-check-label" for="exampleRadios1">
                                Male
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female" required>
                              <label class="form-check-label" for="exampleRadios2">
                                Female
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Birthday</label>
                            <input type="date" name="birthday" class="form-control" id="exampleInputEmail1" placeholder="Birthday" required>
                            <i class="mdi mdi-account"></i>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="tel" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone" required>
                            <i class="mdi mdi-account"></i>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" required>
                            <i class="mdi mdi-account"></i>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Photo</label>
                            <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <i class="mdi mdi-account"></i>
                          </div>
                          <div class="mt-5">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium" name="button">Register</button>
                          </div>
                          <div class="mt-2 text-center">
                            <a href="{{route('login')}}" class="auth-link text-black">Already have an account? <span class="font-weight-medium">Sign in</span></a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
  <script src="https://unpkg.com/popper.js@1.14.3/dist/umd/popper.min.js" charset="utf-8"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>
