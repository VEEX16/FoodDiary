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
                <h4>Dodaj parę informacji</h4>
                <h6 class="font-weight-light">Obliczymy zapotrzebowanie Twojego organizmu</h6>
                @if ($errors->any())
                      <div class="badge-danger" style="text-align:center;padding-top:10px">
                          <div class="font-medium text-red-600!important">
                            Ops! Coś poszło nie tak.
                          </div>

                          <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                              @foreach ($errors->all() as $error)
                                  <p>{{ $error }}</p>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                <form class="pt-3" method="POST" action="{{ route('collectData') }}">
                  @csrf
                  <div class="form-group">
                    <input type="number" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Wiek" required>
                  </div>
                  <div class="form-group">
                    <input type="number" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Waga" required>
                  </div>
                  <div class="form-group">
                    <input type="number" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Wzrost" required>
                  </div>
                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="cars" class="text-dark"><h4>Poziom aktywności fizycznej:</h4></label>
                    <select name="cars" id="cars">
                      <option value="1">Brak</option>
                      <option value="2">Niewielka</option>
                      <option value="3">Umiarkowana</option>
                      <option value="4">Wysoka</option>
                    </select>
                  </div>
                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="cars" class="text-dark"><h4>Cel:</h4></label>
                    <select name="cars" id="cars">
                      <option value="1">Schudnąć</option>
                      <option value="2">Utrzymać wagę</option>
                      <option value="3">Przytyć</option>
                    </select>
                  </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html" value="DODAJ INFORMACJE">
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