<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docentes | E-School</title>
    @vite('resources/css/teachers.css')
</head>
<body class="teachers">
    <div class="teachers__container">
        <div class="teachers__toolbar">
            <a href="{{ route('home') }}" class="teachers__toolbar-button teachers__toolbar-button--secondary">
                Volver
            </a>
            <a href="{{ route('teachers.create') }}" class="teachers__toolbar-button teachers__toolbar-button--primary">
                Agregar docente
            </a>
        </div>

        @if (session('status'))
            <div class="teachers__alert">
                {{ session('status') }}
            </div>
        @endif

        <header class="teachers__header">
            <h1 class="teachers__title">Equipo Docente</h1>
            <p class="teachers__subtitle">
                Administra la información del personal docente y mantén actualizadas las asignaturas que imparten.
            </p>
        </header>

        @if ($teachers->isEmpty())
            <div class="teachers__empty">
                Aún no tienes docentes registrados. Agrega el primero para comenzar.
            </div>
        @else
            <section class="teachers__list">
                @foreach ($teachers as $teacher)
                    <article class="teachers__card">
                        <h2 class="teachers__card-name">
                            {{ $teacher->first_name }} {{ $teacher->last_name }}
                        </h2>
                        <p class="teachers__card-detail">
                            <span class="teachers__card-label">Correo:</span>
                            {{ $teacher->email }}
                        </p>
                        <p class="teachers__card-detail">
                            <span class="teachers__card-label">Asignatura:</span>
                            {{ $teacher->subject ?? 'Sin asignar' }}
                        </p>
                        <div class="teachers__card-actions">
                            <a href="{{ route('teachers.edit', $teacher) }}" class="teachers__card-button teachers__card-button--update">
                                Actualizar
                            </a>
                            <form action="{{ route('teachers.destroy', $teacher) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="teachers__card-button teachers__card-button--delete">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </section>
        @endif
    </div>
</body>
</html>


