@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 10px">

                    <h1>Resultados</h1>
                    @if(count($domainCounts) > 0)
                        <table class="table table-bordered" id="tabla_resultados">
                            <thead>
                            <tr >
                                <th scope="col">Enlace</th>
                                <th scope="col">cantidad</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($domainCounts as $domain => $count)
                                <tr>
                                    <td>{{$domain}}</td>
                                    <td>{{$count}}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3>No hay resultados para mostrar</h3>
                    @endif

        </div>
    </div>
@endsection
