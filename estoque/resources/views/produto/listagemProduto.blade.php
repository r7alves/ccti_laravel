@extends('layout.principal')
@section('conteudo')
@if(empty($produtos))
  <div class="alert alert-danger"">Você não tem nenhum produto cadastrado.</div>
@else
  <div class="container"> 
    <h1>Listagem de produtos</h1>
    <table class="table table-striped table-bordered table-hover">
      @foreach ($produtos as $p)
      <tr class="{{$p->quantidade <=1 ? 'danger' : ''}}">
        <td> {{$p->nome}} </td>
        <td> {{$p->valor}} </td>
        <td> {{$p->descricao or 'nenhuma descrição informada'}} </td>
        <td> {{$p->quantidade}} </td>
        <td> {{$p->categoria->nome}} </td>
        <td> {{$p->tamanho or 'nenhum tamanho informado'}} </td>
        <td>
        	<a href="/produtos/mostra/{{$p->id}}">
        		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        	</a>
        </td>
        <td> 
          <a href="{{action('ProdutoController@remove', $p->id)}}"> 
            <span class="glyphicon glyphicon-trash"></span>
          </a>
        </td>
        <td> 
          <a href="{{action('ProdutoController@edit', $p->id)}}"> 
            <span class="glyphicon glyphicon-edit"></span>
          </a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
@endif
	<!-- <h4>
	  <span class="label label-danger pull-right">
	    Um ou menos itens no estoque
	  </span>
 	</h4> -->

  @if(old('nome'))
    <div class="alert alert-success">
      <strong>Sucesso!</strong> 
          O produto {{ old('nome') }} foi adicionado.
    </div>
  @endif
@stop