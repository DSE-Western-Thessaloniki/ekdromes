<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ekdromes - DDE DYT Thessalonikis')</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/dropzone5.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 16px;
            background: linear-gradient(to bottom, #ffffff, rgb(255, 122, 89));
            min-height: 100vh;
        }
        .navbar-custom {
            background-color: rgb(255, 122, 89);
            border-color: #e74c3c;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: #fff;
        }
        .navbar-custom .navbar-nav > li > a {
            color: #fff;
        }
        .navbar-custom .navbar-nav > li > a:hover,
        .navbar-custom .navbar-nav > li > a:focus {
            color: #ffe0d6;
        }
        .content-wrapper {
            padding: 20px;
            min-height: calc(100vh - 180px);
        }
        .footer {
            background-color: rgb(255, 122, 89);
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
        .bus-logo {
            height: 40px;
            margin-right: 10px;
        }
        .panel-primary {
            border-color: rgb(255, 122, 89);
        }
        .panel-primary > .panel-heading {
            background-color: rgb(255, 122, 89);
            border-color: rgb(255, 122, 89);
        }
        .btn-primary {
            background-color: rgb(255, 122, 89);
            border-color: rgb(255, 122, 89);
        }
        .btn-primary:hover {
            background-color: #ff6b52;
            border-color: #ff6b52;
        }
    </style>

    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="{{ asset('icons8-bus-64.png') }}" alt="Logo" class="bus-logo">
                    Εκδρομές - ΔΔΕ ΔΥΤ Θεσσαλονίκης
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @auth('cas')
                        <li><a href="{{ route('dashboard') }}">Αρχική</a></li>
                        <li><a href="{{ route('excursion.create') }}">Νέα Εκδρομή</a></li>
                        @if($isAdmin ?? false)
                            <li><a href="{{ route('admin.index') }}">Διαχείριση</a></li>
                        @endif
                    @endauth
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @auth('cas')
                        <li>
                            <a href="#">
                                {{ $currentYear->sxoliko_etos ?? '' }}
                                @if($currentSchool ?? null)
                                    - {{ $currentSchool->displayname }}
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <span class="glyphicon glyphicon-log-out"></span> Αποσύνδεση
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container content-wrapper">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Τμήμα Πληροφορικής - ΔΔΕ ΔΥΤ Θεσσαλονίκης</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/3.6.4_jquery.min.js') }}"></script>
    <script src="{{ asset('js/3.4.1_bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dropzone5.min.js') }}"></script>
    <script src="{{ asset('js/ekdromes_funcs.js') }}"></script>

    @yield('scripts')
</body>
</html>
