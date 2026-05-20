<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get stats based on user role
        $data = [];
        
        if ($user->role === 'professor') {
            $data['lessons_count'] = $user->teacher->lessons()->count();
            $data['students_count'] = $user->teacher->lessons()->distinct('student_id')->count();
            $data['rating'] = $user->teacher->reviews()->avg('rating');
        } else {
            $data['lessons_count'] = $user->student->lessons()->count();
            $data['teachers_count'] = $user->student->lessons()->distinct('teacher_id')->count();
        }
        
        return view('dashboard', $data);
    }
}
