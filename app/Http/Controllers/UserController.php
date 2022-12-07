<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::Paginate(10);
        return view('users.index', ['users' => $users]);
    }

    public function create() {   //MUESTRA FORMULARIO VACIO
        return view('users.create');
    }

    public function store(Request $request) {   //RECIBE EL POST DEL CREATE        
        $campos = [
            'name'          => 'required|min:8',
            'email'         => 'required|email|unique:users,email',
            'role'          => 'required|string',
            'password'      => 'required|string|min:8|confirmed',
        ];

        $mensaje = [
            'email.required' => 'El email para el usuario es requerido.',
            'email.email' => 'El email no tiene formato válido.',
            'email.unique' => 'El email ya existe en la base de datos.',
            'name.required' => 'El nombre del usuario es requerido.',
            'role.required' => 'El rol del usuario es requerido.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe ser mayor a 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'name.min' => 'El nombre del usuario debe ser mayor a 8 caracteres.'
        ];

        $this->validate($request, $campos, $mensaje);

        $user = User::create([
            'name'          =>  $request->name,
            'email'         =>  $request->email,
            'role'          =>  $request->role,
            'password'      =>  Hash::make($request->password)
        ]);
        $result = $user->save();

        if ($result) {
            return redirect()->route('index.user')->with('success','Se creo el usuario correctamente.');
        }else{
            return Redirect()->back()->with('error','Usuario no Creado.');
        }
    }

    public function edit($id) {
        $user = User::find($id);        
        
        //Revisa que el usuario exista
        if (isset($user)) {
            return view('users.edit', compact('user'));
        }else{
            return Redirect()->back()->with('error','Usuario no encontrado.');
        }
    }

    public function update($id, Request $request) {
        $user = User::find($id);
        
        //Revisa que el usuario exista
        if (isset($user)) {
            $request->validate([
                'name'          => 'required|min:8',
                'email'         => 'required|email',
                'role'          => 'required|string',
            ]);

            if (isset($request->email)) {
                $email = $request->email;
                if ($email <> $user->email) {
                    if (DB::table('users')->where('email', $email)->exists()) {
                        return redirect()->back()->with('error', 'El email ya existe.');
                    }
                }
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();

            return redirect()->route('index.user')->with('success','Usuario Editado Correctamente.');
        }
    }

    public function show($id) {
        $user = User::find($id);
        if(isset($user)) {
            return view('users.show', compact('user'));
        }else{
            return Redirect()->back()->with('error','Usuario no encontrado.');
        }
    }

    public function destroy($user_id) {
        User::destroy($user_id);
        return redirect()->route('index.user')->with('success',"Usuario Eliminado Correctamente.");
    }
}
