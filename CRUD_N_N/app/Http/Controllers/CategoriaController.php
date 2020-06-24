<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\categoria;
use Validator;
use App\Produto;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{

    protected function validarCategoria($request)
    {
        $validator = Validator::make($request->all(), [
            "descricao" => "required"
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

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        if ($buscar) {
            $categorias = Categoria::where('descricao', '=', $buscar)->paginate($qtd);
        } else {
            $categorias = Categoria::paginate($qtd);
        }
        $categorias = $categorias->appends(Request::capture()->except('page'));
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('categorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarCategoria($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $dados = $request->all();
        Categoria::create($dados);

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categorias.edit', compact('categoria'));
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
        $validator = $this->validarCategoria($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $categoria = Categoria::find($id);
        $dados = $request->all();
        $categoria->update($dados);

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DB::table('categoria_produto')->where('categoria_id', $id)->count()) {
            $msg = "Não é possível excluir esta categoria. Os produtos com id ( ";
            $produtos = DB::table('categoria_produto')->where('categoria_id', $id)->get();
            foreach ($produtos as $produto) {
                $msg .= $produto->produto_id . " ";
            }
            $msg .= " ) estão relacionados com esta categoria";
            \Session::flash('mensagem', ['msg' => $msg]);
            return redirect()->route('categorias.remove', $id);
        }

        Categoria::find($id)->delete();
        return redirect()->route('categorias.index');
    }

    public function remover($id)
    {
        $categoria = Categoria::find($id);

        return view('categorias.remove', compact('categoria'));
    }

    public function produtos($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.produtos', compact('categoria'));
    }
}
