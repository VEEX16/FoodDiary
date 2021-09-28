<x-layout-layout>

          <div class="content-wrapper">
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> DODAJ POSIŁEK</h2>

            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Twój dzisiejszy posiłek</h4>
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
                    <form class="forms-sample" method="POST" action="{{ route('addMeal') }}">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nazwa</label>
                        <input type="text" name="name" class="form-control"placeholder="Wprowadź nazwę posiłku">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kalorie</label>
                        <input type="number" name="calories" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Białko</label>
                        <input type="number" name="protein" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Tłuszcze</label>
                        <input type="number" name="fat" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Węglowodany</label>
                        <input type="number" name="carbohydrates" class="form-control">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" name='saved' value="true" class="form-check-input"> Dodaj do zapisanych posiłków <i class="input-helper"></i></label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Horizontal Form</h4>
                    <p class="card-description"> Horizontal form layout </p>
                    <form class="forms-sample">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
</x-layout-layout>