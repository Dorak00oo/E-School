<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the main application dashboard.
     */
    public function index(): View
    {
        return view('welcome');
    }

    /**
     * Show the students listing view.
     */
    public function students(): View
    {
        return view('students.index', [
            'students' => \App\Models\Student::all(),
        ]);
    }

    /**
     * Show the teachers listing view.
     */
    public function teachers(): View
    {
        return view('teachers.index', [
            'teachers' => \App\Models\Teacher::all(),
        ]);
    }
}


