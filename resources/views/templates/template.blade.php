<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Iconos -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>ROCKSTAR</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/eddie.png') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">ROCKSTAR 🤘 <br> <strong>{{ Auth::user()->name }}</strong></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ url('customer') }}"><i class="fas fa-user-tag"></i> Customer</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ url('employee') }}"><i class="fas fa-user-tie"></i> Employee</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ url('users') }}"><i class="fas fa-users"></i> Users</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ url('mediatype/create') }}"><i class="fas fa-upload"></i> Upload media types</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ url('reportpdf') }}"><i class="far fa-file-alt"></i> Report</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href=" {{ url('customer') }} "><i class="fas fa-home"></i> Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('logout') }}"><i class="fas fa-arrow-circle-left"> Logout</i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <!-- Zona de las vistas -->
                    @yield('contenido')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
