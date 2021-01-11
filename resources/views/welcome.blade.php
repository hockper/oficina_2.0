<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css\style.css') }}">

</head>
<body>
  <header class="fixed_top">
    <div id="header_btns">
      <a href="/" class="btn btn-info">Home</a>
      <a href="{{route('pesquisar')}}" class="btn btn-info">Pesquisar</a>
      <a href="{{route('adicionar')}}" class="btn btn-info">Adicionar</a>
    </div>
  </header>
  @if (Session::has('flash_message'))
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div aling="center" class="alert {{Session::get('flash_message')['class']}}">
            {{Session::get('flash_message')['msg']}}
          </div>

        </div>
      </div>
    </div>
      
  @endif
  <main>
    @section('main')
    <h1>
      Oficina 2.0
    </h1>
    @show
  </main>
  
</body>
</html>
