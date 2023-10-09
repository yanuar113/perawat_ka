<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Perawatan KA- @yield('title')</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ asset('templates/source/assets/plugins/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('templates/source/assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/source/assets/plugins/pace/pace.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/source/assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{ asset('templates/source/assets/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/source/assets/css/custom.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('templates/source/assets/images/inka-border.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('templates/source/assets/images/inka-border.png') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="#" class="logo-icon"><span class="logo-text">IMSS</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <img src="{{ asset('templates/source/assets/images/avatars/avatar1.jpeg') }}">
                        <span class="activity-indicator"></span>
                        <span class="user-info-text">Admin<br><span class="user-state-info">online</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Master
                    </li>
                    <li>
                        <a href="{{ url('dashboard') }}" class="{{ $active == 'dashboard' ? 'active' : '' }}"><i
                                class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('kereta') }}" class="{{ $active == 'master_kereta' ? 'active' : '' }}">
                            <i class="material-icons-two-tone">train</i>Master Kereta</a>
                    </li>
                    <li>
                        <a class="{{ $active == 'master_sparepart' ? 'active' : '' }}"><i
                                class="material-icons-two-tone">handyman</i>Master Sparepart<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('kategori') }}">Kategori</a>
                            </li>
                            <li>
                                <a href="{{ url('sparepart') }}">Sparepart</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{ $active == 'master_checksheet' ? 'active' : '' }}"><i
                                class="material-icons-two-tone">save_as</i>Master Checksheet<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('kategori_checksheet') }}">Kategori Checksheet</a>
                            </li>
                            <li>
                                <a href="#">Sub Kategori Checksheet</a>
                            </li>
                            <li>
                                <a href="{{ url('item_checksheet') }}">Uraian Pekerjaan</a>
                            </li>
                            <li>
                                <a href="{{ url('checksheet') }}">Checksheet</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-title">
                        Reports
                    </li>
                    <li>
                        <a href="{{ url('foto') }}" class="{{ $active == 'foto' ? 'active' : '' }}">
                            <i class="material-icons-two-tone">perm_media</i>Foto</a>
                    </li>
                    <li>
                        <a href="#" class="{{ $active == 'laporan' ? 'active' : '' }}">
                            <i class="material-icons-two-tone">receipt_long</i>Berita Acara</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i
                                            class="material-icons">menu</i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> @yield('title')</a>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i
                                            class="material-icons">search</i></a>
                                </li>
                                <li class="nav-item-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        data-bs-toggle="dropdown">
                                        <i class="material-icons">account_circle</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('templates/source/assets/js/pages/popper.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('templates/source/assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/js/main.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/js/custom.js') }}"></script>
    <script src="{{ asset('templates/source/assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('templates/source/assets/js/pages/datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
