<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public function index()
    {
        return view('pages/index');
    }

    public function post(Request $req)
    {
        $req->validate([
          'nome' => 'required',
          'telefone' => 'sometimes',
          'Whatsapp' => 'required',
          'nfazenda' => 'required',
          'efazenda' => 'required',
        ]);
          $data = [
          'nome'=>$req->nome,
          'telefone'=>$req->telefone,
          'Whatsapp'=>$req->Whatsapp,
          'nfazenda'=>$req->nfazenda,
          'efazenda'=>$req->efazenda,
        ];

        Mail::send('mail.mail', $data, function ($mensagem) use ($data) {
            $mensagem->from('bc15c2@gmail.com');
            $mensagem->to('bc15c2@gmail.com', 'E-mail site');
            $mensagem->subject('Realização pré-cadastro.');

        });

        return redirect()->back()->with('alert', 'Pré-cadastro realizado !');
    }
}
