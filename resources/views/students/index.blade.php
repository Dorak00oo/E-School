<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes | E-School</title>
    @vite('resources/css/students.css')
</head>
<body class="students">
    <div class="students__container">
        <div class="students__toolbar">
            <a href="{{ route('home') }}" class="students__toolbar-button students__toolbar-button--secondary">
                Volver
            </a>
            <a href="{{ route('students.create') }}" class="students__toolbar-button students__toolbar-button--primary">
                Agregar estudiante
            </a>
        </div>

        @if (session('status'))
            <div class="students__alert">
                {{ session('status') }}
            </div>
        @endif

        <header class="students__header">
            <h1 class="students__title">Directorio de Estudiantes</h1>
            <p class="students__subtitle">
                Consulta la información de cada estudiante y gestiona su progreso académico desde aquí.
            </p>
        </header>

        @if ($students->isEmpty())
            <div class="students__empty">
                Aún no tienes estudiantes registrados. Crea el primero para comenzar.
            </div>
        @else
            <section class="students__list">
                @foreach ($students as $student)
                    <article class="students__card">
                        <h2 class="students__card-name">
                            {{ $student->first_name }} {{ $student->last_name }}
                        </h2>
                        <p class="students__card-detail">
                            <span class="students__card-label">Correo:</span>
                            {{ $student->email }}
                        </p>
                        <p class="students__card-detail">
                            <span class="students__card-label">Grado:</span>
                            {{ isset($student->grade) ? min($student->grade, 11) : 'Sin asignar' }}
                        </p>
                        <div class="students__card-actions">
                            <a href="{{ route('students.edit', $student) }}" class="students__card-button students__card-button--update">
                                Actualizar
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="students__card-button students__card-button--delete">
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


