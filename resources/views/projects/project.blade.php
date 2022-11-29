<x-app-layout>
    @php
        $status = get_status($project->status);
    @endphp
    <div class="row">
        <div class="col-md-6 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{$project->name}}</h4>
                <p class="card-description">
                    <a href="{{route('admin-status-project', $project->id)}}">
                        <label class="badge badge-gradient-{{$status->badge}}">{{$status->label}}</label>
                    </a>
                </p>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <p class="font-weight-bold">Started Date</p>
                      <p> {{$project->started_at}}</p>
                    </address>
                  </div>
                  <div class="col-md-6">
                    <address class="text-primary">
                      <p class="font-weight-bold"> End Date (critical path) </p>
                      <p class="mb-2"> {{$project->end_at}} </p>
                    </address>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Description</h4>
                <p class="card-description">
                    {{$project->description}}
                </p>
              </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Allocated Resources</h4>
                <a class="btn btn-primary" href="{{route('admin-add-resource', $project->id)}}">Add Resource</a>
                <ul class="list-arrow">
                    @foreach (\App\Models\Allocate::where('project_id', $project->id)->get() as $item)
                        <li>{{get_resource($item->resource_id)->name}} x{{$item->qty}}</li>
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
    </div>
</x-app-layout>
