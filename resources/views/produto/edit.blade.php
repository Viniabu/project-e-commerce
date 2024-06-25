@extends('layouts.app')
@section('title', 'Lista de Produtos')
@section('styles')
    <style>
    .table-container {
        margin-top: 50px;
    }
    .btn {
        margin-top: 10px;

    }
    </style>
@endsection
@section('content')

    <div class="container table-container">
        <h1 class="text-center">Criar produto</h1>
        <form action="{{ route('produto.update', $produto->id_tbl_produto) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nome_produto">Nome:</label>                
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="{{ old('nome_produto', $produto->nome_produto) }}" required>
                @error('nome_produto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        
                <label for="descricao_produto">Descrição:</label>
                <input type="text" class="form-control" id="descricao_produto" name="descricao_produto" value="{{ old('descricao_produto', $produto->descricao_produto) }}" required>
                @error('descricao_produto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        
                <label for="preco_produto">Preço:</label>
                <input type="number" class="form-control" id="preco_produto" name="preco_produto" step="0.01" value="{{ old('preco_produto', $produto->preco_produto) }}" required>
                @error('preco_produto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        
                <label for="estoque">Estoque:</label>
                <input type="number" class="form-control" id="estoque" name="estoque" value="{{ old('estoque', $produto->estoque) }}" required>
                @error('estoque')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        
                <button type="submit" class="btn btn-outline-primary">Editar produto</button>
            </div>
        </form>
        

    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

