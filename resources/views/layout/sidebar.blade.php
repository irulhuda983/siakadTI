<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                         </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}">Logout</li>
                    </ul>
                </div>
                <div class="logo-element">
                    SI<sup>TI</sup>
                </div>
            </li>

            <li @if(request()->segment(1) == '') class="active" @endif>
                <a href="/"><i class="fa fa-fw fa-home"></i> <span class="nav-label">Home</span></a>
            </li>


            {{-- master Data --}}
            <li @if(request()->segment(1) == 'mahasiswa') class="active" @endif>
                <a href="/mahasiswa"><i class="fa fa-fw fa-graduation-cap"></i> <span class="nav-label">Data Mahasiswa</span></a>
            </li>

            <li @if(request()->segment(1) == 'matkul') class="active" @endif>
                <a href="/matkul"><i class="fa fa-fw fa-file"></i> <span class="nav-label">Data Mata Kuliah</span></a>
            </li>

            <li @if(request()->segment(1) == 'dosen') class="active" @endif>
                <a href="/dosen"><i class="fa fa-fw fa-user"></i> <span class="nav-label">Data Dosen</span></a>
            </li>

            <li @if(request()->segment(1) == 'user') class="active" @endif>
                <a href="/user"><i class="fa fa-fw fa-users"></i> <span class="nav-label">Data User</span></a>
            </li>

            <li @if(request()->segment(1) == 'nilai') class="active" @endif>
                <a href="/nilai"><i class="fa fa-fw fa-book"></i> <span class="nav-label">nilai</span></a>
            </li>

            <li @if(request()->segment(1) == 'report') class="active" @endif>
                <a href="/report"><i class="fa fa-fw fa-print"></i> <span class="nav-label">Report Nilai</span></a>
            </li>

           
        </ul>

    </div>
</nav>