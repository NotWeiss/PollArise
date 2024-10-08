<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Takes us to the Dashboard
    public function arrive()
    {
        $surveys = Survey::where('userID', Auth::id())->get();
        return view('home', ['surveys' => $surveys]);
    }


///////////////////////////////////////////////////////////////////////


    public function createSurvey()
    {
        // Default data for a new survey
        $data['title'] = "Nueva Encuesta";
        $data['description'] = "Nueva Encuesta";
        $data['userID'] = Auth::id();

        // Attempt to create a Survey
        Survey::create($data);

        return $this->arrive();
    }
    
}
