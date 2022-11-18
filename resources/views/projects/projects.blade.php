<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div>
                    <h4 class="card-title">Recent Projects</h4>
                    <a href="{{route('admin-project-create')}}" class="btn btn-primary">Add New</a>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Project</th>
                      <th>Status</th>
                      <th>Description</th>
                      <th>Started At</th>
                      <th>Ending At</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($projects as $item)
                        <tr>
                            <td>
                                @php
                                    $count ++;
                                    echo $count;
                                    $status = get_status($item->status)
                                @endphp
                            </td>
                            <td><a href="{{route('admin-project', $item->id)}}"> {{$item->name}} </a></td>
                            <td>
                                <label class="badge badge-gradient-{{$status->badge}}">{{$status->label}}</label>
                            </td>
                            <td> {{$item->description}} </td>
                            <td> {{$item->started_at}} </td>
                            <td> {{$item->end_at}} </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$projects->links('pagination::bootstrap-4')}}
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
