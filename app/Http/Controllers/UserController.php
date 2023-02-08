<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:3|max:15' ,
            'lastname' => 'required',
            'tipodeusuario' => 'required|min:3|max:15' ,
            'email' => 'required|email|unique:users',
            'username'=> 'required|min:3|max:15',
            'password'=> 'required',
            
    
    
        ]);
        User::create($request->only('name','lastname','username','tipodeusuario','email')
            +['password' => bcrypt( $request->input('password')),
        
        ]);
        return redirect()->route('users.index')->with('success','Usuario creado correctamente');
    }
    public function index(){
        $users = User::paginate(5);
        return view('users.index',compact('users'));
    }
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id){
        $user=User::findOrFail($id);
        $data = request()->only('name','lastname','tipodeusuario','email','username');
        if(trim($request->password)==''){
            $data=$request->except('password');
        }
        else{
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Usuario actualizado');
    }
    public function destroy(User $user){
        $user->delete();
        return back()->with('success','usuarios eliminado correctamente');
    }
}

