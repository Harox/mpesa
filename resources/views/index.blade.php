@extends('layouts.app')

@section('content')
<div class="container">
    
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">0.00 MZN</li>
  </ol>
</nav>

<form>
  <div class="form-group">
      <h1 class="display-4">Deposito</h1>

    <label for="exampleInputEmail1">Telefone</label>
    <input type="number" class="form-control" id="idnumerodep" aria-describedby="emailHelp" placeholder="84xxxxxxx">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Valor</label>
    <input type="number" class="form-control" id="idvalordep" placeholder="0">
  </div>
  <button type="submit" class="btn btn-primary">Depositar</button>
</form>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Levantamento</h1>

    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Telefone</label>
    <input type="number" class="form-control" id="idnumero" aria-describedby="emailHelp" placeholder="84xxxxxxx">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Valor</label>
    <input type="number" class="form-control" id="idvalor" placeholder="0">
  </div>
  <button type="submit" class="btn btn-primary">Levantar</button>
</form>
  </div>
</div>

</div>
@endsection
