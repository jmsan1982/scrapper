@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 10px">
            <div class="ml-4">
                <h1>Introduzca el texto a buscar</h1>
                <form method="POST" action="{{route('busqueda')}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="buscar" type="text"
                                   class="form-control"
                                   name="buscar" required autocomplete="buscar"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 mt-2">
                            <button type="submit" class="btn btn-success">
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
