<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
            <div class="nav-profile-image">
                <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                <span class="text-secondary text-small">{{ Auth::user()->roles->first()->display_name }}</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        @if (Auth::user()->hasRole('project'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin-projects')}}">
                    <span class="menu-title">Projects</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span class="menu-title">Resources</span>
                </a>
            </li>
        @elseif (Auth::user()->hasRole('finance'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('finance-expenses')}}">
                    <span class="menu-title">Expenses</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
