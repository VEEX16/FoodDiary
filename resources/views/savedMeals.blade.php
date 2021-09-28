<x-layout-layout>

          <div class="content-wrapper">
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2">ZAPISANE POSIŁKI</h2>

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="tab-content tab-transparent-content">
                
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Twóje ulubione posiłki</h4>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Nazwa</th>
                                  <th>Data dodania</th>
                                  <th>Białka</th>
                                  <th>Tłuszcze</th>
                                  <th>Węglowodany</th>
                                  <th>Kalorie</th>
                                  <th>Akcje</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($meals as $meal)
                                <tr>
                                  <td>{{$meal[0]->name}}</td>
                                  <td>{{substr($meal[0]->created_at,0,10)}}</td>
                                  <td>{{$meal[0]->protein}}</td>
                                  <td>{{$meal[0]->fat}}</td>
                                  <td>{{$meal[0]->carbohydrates}}</td>
                                  <td>{{$meal[0]->calories}}</td>
                                  <td>
                                    <form method="POST" action="{{ route('addSavedConsumption') }}">
                                      @csrf
                                      <input type="hidden" name='meal' value="{{$meal[0]->mealId}}"/>
                                      <button type='submit'><i style="font-size:20px; color:#33c92d" class="mdi mdi-plus-box"></i></button>
                                    </form>
                                    <form method="POST" action="{{ route('removeSavedMeal') }}">
                                      @csrf
                                      <input type="hidden" name='meal' value="{{$meal[0]->mealId}}"/>
                                      <button type='submit'><i style="font-size:20px; color:#fc5a5a;" class="mdi mdi-sim-off"></i></button>
                                    </form>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
</x-layout-layout>