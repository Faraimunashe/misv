<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div>
                    <h4 class="card-title">Recent Resources</h4>
                    <a href="{{route('finance-create-expense')}}" class="btn btn-primary">Add Reaource</a>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($finances as $item)
                        <tr>
                            <td>
                                @php
                                    $count ++;
                                    echo $count;
                                    $status = get_status($item->status)
                                @endphp
                            </td>
                            <td>{{$item->name}}</td>
                            <td>
                                {{$item->qty}}
                            </td>
                            <td> {{$item->price}} </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$finances->links('pagination::bootstrap-4')}}
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
