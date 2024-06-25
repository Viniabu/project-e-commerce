<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    function index()
    {
        $venda = Venda::all();

        return view('venda.index')->with('venda', $venda);
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
        $venda = Venda::find($id);
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
