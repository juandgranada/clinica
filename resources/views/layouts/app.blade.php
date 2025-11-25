<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clínica</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .navbar-nav .nav-link, 
    .navbar-nav .nav-link span,
    .navbar-nav .nav-link i {
        color: #fff !important;
    }
    body {
        background-image: url("{{ asset('storage/imagenes/fondo-clinica.jpg') }}");
        background-size: contain; /* <-- usa contain en vez de cover */
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color: #f4f8fb; /* color de respaldo */
        min-height: 100vh;
    }

    /* Capa semitransparente opcional para mejor contraste */
    main {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .navbar .dropdown-menu {
        background-color: white !important;
        border: 1px solid #ddd !important;
        border-radius: 8px !important;
        padding: 10px !important;
    }

    .navbar .dropdown-item {
        color: #333 !important;
    }

    .navbar .dropdown-item:hover {
        background-color: #f0f0f0 !important;
        color: #000 !important;
    }
</style>
</head>
<body>
    <!-- Navbar -->
    <class="navbar navbar-expand-lg style="background-color: #4da3ff;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">🏥 Clínica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                    aria-controls="menu" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
        <!-- Usuario logueado -->
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-danger" href="#" id="userMenu" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name ?? Auth::user()->username }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">

                <li>
                    <a class="dropdown-item" href="#">
                        Perfil
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">
                            🔴 Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </li>
        @endauth

    </ul>
</div>

        </div>
    </nav>

    <!-- Contenido -->
    <main class="container my-4">
        @yield('content')
    </main>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll("a[href='{{ route('logout') }}']").forEach(function(el) {
                el.addEventListener("click", function (e) {
                    e.preventDefault();
                    document.getElementById("logout-form").submit();
                });
            });
        });
    </script>


    <!-- Bootstrap JS (para el menú colapsable en móviles) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
