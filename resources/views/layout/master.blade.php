<!DOCTYPE html>
<html>

<head>
    @include('layout.header')

    @yield('css')
</head>

<body class="">

    <div id="wrapper">

        @include('layout.sidebar')

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Aplikasi Input Nilai Mahasiswa Teknik Informatika.</span>
                </li>

                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>@yield('judul')</h2>
                </div>
            </div>

            @yield('content')
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2017
                </div>
            </div>

        </div>
        </div>

        @include('layout.footer')
        @yield('script')


</body>

</html>
