<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h3>LPKS ZIHO</h3>
                <div class="profile">
                    <h4>admin</h4>
                    <span class="status online text-success">Online</span>
                </div>
            </div>
            <ul class="list-unstyled components">
                <li><a href="{{ route('admins.dashboard') }}">
                    <span class="icon">
                        <i class="fas fa-home"></i>
                    </span>
                    <span>Dashboard</span>
                </a></li>
                <li><a href="{{ route('pengajar.index') }}">
                    <span class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </span>
                    <span>Data Pengajar</span>
                </a></li>
                <li><a href="{{ route('program_study.index') }}">
                    <span class="icon">
                        <i class="fas fa-graduation-cap"></i>
                    </span>
                    <span>Program Pelatihan</span>
                </a></li>
                <li><a href="{{ route('soal_ujian.index') }}">
                    <span class="icon">
                        <i class="fas fa-file-alt"></i>
                    </span>
                    <span>Bank Soal</span>
                </a></li>
                <li><a href="{{ route('siswa.index') }}">
                    <span class="icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span>Data Siswa</span>
                </a></li>
                <li><a href="{{ route('peserta.index') }}">
                    <span class="icon">
                        <i class="fas fa-user-check"></i>
                    </span>
                    <span>Peserta Ujian</span>
                </a></li>
                <li><a href="{{ route('hasil_ujian.index') }}">
                    <span class="icon">
                        <i class="fas fa-poll"></i>
                    </span>
                    <span>Hasil Ujian</span></a>
                </li>
                <li><a href="{{ route('modul_materi.index') }}">
                    <span class="icon">
                        <i class="fas fa-book"></i>
                    </span>
                    <span>Modul Materi</span></a></li>
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span>Keluar Akun</span>
                </a></li>
            </ul>
        </nav>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleSidebar()">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('admins.dashboard') }}">Dashboard</a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="material-icons">person</i>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="material-icons">exit_to_app</i>
                                    <span class="d-lg-none d-md-block">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
</body>
<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('active');
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
@yield('scripts')
</html>