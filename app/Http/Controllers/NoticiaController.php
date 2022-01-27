<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //criar um dado dentro do bd Redis. Chave, valor, tempo em segundos que o dado fica em memória
        //Cache::put('site', 'murilloaguiar.github.io', 10);

        //recuperar um dado dentro do bd Redis. Nome da chave cujo valor queremos recuperar
        //$site = Cache::get('site');

        //echo $site;

        //criando em cache uma posição para armazenar os dados da consulta

        /*verificando no redis se já existe um valor
        if(Cache::has('dez_primeiras_noticias')){
            //recuperando as notícias caso existam no redis 
            $noticias = Cache::get('dez_primeiras_noticias');
        }else{
            //inserindo as notícias caso não existam
            $noticias = Noticia::orderByDesc('created_at')->limit(10)->get();
            Cache::put('dez_primeiras_noticias', $noticias, 15);
        };*/

        //faz exatamente a mesma coisa do if acima
        $noticias = Cache::remember('dez_primeiras_noticias', 15, function(){
            return $noticias = Noticia::orderByDesc('created_at')->limit(10)->get();
        });

        return view('noticias', [
            'noticias' => $noticias
        ]);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoticiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoticiaRequest  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
