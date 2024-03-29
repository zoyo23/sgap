<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;


class ControlaAutenticacao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("inicio");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function loggout()
    {
        session()->flush();
        return redirect()->action("ControlaUsuario@index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $form)
    {
        $autentica = new Usuario();
        $autentica->usuario = strtolower($form->usuario);
        $autentica->senha = md5($form->senha);

        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {

            if ($usuario->usuario == $autentica->usuario) {
                if ($usuario->ativo == 0) {
                    session()->flush();
                    session()->put("info", "Conta desativada!");
                    return back();
                }
                if ($usuario->senha == $autentica->senha) {
                    session()->flush();
                    session()->put("usuario", $usuario);
                    return back();
                } else {
                    session()->flush();
                    session()->put("info", "Senha Incorreta!");
                    return back();
                }
            } else {
                session()->flush();
                session()->put("info", "Nome de Usuário Incorreto!");
            }
        }

        return redirect()->action("ControlaUsuario@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
