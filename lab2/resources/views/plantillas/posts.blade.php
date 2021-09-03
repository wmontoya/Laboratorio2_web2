<!DOCTYPE html>
<html>
<head>
<title>@yield('titulo')</title>
<meta charset="utf-8">
<meta name="description" content="Uso de Laravel">

<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body class="m-0 vh-100 row justify-content-center align-items-center fondoGradiant">

<div class="col-8 p-5 ">

    <div class="card">
        <div class="card-header">
        @isset($usuario)
            <div class ="row">
                <div class="col-9">
                <h3>Usuario conectado:<br> {{ $usuario }}</h3>
                </div>
                <div class="col-3 text-end m-auto">
                <button type="button" class="btn btn-danger" onclick="window.location='{{ url("cerrar_session") }}'">Cerrar Sesición</button>
                
                </div>
            </div>
            @endisset
            
        </div>
        <div class="card-body">
        <div class="card">
            <div class="card-body">
                <form method="post" id="frm_post" name="frm_post" action="{{ route('crear_nuevo_mensaje') }}">
                    @csrf
                    <div class="row">
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="txt_post" class="form-label">Comentario:</label>
                                <textarea class="form-control" maxlength="255" value="" tabindex="1" id="txt_post" name="txt_post" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-2 m-auto">
                            <button type="submit" class="btn btn-primary " value="Postear" name="btn_postear" tabindex="2">Postear</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
           
        <div class="card mt-3">
            <div class="card-body">
            @isset($posts)
            @foreach ($posts as $post)
            <div class="card mb-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9 m-auto">
                            <p class="m-auto"><strong>Usuario: {{ $post->nombre }}</strong></p>
                        </div>
                        <div class="col-3 text-end m-auto">
                            <span class="badge bg-success rounded-pill m-auto">{{ $post->fecha }}</span>
                        </div>
                    </div>
                 
                    
                </div>
                <div class="card-body">
                <p>{{ $post->mensaje }}</p>
                </div>
            </div>
            @endforeach
            @endisset
            </div>
        </div>


 

        </div>
    </div>
</div>

  

</body>
</html>
