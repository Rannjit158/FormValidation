<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form; // Make sure this model exists

class FormController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $form = $request->validate([
            'name' => 'required|alpha|max:255',
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:14',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/'
            ],
            'age' => 'required|numeric|between:18,30',
        ],
        [
            
        ]);

        Form::create($form);

        return redirect('/')->with('success', 'Form submitted successfully');
    }
}
