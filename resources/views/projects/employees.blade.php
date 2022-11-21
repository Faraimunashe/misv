<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div>
                    <h4 class="card-title">Employees</h4>
                    <a href="{{route('admin-add-employee')}}" class="btn btn-primary">Add New</a>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>EC #</th>
                      <th>Fullname</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($employees as $item)
                        <tr>
                            <td>
                                @php
                                    $count ++;
                                    echo $count;
                                    //$status = get_status($item->status)
                                @endphp
                            </td>
                            <td><a href="{{route('admin-employee', $item->id)}}"> {{$item->ecno}} </a></td>
                            <td><a href="{{route('admin-employee', $item->id)}}"> {{$item->fullname}} </a></td>
                            <td>
                                {{$item->gender}}
                            </td>
                            <td> {{$item->dob}} </td>
                            <td> {{$item->salary}} </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$employees->links('pagination::bootstrap-4')}}
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
