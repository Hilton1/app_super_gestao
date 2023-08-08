<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
  //
  public function index() {
    return view('site.login', ['titulo' => 'Login']);
  }

  public function autenticar(Request $request) {
    // regras de validação
    $regras = [
      'usuario' => 'email',
      'senha' => 'required',
    ];

    $feedback = [
      'usuario.email' => 'O campo usuário (e-mail) é obrigatório.',
      'senha.required' => 'O campo senha é obrigatório'
    ];

    $request->validate($regras, $feedback);

    // Recuperando os parâmetros do usuário
    $email = $request->get('usuario');
    $password = $request->get('senha');

    echo "Usuário: $email - Senha: $password";
    echo '<br>';

    // Iniciando o Model User
    $user = new User();

    $usuario = $user->where('email', $email)
      ->where('password', $password)
      ->get()
      ->first();

    if(isset($usuario->name)) {
      echo 'Usuário existe';
    } else {
      echo 'Usuário não existe.';
    }
  }
}
