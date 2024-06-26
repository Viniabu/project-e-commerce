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
                    <th>Numero da venda</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $venda)
                    <tr>
                        <td><a class="" href="{{route('venda.show', $venda->id_tbl_venda)}}">#{{ $venda->id_tbl_venda }}</a></td>         
                        <td>R$: {{ $venda->valor_total }}</td>                                       
                    </tr>        
                @endforeach      
            </tbody>
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