@extends('plantillas.base')
@section('titulo', 'Laboratorio 2')
@section('contenido')

<div class="col-5 p-5 text-center">

    <div class="card">
        <div class="card-header">
            <h2>Login</h2>
        </div>
        <div class="card-body">
        <img src="img/key.svg" class="w-50 h-50">
            <form method="post" id="frm_inicio" name="frm_inicio" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Usuario:</label>
                    <input type="text" class="form-control" maxlength="8" value="" tabindex="1" id="txt_user" name="txt_user">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contrase&ntilde;a:</label>
                    <input type="password" class="form-control" maxlength="8" value="" tabindex="2" id="txt_pass" name="txt_pass">
                </div>
                
                @isset($mensaje)
                <div class="alert alert-danger" role="alert">
                {{$mensaje}}
                </div>
               
                @endisset
                <input type="submit" class="btn btn-primary" value="Entrar" name="btn_entrar" tabindex="3">
            </form>

         

        </div>
    </div>

</div>

@endsection
