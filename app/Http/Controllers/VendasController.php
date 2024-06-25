<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendasController extends Controller
{
    function index()
    {
    
        $vendas = Venda::all();   
        return view('venda.index')
        ->with('vendas', $vendas);
    }
    function create()
    {
        return view('venda.create');
    }
    function store(Request $request)
    {
       $request->validate([
            'valor_total' => 'required',
        ]);

        $dados = $request->except('_token');
        $venda = Venda::firstOrCreate($dados);
        return redirect()->route('venda.index');
    }
    function show($id)
    {
        $query = DB::table("tbl_venda")
        ->join("tbl_carrinho","fk_tbl_carrinho_tbl_venda","tbl_carrinho.id_tbl_carrinho")
        ->join("tbl_produto_carrinho","tbl_produto_carrinho.id_tbl_carrinho","tbl_carrinho.id_tbl_carrinho")
        ->join("tbl_produto","tbl_produto_carrinho.id_tbl_produto","tbl_produto.id_tbl_produto")
        ->where("tbl_venda.id_tbl_venda",$id);

        
        $venda = $query->get();
        
        return view('venda.show', compact('venda'));
    }
    function edit($id)
    {        
        $venda = Venda::find($id);        
        return view('venda.edit', compact('venda'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'valor_total' => 'required',
        ]);
        $venda = Venda::find($id);
        $venda->update($request->all());
        return redirect()->route('venda.index');
    }
    function destroy($id)
    {
        $venda = Venda::find($id);
        $venda->delete();
        return redirect()->route('venda.index');
    }
}
