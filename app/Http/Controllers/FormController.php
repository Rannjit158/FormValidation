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
            'name.required' => "Name is required",
            'name.alpha' => 'Name must be alphabetic',
            'email.required' => "Email is required",
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email has already been taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be minimum 8 characters',
            'password.max' => 'Password must be maximum 14 characters',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character',
            'age.required' => 'Age is required',
            'age.numeric' => 'Age must be a number',
            'age.between' => 'Age must be between 18 and 30',
        ]);

        Form::create($form);

        return redirect('/')->with('success', 'Form submitted successfully');
    }
}
