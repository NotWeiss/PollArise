<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    //
    public function arrive()
    {
        return view('home');
    }

    public function createSurvey(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['description'] = "Una Nueva Encuesta";
        $data['userID'] = Auth::id();

        Survey::create($data);
    }
}
