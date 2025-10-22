<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clínica</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">🏥 Clínica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                    aria-controls="menu" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('medicos.index') }}">👨‍⚕️ Médicos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pacientes.index') }}">🧑‍🤝‍🧑 Pacientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('consultas_medicas.index') }}">📋 Consultas</a></li> 
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="container my-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS (para el menú colapsable en móviles) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
