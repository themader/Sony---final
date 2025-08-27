<?php

namespace App\Http\Controllers;

use App\Models\UserSony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $validationRules = [
        'name' => 'required|min:2',
        'role' => 'required',
        'email' => 'required|email|unique:users_sony,email',
        'password' => 'required|min:6',
    ];

    protected $validationMessages = [
        'name.required' => 'El nombre es obligatorio.',
        'name.min' => 'El nombre debe tener al menos :min caracteres.',
        'role.required' => 'El rol es obligatorio.',
        'email.required' => 'El email es obligatorio.',
        'email.email' => 'El email debe ser válido.',
        'email.unique' => 'Este email ya está registrado.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos :min caracteres.',
    ];

    public function index()
    {
        $users = UserSony::all();
        return view('users.index', compact('users'));
    }

    public function view(int $id)
    {
        return view('users.view', [
            'user' => UserSony::findOrFail($id)
        ]);
    }

    public function create()
    {
        $users = UserSony::all();
        return view('users.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules, $this->validationMessages);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        UserSony::create($data);

        return redirect()->route('users.create')
            ->with('feedback.message', 'El usuario <b>' . e($request->name) . '</b> fue creado correctamente');
    }

    public function delete(int $id)
    {
        return view('users.delete', [
            'user' => UserSony::findOrFail($id)
        ]);
    }

    public function destroy(int $id)
    {
        $user = UserSony::findOrFail($id);
        $user->delete();

        return redirect()->route('users.create')
            ->with('feedback.message', 'El usuario <b>' . e($user->name) . '</b> fue eliminado correctamente');
    }

    public function edit(int $id)
    {
        return view('users.edit', [
            'user' => UserSony::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id)
    {
        $validationRules = [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users_sony,email,' . $id,
        ];

        if ($request->filled('password')) {
            $validationRules['password'] = 'min:6';
        }

        $request->validate($validationRules, $this->validationMessages);

        $user = UserSony::findOrFail($id);
        $input = $request->only(['name', 'email', 'role']);

        if ($request->filled('password')) {
            $input['password'] = bcrypt($request->input('password'));
        }

        $user->update($input);

        return redirect()->route('users.create')
            ->with('feedback.message', 'El usuario <b>' . e($user->email) . '</b> se modificó exitosamente');
    }

    public function registre()
    {
        return view('users.registre');
    }

    public function storeRegistre(Request $request)
    {
        $validationRules = [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users_sony,email',
            'password' => 'required|min:6',
        ];

        $validationMessages = [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser válido.',
            'email.unique' => 'Este email ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ];

        $request->validate($validationRules, $validationMessages);

        $data = $request->only(['name', 'email']);
        $data['password'] = bcrypt($request->input('password'));
        $data['role'] = 'Cliente';

        UserSony::create($data);

        return redirect()->route('auth.login')
            ->with('feedback.message', 'Tu cuenta fue creada correctamente. Ahora podés iniciar sesión.');
    }
}
