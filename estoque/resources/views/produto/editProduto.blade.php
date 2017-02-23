@extends('layout.principal')
@section('conteudo')

    <form action="/produtos/alterar/{{$p->id}}"  method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

            <div class="form-group">
              <label>Nome</label>
              <input name="nome" class="form-control" value="{{$p->nome}}" />
            </div>
            <div class="form-group">
              <label>Descricao</label>
              <input name="descricao" class="form-control" value="{{$p->descricao}}"/>
            </div>
            <div class="form-group">
              <label>Valor</label>
              <input name="valor" class="form-control" value="{{$p->valor}}"/>
            </div>
            <div class="form-group">
              <label>Dimensão</label>
              <input name="tamanho" class="form-control" value="{{$p->tamanho}}"/>
            </div>
            <div class="form-group">
              <label>Categoria</label>
              <select name="categoria_id" class="form-control">
                @foreach($categorias as $c)
                <option {{ $p->categoria_id == $c->id ? 'selected' : '' }} 
                    value="{{$c->id}}">{{$c->nome}}</option>
                @endforeach  
              </select> 
            </div>
            <div class="form-group">
              <label>Quantidade</label>
              <input type="number" name="quantidade" 
                  class="form-control" value="{{$p->quantidade}}"/>
            </div>
            <button type="submit" class="btn btn-primary ">Atualizar</button>
            <a href="/" class="btn btn-danger">Voltar</a>

            
    </form>

@stop