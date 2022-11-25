<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div>
                    <h4 class="card-title">Project Expenses</h4>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Project</th>
                      <th>Expense</th>
                      <th>Qty</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($expenses as $item)
                        <tr>
                            <td>
                                @php
                                    $count ++;
                                    echo $count;
                                @endphp
                            </td>
                            <td>{{$item->product}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                {{$item->qty}}
                            </td>
                            <td> {{$item->price}} </td>
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
