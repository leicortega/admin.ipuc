<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('usuarios', ['usuarios' => User::all()]);
    }

    public function create(Request $request) {

        $usuario = User::create([
            'identificacion' => $request['identificacion'], 
            'name' => $request['name'], 
            'email' => $request['email'], 
            'password' => Hash::make($request['password'])
        ]);

        if ($usuario->save()) {
            return redirect()->route('usuarios')->with(['creado' => 1]);
        }

        return redirect()->route('usuarios')->with(['creado' => 0]);
    }
}
