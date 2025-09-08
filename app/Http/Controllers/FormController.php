<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        return view('form');
    }
    public function store(UserRequest $req)
    {

        return $req->all();
    }
}
