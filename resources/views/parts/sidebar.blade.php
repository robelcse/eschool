<header class="main-nav">
  <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="">
    <div class="badge-bottom"><span class="badge badge-primary">{{ Auth::user()->role == 1 ? 'Admin':'Teacher'}}</span></div><a href="user-profile.html">
      <h6 class="mt-3 f-14 f-w-600"></h6>
    </a>
    <p class="mb-0 font-roboto">{{ Auth::user()->first_name}}</p>

  </div>
  <nav>
    <div class="main-navbar">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="mainnav">
        <ul class="nav-menu custom-scrollbar">
          <li class="back-btn">
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>

          <li><a class="nav-link {{ Request::is('admin/dashboard') ? 'actitve' : '' }}" href="{{ route('admin.dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a>
          </li>
          <li><a class="nav-link {{ Request::is('admin/student*') ? 'actitve' : '' }}" href="{{ Auth::user()->role == 1 ? url('admin/student/all'): url('teacher/student/all') }}"><i data-feather="home"></i><span>Students</span></a>
          </li>
          <li><a class="nav-link {{ Request::is('admin/teacher*') ? 'actitve' : '' }}" href="{{ Auth::user()->role == 1 ? url('admin/teacher/all'): url('teacher/teacher/all')   }}"><i data-feather="home"></i><span>Teachers</span></a>
          </li>
          <li><a class="nav-link {{ Request::is('admin/subjects*') ? 'actitve' : '' }}" href="{{ Auth::user()->role == 1 ? url('admin/subjects'): url('teacher/subjects') }}"><i data-feather="book-open"></i><span>Subject</span></a>
          </li>

          @if(Auth::user()->role == 1)
          <li><a class="nav-link {{ Request::is('admin/profile') ? 'actitve' : '' }}" href="{{ route('admin.profile') }}"><i data-feather="user"></i><span>Profile</span></a>
          </li>
          @elseif(Auth::user()->role == 2)
          <li><a class="nav-link {{ Request::is('teacher/profile') ? 'actitve' : '' }}" href="{{ route('teacher.profile') }}"><i data-feather="user"></i><span>Profile</span></a>
          </li>
          @endif

          @php $array_of_approval_person = explode(",", Auth::user()->approve); @endphp
          @if(Auth::user()->role == 2 && (Auth::user()->status == 3) || count($array_of_approval_person) == 3))
          <li><a class="nav-link" href="{{ route('teacher.units') }}"><i data-feather="user"></i><span>Block student of quize</span></a>
          </li>
          @endif


          @if(Auth::user()->role == 1)
          <li><a class="nav-link {{ Request::is('admin/change-password') ? 'actitve' : '' }}" href="{{ route('admin.changePassword') }}"><i data-feather="lock"></i><span>Change Password</span></a>
          </li>
          @elseif(Auth::user()->role == 2)
          <li><a class="nav-link {{ Request::is('teacher/change-password') ? 'actitve' : '' }}" href="{{ route('teacher.changePassword') }}"><i data-feather="lock"></i><span>Change Password</span></a>
          </li>
          @endif

        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>