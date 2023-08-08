<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
use App\SiteContato;


class ContatoController extends Controller
{
  public function contato(Request $request) {
    $motivo_contatos = MotivoContato::all();

    return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
  }

  public function salvar(Request $request) {
    $request->validate([
      'nome' => 'required|min:3|max:40|unique:site_contatos',
      'telefone' => 'required',
      'email' => 'email',
      'motivo_contatos_id' => 'required',
      'mensagem' => 'required',
    ]);

    SiteContato::create($request->all());
    return redirect()->route('site.index');
  }
}
