<?php

namespace App\Http\Controllers;

use App\Imovel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{

    /**
     * Funcao para validar 
     *
     * @return 
     */
    protected function validarImovel($request)
    {
        $validator = Validator::make($request->all(), [
            "descricao" => "required",
            "logradouroEndereco" => "required",
            "bairroEndereco" => "required",
            "numeroEndereco" => "required | numeric",
            "cepEndereco" => "required",
            "cidadeEndereco" => "required",
            "preco" => "required | numeric",
            "qtdQuartos" => "required | numeric ",
            "tipo" => "required",
            "finalidade" => "required"
        ]);
        return $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qtd = $request['qtd'] ?: 2;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
        $tipo = $request['tipo'];

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });
        if ($buscar) {
            $imoveis = DB::table('imoveis')->where('cidadeEndereco', '=', $buscar)->paginate($qtd);
        } else {
            if ($tipo) {
                $imoveis = DB::table('imoveis')->where('tipo', '=', $tipo)->paginate($qtd);
            } else {
                $imoveis = DB::table('imoveis')->paginate($qtd);
            }
        }
        $imoveis = $imoveis->appends(Request::capture()->except('page'));

        return view('imoveis.index', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imoveis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarImovel($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $dados = $request->all();
        Imovel::create($dados);

        return redirect()->route('imoveis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imovel = Imovel::find($id);

        return view('imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imovel = Imovel::find($id);

        return view('imoveis.edit', compact('imovel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validarImovel($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $imovel = Imovel::find($id);
        $dados = $request->all();
        $imovel->update($dados);

        return redirect()->route('imoveis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Imovel::find($id)->delete();
        return redirect()->route('imoveis.index');
    }

    public function remover($id)
    {
        $imovel = Imovel::find($id);

        return view('imoveis.remove', compact('imovel'));
    }
}
