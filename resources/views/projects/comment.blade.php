<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-pin"></i>
            </span>
            Add Employee
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>
                    Add-Employee
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Employee</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{route('admin-comment-employee', $employee->id)}}" method="POST">
                        @csrf
                                <div class="form-group">
                                    <input type="hidden" name="employee_id" value="{{$employee->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Select Project</label>
                                    <select name="project_id" class="form-control" id="exampleInputName1">
                                        <option selected disabled>Selected Disabled</option>
                                        @foreach (\App\Models\Project::all() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputName1">Salary</label>
                                    <input type="text" name="salary" class="form-control" value="{{$employee->salary}}" id="exampleInputName1">
                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleTextarea1">Comment</label>
                                    <textarea class="form-control" name="comment" id="exampleTextarea1" rows="4" required></textarea>
                                </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
