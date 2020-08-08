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
    <label for="exampleInputEmail1">Telefone</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="84xxxxxxx">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Valor</label>
    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="0">
  </div>
  <button type="submit" class="btn btn-primary">Depositar</button>
</form>



</div>
@endsection