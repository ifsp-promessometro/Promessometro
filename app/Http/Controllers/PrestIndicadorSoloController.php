<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Prestacao_Indicador;
use App\Indicador;
use App\Meta;

class PrestIndicadorSoloController extends Controller
{

	function consultar(){
		$indicador = Indicador::all();
		return view('cadastroprestindicadorsolo', compact('indicador'));
	}

	function cadastrar(Request $request){
		session_start();

		$prestindicador = new Prestacao_Indicador();
		$prestindicador -> ID_USUARIO = $_SESSION['ID_USUARIO'];
		$prestindicador -> ID_INDICADOR = $request -> input ('ID_INDICADOR');
		$prestindicador -> DATA_REFERENCIA = $request -> input ('DATA_REFERENCIA');
		$prestindicador -> VALOR = $request -> input ('VALOR');
		$prestindicador -> CONSIDERACAO = $request -> input ('CONSIDERACAO');
		$prestindicador -> PERCENTUAL_INDICADOR = $request -> input ('PERCENTUAL_INDICADOR');
		$prestindicador -> save();

		$meta = Meta::all();
		return view('meusDadosNv2', compact('meta'));
	}
}