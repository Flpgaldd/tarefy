<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            // 🔒 ALTERADO: regra de senha customizada, substituindo Rules\Password::defaults().
            // Exige: mínimo 8 caracteres (min(8)) + pelo menos 1 letra (letters()) +
            // pelo menos 1 número (numbers()) + pelo menos 1 caractere especial (symbols()).
            // O texto de erro de cada uma dessas condições já vem pronto do Laravel
            // (arquivo lang/pt_BR/validation.php, se você tiver o idioma instalado —
            // te aviso sobre isso mais abaixo na explicação).
            'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()->numbers()->symbols()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
