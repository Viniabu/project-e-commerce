<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\ProdutoCarrinho;
use Illuminate\Support\Facades\DB;

class CarrinhoController extends Controller
{
    function index()
    {
        $carrinho = Carrinho::all();
        $produtos = Produto::all();
        

        return view('carrinho.index')
        ->with('carrinho', $carrinho)
        ->with('produtos', $produtos);
    }
    function create()
    {
        return view('carrinho.create');
    }
    function store(Request $request)
    {
        
        $produtos = $request->except('_token','valor_total');
    
        DB::beginTransaction();
        try {
        $carrinho = Carrinho::create([
            'valor_total' => $request->input("valor_total")
        ]);
    
        foreach ($produtos['id_tbl_produto'] as $k => $produto){
            ProdutoCarrinho::firstOrCreate([
                'id_tbl_carrinho' => $carrinho->id_tbl_carrinho,
                'id_tbl_produto' => $produto,
                'quantidade' => $produtos['quantidade'][$k],
            ]);
        }
        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();
    }

        return redirect()->route('carrinho.index');
    }

    function checkout(Request $request){
        $produtosArray = $request->except('_token');
        $valor_total = 0;
        $i = 0; //contador
        
        foreach ($produtosArray as $k => $v) {
            if($v != 0){
                $p = Produto::find($k);
                $valor_total += $p->preco_produto * $v;
                $produtos[$i] = $p;
                $quantidade[$i] = $v;
                $i++;
            }
        }
        

        return view('carrinho.checkout')
        ->with('produtos', $produtos)
        ->with('valor_total', $valor_total)
        ->with('quantidade', $quantidade);
    }




    function show($id)
    {
        $carrinho = Carrinho::find($id);
        return view('carrinho.show', compact('carrinho'));
    }
    function edit($id)
    {
        
        $produto = Carrinho::find($id);        
        return view('carrinho.edit', compact('carrinho'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'valor_total' => 'required',
        ]);
        $carrinho = Carrinho::find($id);
        $carrinho->update($request->all());
        return redirect()->route('carrinho.index');
    }
    function destroy($id)
    {
        $carrinho = Carrinho::find($id);
        $carrinho->delete();
        return redirect()->route('carrinho.index');
    }
}
