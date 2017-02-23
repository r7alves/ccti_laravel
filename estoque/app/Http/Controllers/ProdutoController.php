<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;
use estoque\Categoria;
use Validator;
use estoque\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
	public function __construct()
    {
        $this->middleware('autorizar');
    }	
	public function lista(){
        $produtos = Produto::all();
        return view('produto.listagemProduto')->with('produtos',$produtos);
	}

	public function mostra($id){
	    $resposta = Produto::find($id);
	    if(empty($resposta)) {
	        return "Esse produto não existe";
	    }
	    return view('produto.detalheProduto')->with('p', $resposta);
	}

	public function remove($id){
		$produto = Produto::find($id);
		$produto->delete();
		return redirect('/produtos');
	}

	public function novo(){
		return view('produto.newProduto')->with('categorias',Categoria::all());
	}

	public function adiciona(ProdutoRequest $request){
	    Produto::create($request->all());
	    
	    return redirect()
	        ->action('ProdutoController@lista')
	        ->withInput(Request::only('nome'));
	}
	public function listaJson(){
  		$produtos = DB::select('select * from produtos');
 	 	return response()->json($produtos);
	}

	public function edit($id){
		$produto = Produto::find($id);
		return view('produto.editProduto')->with('p', $produto)->with('categorias',Categoria::all());;
	}

	public function alterar(ProdutoRequest $request, $id){
		Produto::find($id)->update($request->all());
		return redirect('/produtos');
	}
}