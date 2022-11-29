<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div>
                    <h4 class="card-title">Machinery & Equipment</h4>
                    <a href="{{route('admin-new-equipment')}}" class="btn btn-primary">Add New</a>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Model</th>
                      <th>Value</th>
                      <th>Lifespan</th>
                      <th>Performance</th>
                      <th>Maintenance</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($equipments as $item)
                        <tr>
                            <td>
                                @php
                                    $count ++;
                                    echo $count;
                                @endphp
                            </td>
                            <td><a href="#"> {{$item->name}} </a></td>
                            <td>
                                {{$item->model}}
                            </td>
                            <td> {{$item->value}} </td>
                            <td> {{$item->lifespan}} </td>
                            <td> {{$item->performance}} </td>
                            <td> {{$item->maintenance}} </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
