<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PageIndicador;
use App\GestaoSolo;
use App\Tema;
use App\Meta;

class IndicadorSoloController extends Controller
{

	function consultar(){
		$gestao = GestaoSolo::all();
		$tema = Tema::all();
		
		return view('cadastroindicadorsolo', compact('gestao', 'tema'));
	}

	function cadastrar(Request $request){
		$indicador = new PageIndicador();
		$indicador -> ID_GESTAO = $request -> input ('ID_GESTAO');
		$indicador -> NOME = $request -> input ('NOME');
		$indicador -> DESCRICAO = $request -> input ('DESCRICAO');
		$indicador -> PROTOCOLO = $request -> input ('PROTOCOLO');
		$indicador -> FONTE = $request -> input ('FONTE');
		$indicador -> UND_MEDIDA = $request -> input ('UND_MEDIDA');
		$indicador -> ID_TEMA = $request -> input ('ID_TEMA');
		$indicador -> save();

		$meta = Meta::all();
		return view ('meusDadosNv2', ['meta'=>$meta]);
	}
}