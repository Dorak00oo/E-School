<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Teacher::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('teachers.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher): View
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:teachers,email'],
            'subject' => ['nullable', 'string', 'max:255'],
        ]);

        $teacher = Teacher::create($data);

        if ($request->wantsJson()) {
            return response()->json($teacher, 201);
        }

        return redirect()->route('teachers.index')->with('status', 'Docente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher): JsonResponse
    {
        return response()->json($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['sometimes', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', 'unique:teachers,email,' . $teacher->id],
            'subject' => ['nullable', 'string', 'max:255'],
        ]);

        $teacher->update($data);

        if ($request->wantsJson()) {
            return response()->json($teacher);
        }

        return redirect()->route('teachers.index')->with('status', 'Docente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Teacher $teacher): JsonResponse|RedirectResponse
    {
        $teacher->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('teachers.index')->with('status', 'Docente eliminado correctamente.');
    }
}


