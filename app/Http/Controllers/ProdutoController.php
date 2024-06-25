<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    function index()
    {
        $produtos = Produto::all();

        return view('produto.index')->with('produtos', $produtos);
    }
    function create()
    {
        return view('produto.create');
    }
    function store(Request $request)
    {
       $request->validate([
            'nome_produto' => 'required',
            'descricao_produto' => 'required',
            'preco_produto' => 'required',
            'estoque' => 'required',
        ]);

        $dados = $request->except('_token');
        $produto = Produto::firstOrCreate($dados);
        return redirect()->route('produto.index');
    }
    function show($id)
    {
        $produto = Produto::find($id);
        return view('produto.show', compact('produto'));
    }
    function edit($id)
    {
        
        $produto = Produto::find($id);        
        return view('produto.edit', compact('produto'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'nome_produto' => 'required',
            'descricao_produto' => 'required',
            'preco_produto' => 'required',
            'estoque' => 'required',
        ]);
        $produto = Produto::find($id);
        $produto->update($request->all());
        return redirect()->route('produto.index');
    }
    function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produto.index');
    }





}
