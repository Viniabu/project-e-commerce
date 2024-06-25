<?php

use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
}
)->name('index');
Route::get('produtos/index', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('produtos/store', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('produtos/edit/{id}',[ProdutoController::class,'edit',]) ->name('produto.edit');
Route::put('produtos/update/{id}' ,[ProdutoController::class,'update'])->name('produto.update');
Route::delete('produtos/destroy/{id}' ,[ProdutoController::class,'destroy'])->name('produto.destroy');

Route::get('carrinho/index', [CarrinhoController::class,'index'])->name('carrinho.index');
Route::post('carrinho/store', [CarrinhoController::class,'store'])->name('carrinho.store');
Route::post('carrinho/checkout',[CarrinhoController::class,'checkout'])->name('carrinho.checkout');