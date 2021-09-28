<x-layout-layout>

          <div class="content-wrapper">
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> DZIENNIK ŻYWIENIOWY</h2>

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="tab-content tab-transparent-content">
                
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h2 class="mb-4 text-dark font-weight-bold">Białka</h2>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i id="protein" class="mb-0 font-weight-bold absolute-center text-dark">{{ $percentes['protein'] }}</i></div>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $caloricConsumption->protein }} / {{ $caloricDemand->protein }} g</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h2 class="mb-4 text-dark font-weight-bold">Tłuszcze</h2>
                            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i id="fat" class="mb-0 font-weight-bold absolute-center text-dark">{{ $percentes['fat'] }}</i></div>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $caloricConsumption->fat }} / {{ $caloricDemand->fat }} g</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h2 class="mb-4 text-dark font-weight-bold">Węglowodany</h2>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i id="carbohydrates" class="mb-0 font-weight-bold absolute-center text-dark">{{ $percentes['carbohydrates'] }}</i></div>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $caloricConsumption->carbohydrates }} / {{ $caloricDemand->carbohydrates }} g</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h2 class="mb-4 text-dark font-weight-bold">Kalorie</h2>
                            <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent"><i id="calories" class="mb-0 font-weight-bold absolute-center text-dark">{{ $percentes['calories'] }}</i></div>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $caloricConsumption->calories }} / {{ $caloricDemand->calories }} kcal</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Dzisiejsze posiłki</h4>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Nazwa</th>
                                  <th>Godzina</th>
                                  <th>Białka</th>
                                  <th>Tłuszcze</th>
                                  <th>Węglowodany</th>
                                  <th>Kalorie</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($meals as $meal)
                                <tr>
                                  <td>{{$meal->name}}</td>
                                  <td>{{substr($meal->created_at,10,18)}}</td>
                                  <td>{{$meal->protein}}</td>
                                  <td>{{$meal->fat}}</td>
                                  <td>{{$meal->carbohydrates}}</td>
                                  <td>{{$meal->calories}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12  grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-xl-flex justify-content-between mb-2">
                              <h4 class="card-title">PUNKTACJA NA PRZESTRZENI OSTATNICH 30 DNI</h4>
                              <div class="graph-custom-legend primary-dot" id="pageViewAnalyticLengend"></div>
                            </div>
                            <canvas id="page-view-analytic"></canvas>
                          </div>
                        </div>
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" value="{{ $points }}" id="points">
          <!-- content-wrapper ends -->
</x-layout-layout>