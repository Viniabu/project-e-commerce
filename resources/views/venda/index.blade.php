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

    <div class="container table-container">
        <h1 class="text-center">Lista de Produtos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Descrição do Produto</th>
                    <th>Preço do Produto</th>
                    <th>Estoque</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome_produto }}</td>
                        <td>{{ $produto->descricao_produto }}</td>
                        <td>{{ $produto->preco_produto }}</td>
                        <td>{{ $produto->estoque }}</td>
                        <td> <a class="btn btn-outline-primary" href="{{ route('produto.edit',$produto->id_tbl_produto) }}" id_tbl_produto="{{$produto->id_tbl_produto}}"> <i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('produto.destroy', $produto->id_tbl_produto) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                         </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        <a href="{{ route('produto.create') }}" class="btn btn-primary">Adicionar Produto</a>

    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection