<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Meta_Indicador;

class MetaIndicadorController extends Controller
{
	function consultar(){
		$metaindicador = Meta_Indicador::all();
		return view ('metaIndicadorRetorna', ['metaindicador'=>$metaindicador]);
	}

	function cadastrar(Request $request){
		$metaindicador = new Meta_Indicador();
		$metaindicador -> ID_INDICADOR = $request -> input ('ID_INDICADOR');
		$metaindicador -> ID_GESTAO = $request -> input ('ID_GESTAO');
		$metaindicador -> VALOR_META = $request -> input ('VALOR_META');
		$metaindicador -> save();
		return redirect()-> action('MetaIndicadorController@consultar');
	}

	function atualizar(Request $request){
		$ID_META_INDICADOR = $request->input('ID_META_INDICADOR');
		$ID_INDICADOR = $request->input('ID_INDICADOR');
		$ID_GESTAO = $request->input('ID_GESTAO');
		$VALOR_META = $request->input('VALOR_META');

		Meta_Indicador::where('ID_META_INDICADOR', '=', $ID_META_INDICADOR) 
		->where ('ID_META_INDICADOR', $ID_META_INDICADOR)
		->update(['ID_INDICADOR' => $ID_INDICADOR, 'ID_GESTAO' => $ID_GESTAO, 'VALOR_META' => $VALOR_META]);

		return redirect()->action('MetaIndicadorController@consultar');
	}
}