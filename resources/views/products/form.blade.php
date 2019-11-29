<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @
  </body>
</html> -->
@extends('layouts.app')

@section('content')
  <section class="container">
    <div class="col-md-12">
      <h1>Cadastro de Produto</h1>
    </div>
    @csrf
    <form class="form-control" action="/produtos/cadastrar" method="post" enctype="multipart/form-data">
          @csrf
      <div class="form-group">
        <label for="productName">Nome do Produto</label>
        <input type="text" name="productName" id="productName" class="form-control" placeholder="Insira o nome do produto">
      </div>
      <div class="form-group">
        <label for="productDescription">Descrição do Produto</label>
        <textarea name="productDescription" rows="3" cols="20" id="productDescription" class="form-control" placeholder="Descreva o produto" style="resize:none">
        </textarea>
      </div>
      <div class="form-group">
        <label for="productQuantity">Quantidade em estoque</label>
        <input type="number" name="productQuantity" id="productQuantity" class="form-control" placeholder="Quantos você tem?">
      </div>
      <div class="form-group">
        <label for="productPrice">Preço</label>
        <input type="number" name="productPrice" id="productPrice" class="form-control" placeholder="Qual é o valor?">
      </div>
      <div class="form-group">
        <label for="productImg">Imagem</label>
        <input type="file" name="productImg" id="productImg" class="form-control" placeholder="Qual é o valor?">
      </div>
      <div class="form-group">
        <button type="submit" name="button" class="btn btn-primary">Enviar</button>
      </div>
    </form>
    <div class="row">
      <div class="col-md-12">
        @if(isset($result))
            @if($result)
          <h1>Deu certo!</h1>
            @else
          <h1>Deu ruim!</h1>
            @endif
          @endif

      </div>

    </div>
  </section>
@endsection
