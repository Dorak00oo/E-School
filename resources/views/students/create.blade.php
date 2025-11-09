<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar estudiante | E-School</title>
    @vite('resources/css/students-form.css')
</head>
<body class="student-form">
    <div class="student-form__container">
        <div class="student-form__toolbar">
            <a href="{{ route('students.index') }}" class="student-form__toolbar-link">
                Volver al directorio
            </a>
        </div>

        <section class="student-form__card">
            <header class="student-form__header">
                <h1 class="student-form__title">Registrar estudiante</h1>
                <p class="student-form__description">
                    Completa la información básica para registrar un nuevo estudiante en el sistema.
                </p>
            </header>

            @if ($errors->any())
                <div class="student-form__errors">
                    @foreach ($errors->all() as $error)
                        <p class="student-form__errors-item">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('students.store') }}" method="POST" class="student-form__form">
                @csrf
                <div class="student-form__group">
                    <label for="first_name" class="student-form__label">Nombre *</label>
                    <input
                        id="first_name"
                        name="first_name"
                        type="text"
                        class="student-form__input"
                        value="{{ old('first_name') }}"
                        required
                    >
                </div>

                <div class="student-form__group">
                    <label for="last_name" class="student-form__label">Apellido</label>
                    <input
                        id="last_name"
                        name="last_name"
                        type="text"
                        class="student-form__input"
                        value="{{ old('last_name') }}"
                    >
                </div>

                <div class="student-form__group">
                    <label for="email" class="student-form__label">Correo electrónico *</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="student-form__input"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="student-form__group">
                    <label for="grade" class="student-form__label">Grado</label>
                    <input
                        id="grade"
                        name="grade"
                        type="number"
                        min="0"
                        max="11"
                        class="student-form__input"
                        value="{{ old('grade') }}"
                    >
                    <p class="student-form__hint">Usa números enteros entre 0 y 11 para representar el grado académico.</p>
                </div>

                <div class="student-form__actions">
                    <a href="{{ route('students.index') }}" class="student-form__button student-form__button--ghost">
                        Cancelar
                    </a>
                    <button type="submit" class="student-form__button student-form__button--primary">
                        Guardar estudiante
                    </button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>


