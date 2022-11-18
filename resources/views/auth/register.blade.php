<x-guest-layout>
    <div class="col-lg-8 mx-auto">
        <div class="auth-form-light text-left p-5">
          <div class="brand-logo">
            Tencraft Project Management
          </div>
          <h4>Hello! let's get started</h4>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form class="pt-3" method="POST" action="{{route('register')}}">
              @csrf
                      <div class="form-group">
                          <input type="text" name="name" class="form-control form-control-lg" id="exampleInputName1" placeholder="User Name">
                      </div>
                      <div class="form-group">
                          <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email address">
                      </div>
                      <div class="form-group">
                          <select name="role" class="form-control form-control-lg" id="exampleInputName1">
                              <option selected disabled> Select Role </option>
                              <option value="project">Project Manager</option>
                              <option value="finance">Finance Manager</option>
                          </select>
                      </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
              <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Register</button>
              </div>
              <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
              </div>
          </form>
        </div>
      </div>
</x-guest-layout>
