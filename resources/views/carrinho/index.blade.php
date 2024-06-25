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

<div class="container mt-5">
    <h2>Produtos</h2>
    <form action="{{ route('carrinho.checkout') }}" method="POST">
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
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome_produto }}</td>
                        <td>{{ $produto->descricao_produto }}</td>
                        <td>{{ $produto->preco_produto }}</td>
                        <td>
                            <input type="number" name="{{ $produto->id_tbl_produto }}" value="0" min="0" class="form-control">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
    </form>
</div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection