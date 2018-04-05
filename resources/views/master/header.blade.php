<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <img src="{{asset('logo.png')}}" >
      {{--   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">E-OFFICE</a> --}}
    </div>
    <!-- /.navbar-header -->
{{-- 
    <ul class="nav navbar-top-links navbar-right" >
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                
                {{Auth::user()->profile->fullname}}
                
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>

                <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                <li class="divider"></li>
                <li class="divider"></li>
                <li>
                </li>
            </ul>
        </li>
    </ul> --}}
    <!-- /.navbar-top-links -->

    @include('master.menu')
    <!-- /.navbar-static-side -->
</nav>
