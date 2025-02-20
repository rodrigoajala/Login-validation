<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ValidationCodeRequest;
use App\Mail\ValidationCodeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{

    public function loginValidation(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors( 'As credenciais fornecidas são inválidas.');
        }

        $validationCode = rand(100000, 999999);

        $user->update([
            'validation_code' => $validationCode,
            'validation_code_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new ValidationCodeMail($validationCode));

        return redirect()->route('verify.validation.code')
            ->with('success', 'Login realizado com sucesso. Será enviado um código de verificação para o email ' . $user->email);
    }

    public function verifyCode(ValidationCodeRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = User::where('validation_code', $request->validation_code)->first();

            if (!$user || !$user->validation_code) {
                return redirect()->route('verify.validation.code')
                    ->withErrors(' Codigo invalido ou expirado. Tente novamente');
            }

            if($user->validation_code_expires_at < now()){
                $user->update([
                    'validation_code' => null,
                    'validation_code_expires_at' => null
                ]);

                return redirect()->route('verify.validation.code')->withErrors('Tempo do código excedido. Clique em "Clique aqui para reenviar o código."');
            }

            if ($user->validation_code === $request->validation_code ) {
                auth()->login($user);
                $user->update([
                    'validation_code' => null,
                    'validation_code_expires_at' => null
                    ]);

                return redirect()->route('welcome')->with('Login realizado com sucesso!');
            }

            return redirect()->back();

        } catch (\Exception $exception){
            return redirect()->back();
        }
    }

    public function welcome()
    {
        $user = auth()->user();

        return view('welcome',[
           'user' => $user
       ]);
    }

}
