<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar docente | E-School</title>
    @vite('resources/css/teachers-form.css')
</head>
<body class="teacher-form">
    <div class="teacher-form__container">
        <div class="teacher-form__toolbar">
            <a href="{{ route('teachers.index') }}" class="teacher-form__toolbar-link">
                Volver al equipo docente
            </a>
        </div>

        <section class="teacher-form__card">
            <header class="teacher-form__header">
                <h1 class="teacher-form__title">Editar docente</h1>
                <p class="teacher-form__description">
                    Actualiza los datos del docente y mantén su información al día.
                </p>
            </header>

            @if ($errors->any())
                <div class="teacher-form__errors">
                    @foreach ($errors->all() as $error)
                        <p class="teacher-form__errors-item">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('teachers.update', $teacher) }}" method="POST" class="teacher-form__form">
                @csrf
                @method('PUT')

                <div class="teacher-form__group">
                    <label for="first_name" class="teacher-form__label">Nombre *</label>
                    <input
                        id="first_name"
                        name="first_name"
                        type="text"
                        class="teacher-form__input"
                        value="{{ old('first_name', $teacher->first_name) }}"
                        required
                    >
                </div>

                <div class="teacher-form__group">
                    <label for="last_name" class="teacher-form__label">Apellido</label>
                    <input
                        id="last_name"
                        name="last_name"
                        type="text"
                        class="teacher-form__input"
                        value="{{ old('last_name', $teacher->last_name) }}"
                    >
                </div>

                <div class="teacher-form__group">
                    <label for="email" class="teacher-form__label">Correo electrónico *</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="teacher-form__input"
                        value="{{ old('email', $teacher->email) }}"
                        required
                    >
                </div>

                <div class="teacher-form__group">
                    <label for="subject" class="teacher-form__label">Asignatura</label>
                    <input
                        id="subject"
                        name="subject"
                        type="text"
                        class="teacher-form__input"
                        value="{{ old('subject', $teacher->subject) }}"
                    >
                    <p class="teacher-form__hint">Escribe la materia principal que imparte este docente.</p>
                </div>

                <div class="teacher-form__actions">
                    <a href="{{ route('teachers.index') }}" class="teacher-form__button teacher-form__button--ghost">
                        Cancelar
                    </a>
                    <button type="submit" class="teacher-form__button teacher-form__button--primary">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>


