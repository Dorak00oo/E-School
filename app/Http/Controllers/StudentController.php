<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Student::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'grade' => ['nullable', 'integer', 'min:0', 'max:11'],
        ]);

        $student = Student::create($data);

        if ($request->wantsJson()) {
            return response()->json($student, 201);
        }

        return redirect()->route('students.index')->with('status', 'Estudiante creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): JsonResponse
    {
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['sometimes', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', 'unique:students,email,' . $student->id],
            'grade' => ['nullable', 'integer', 'min:0', 'max:11'],
        ]);

        $student->update($data);

        if ($request->wantsJson()) {
            return response()->json($student);
        }

        return redirect()->route('students.index')->with('status', 'Estudiante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Student $student): JsonResponse|RedirectResponse
    {
        $student->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('students.index')->with('status', 'Estudiante eliminado correctamente.');
    }
}


