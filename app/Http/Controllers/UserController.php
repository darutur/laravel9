<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // $user = User::where('id', $id)->first(); primeira forma
        
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password); // Criptografando a senha

        User::create($data); // retorno o usuário

        return redirect()->route('users.index');

        // $user = new User();
        // $user->name = $request->name; 
        // $user->email = $request->email; 
        // $user->password = $request->password; 
        // $user->save();
    }
}
