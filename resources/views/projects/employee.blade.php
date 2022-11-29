<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-pin"></i>
            </span>
            {{$employee->fullname}}
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>
                    Employee Details
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{$employee->fullname}}</h4>
                <p class="card-description">
                    EC Number: <code>{{$employee->ecno}}</code>
                </p>
                <div style="float: right">
                    <a href="{{route('admin-comment-employee', $employee->id)}}">Rate Performance</a>
                </div>
              </div>
              <div class="card-body">
                @foreach (\App\Models\Comment::where('employee_id', $employee->id)->get() as $item)
                    <blockquote class="blockquote blockquote-primary">
                        <p>{{$item->comment}}</p>
                        <footer class="blockquote-footer">{{get_project($item->project_id)->name}} <cite title="Source Title"> {{$item->created_at}}</cite></footer>
                    </blockquote>
                @endforeach
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
