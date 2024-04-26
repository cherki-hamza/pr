<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link">PR OverTheTop</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">



        <li class="nav-item">
          <a href="{{ route('balance') }}">  <span class="btn btn-warning">Balance: $1000</span> </a>
        </li>

        <li class="nav-item ml-3 mr-5">
            <svg style="width: 30px;color:rgba(255, 255, 255, 0.7)" class="svg-inline--fa fa-bell fa-w-14 fs-2 mb-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor" d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"></path>
            </svg>
            <span class="badge badge-danger" style="position:absolute;color: rgba(255, 255, 255, 0.7)">100</span>
         </li>

        <li class="nav-item">
            <a class="nav-link" id="btntheme" role="button">
                <i id="icontheme" class="fas fa-sun"></i>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}" target="_bkank" role="button">
                <i class="fas fa-globe"></i>
            </a>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ auth()->user()->GetPicture() }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header">
                    <img src="{{ auth()->user()->GetPicture() }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{ Auth::user()->name }} - {{ implode(",", Auth::user()->getRoleNames()->toArray()) }}
                        <small>Last updated {{ date('d-m-Y H:i:s', strtotime(Auth::user()->updated_at)) }}</small>
                    </p>
                </li>
                <li class="user-footer">
                    <a href="{{ route('profiles.index') }}" class="btn btn-default">Profile</a>
                    <a href="#" data-toggle="modal" data-target="#modal-logout" data-backdrop="static" data-keyboard="false" class="btn btn-danger float-right">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
