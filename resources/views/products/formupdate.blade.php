@extends('layouts.app')
@section ('content')

<section class="container">
  <div class="row">
    <div class="">
      <h1>Atualização de Produto</h1>

    </div>

  </div>
  @if(isset($product))
  <form class="form-control" action="/produtos/atualizar" method="post" enctype="multipart/form-data">
        @csrf
      <input type="text" name="productID" value="{{ $result->id }}" hidden>
    <div class="form-group">
      <label for="productName">Nome do Produto</label>
      <input type="text" name="productName" id="productName" class="form-control" value="{{ $result->name }}">
    </div>
    <div class="form-group">
      <label for="productDescription">Descrição do Produto</label>
      <textarea name="productDescription" rows="3" cols="20" id="productDescription" class="form-control" placeholder="Descreva o produto" style="resize:none">
      {{ $result->description }} </textarea>
    </div>
    <div class="form-group">
      <label for="productQuantity">Quantidade em estoque</label>
      <input type="number" name="productQuantity" id="productQuantity" class="form-control" value="{{ $result->quantity }}">
    </div>
    <div class="form-group">
      <label for="productPrice">Preço</label>
      <input type="number" name="productPrice" id="productPrice" class="form-control" value="{{ $result->price }}">
    </div>
    <div class="form-group">
      <label for="productImg">Imagem</label>
      <input type="file" name="productImg" id="productImg" class="form-control" placeholder="">
    </div>
    <div class="form-group">
      <button type="submit" name="button" class="btn btn-primary">Atualizar</button>
    </div>
  </form>

  @elseif(isset($result))

  @if($result)
  <h1>Deu certo!</h1>
  @else
  <h1>Não foi possível cadastrar.</h1>
  @endif

  @else
  <h1>Produto não existe ou não foi encontrado.</h1>

  @endif

</section>
@endsection
