@extends('layouts.app')
@section('title','Lista de produtos')
@section('styles')
    <style>
        .table-container {
            margin-top: 50px;
        }
    </style>
@endsection
@section('content')

<div class="container mt-4">
    <h2>Produtos</h2>
    <form action="{{ route('carrinho.store') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>                    
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody> 
                @foreach ($produtos as $indice => $produto)
                    <tr>
                        <td>{{ $produto->nome_produto }}</td>
                        <input  type="hidden" name="id_tbl_produto[{{ $indice }}]" value="{{ $produto->id_tbl_produto }}" >
                        <td>{{ $produto->descricao_produto }}</td>
                        <td>{{ $produto->preco_produto }}</td>
                        <td> {{ $quantidade[$indice] }}</td>
                        <input  type="hidden" name="quantidade[{{ $indice }}]" value="{{ $quantidade[$indice] }}" >
                    </tr>
                @endforeach                
            </tbody>
            <tr>
                <th> Valor Total: </th>
                    <td>R$: {{ $valor_total }}</td>
                    <input  type="hidden" name="valor_total" value="{{ $valor_total }}" >
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Confirmar Compra</button>
    </form>
</div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection