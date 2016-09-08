<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Meta;
use App\PageIndicador;
use App\Tema;
use APP\Meta_Indicador;
use App\Acao;
use App\Prestacao_Acao;
use DB;

class PageTemaMetaIndicadorController extends Controller
{

    public function retorna_detalhada($tema = 'ID_TEMA')
    {
        $tema = tema::where('ID_TEMA', $tema)->first();
        $meta = meta::all();
        $acao = Acao::all();
        $pca = DB::table('prestacao_acao')->join('acao', 'acao.ID_ACAO', '=', 'prestacao_acao.ID_ACAO')->get();
        return view('temaMetaIndicador', compact('tema', 'meta', 'acao', 'pca'));
    }

}