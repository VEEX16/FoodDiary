<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo-dark.svg">
                </div>
                <h4>Jesteś tu nowy?</h4>
                <h6 class="font-weight-light">Rejestracja jest szybka. To tylko kilka kroków</h6>
                @if ($errors->any())
                      <div class="badge-danger" style="text-align:center;padding-top:10px">
                          <div class="font-medium text-red-600!important">
                              {{ __('Whoops! Something went wrong.') }}
                          </div>

                          <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                              @foreach ($errors->all() as $error)
                                  <p>{{ $error }}</p>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                <form class="pt-3" method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Nazwa użytkownika" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required>
                  </div>
                  <div class="form-group" style="margin-bottom: 5px;;margin-left: 25px;">
                    <input  style="margin-bottom:8px" type="radio" name="sex" value="M"checked>
                    <label class="text-dark" for="huey"><h4>Mężczyzna</h4></label>
                  </div>
                  <div class="form-group" style="margin-bottom: 5px;;margin-left: 25px;">
                    <input style="margin-bottom:8px" type="radio" name="sex" value="K">
                    <label class="text-dark" for="huey"><h4>Kobieta</h4></label>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Hasło" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Potwierdź hasło" required>
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" required> Zgadzam sie na warunki korzystania z seriwsu </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html" value="REJESTRACJA">
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Masz już konto? <a href="login.html" class="text-primary">Zaloguj się</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>