@extends ('layouts.app')
@section ('content')

<section class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Produtos</h1>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Preço</th>
              <th scope="col">Imagem</th>
              <th scope="col">Criado em</th>
              <th scope="col">Atualizado em</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            @foreach($productsList as $product)
              <th scope="row">{{$product->id}}</th>
              <td> {{$product->name}} </td>
              <td> {{$product->description}}</td>
              <td> {{$product->quantity}} </td>
              <td> R${{$product->price}} </td>
              <td> null </td>
              <td>{{$product->created_at}}</td>
              <td>{{$product->updated_at}}</td>
              <td>
                <a href="/produtos/atualizar/{{$product->id}}" class="btn btn-primary">Atualizar</a>
                <a href="/produtos/deletar/{{$product->id}}" class="btn btn-danger">Deletar</a>
              </td>
            </tr>
              @endforeach
            </tbody>

        </table>
      </div>
    </div>
  </div>
</section>


@endsection
