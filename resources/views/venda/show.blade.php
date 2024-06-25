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
        <h1 class="text-center">Relatorio de vendas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produtos</th>
                    <th>Valor do produto</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venda as $v)
                    <tr>
                        <td>{{$v->nome_produto}}</td>         
                        <td>R$: {{ $v->preco_produto }}</td>   
                        <td>{{$v->quantidade}} </td>                                   
                    </tr>        
                @endforeach      
            </tbody>
            <td>Valor total: {{$venda[0]->valor_total}}</td>
        </table>                       
                               
            </tbody>
        </table>

    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection