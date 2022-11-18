<x-app-layout>
    @php
        $status = get_status($project->status);
    @endphp
    <div class="row">
        <div class="col-md-6 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{$project->name}}</h4>
                <p class="card-description"> <label class="badge badge-gradient-{{$status->badge}}">{{$status->label}}</label> </p>
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
                <ul class="list-arrow">
                    <li>CAT Grader x1</li>
                    <li>Tar 1 000 l</li>
                    <li>Quary 1 000 kg</li>
                    <li>Human Resources 1 000</li>
                    @foreach (\App\Models\Resource::where('project_id', $project->id) as $item)

                    @endforeach
                </ul>
              </div>
            </div>
          </div>
    </div>
</x-app-layout>
