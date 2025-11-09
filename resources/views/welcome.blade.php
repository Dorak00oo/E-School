<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-School | Inicio</title>
    @vite('resources/css/welcome.css')
</head>
<body class="welcome">
    <header class="welcome__header">
        <h1 class="welcome__title">Bienvenido a E-School</h1>
        <p class="welcome__description">
            Gestiona estudiantes y docentes desde un solo lugar. Ingresa en la sección
            que corresponda para administrar información académica de manera rápida y sencilla.
        </p>
    </header>

    <main class="welcome__options">
        <section class="welcome__card">
            <h2 class="welcome__card-title">Portal de Estudiantes</h2>
            <p class="welcome__card-text">
                Consulta el directorio de estudiantes, actualiza sus datos y da seguimiento a sus calificaciones
                y avances académicos.
            </p>
            <a class="welcome__card-link" href="{{ route('students.index') }}">Ir a estudiantes</a>
        </section>

        <section class="welcome__card">
            <h2 class="welcome__card-title">Portal de Docentes</h2>
            <p class="welcome__card-text">
                Administra la información de los docentes, asigna materias y consulta la disponibilidad
                del equipo docente.
            </p>
            <a class="welcome__card-link" href="{{ route('teachers.index') }}">Ir a docentes</a>
        </section>
    </main>

    <footer class="welcome__footer">
        © {{ date('Y') }} E-School. Todos los derechos reservados.
    </footer>
</body>
</html>


