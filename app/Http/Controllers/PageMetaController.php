<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Meta;
use App\Pop_Beneficiada;
use App\Tema;
use App\PageMeta;
use App\Acao;
use App\Usuario;
use App\Responsavel_Acao;
use App\Prestacao_Acao;
use DB;
use App\Http\Controllers\Auth;



class PageMetaController extends Controller
{
	public function create()
    {
        $inputs = Input::all();
        $page = Page::create();
    }

    public function retorna_detalhada($meta = 'ID_META')
    {
        $page = PageMeta::where('ID_META', $meta)->first();
        $acao = Acao::where('ID_META', $meta)->get();
        $tema = Tema::where('ID_TEMA', $page->ID_TEMA)->first();
        $procuratema = Tema::all();
        $contadoracoes = DB::table('acao')->groupBy('ID_META')->count();
        $usuario = Usuario::all();
        $pca = DB::table('prestacao_acao')->join('acao', 'acao.ID_ACAO', '=', 'prestacao_acao.ID_ACAO')->get(); 

        return view('metaDetalhada', compact('page', 'acao', 'tema', 'contador', 'procuratema', 'contadoracoes', 'pca'));
        // , 'usuario', 'responsavel', 'pca'
    }

    public function SeguirMeta($meta = 'ID_META'){

        session_start();

         $conn = mysqli_connect ("localhost", "root" , "" ) or die (mysql_error());
        mysqli_select_db($conn, "promessometro") or die (mysql_error());

        $id_usuario = $_SESSION['ID_USUARIO'];
        //$id_meta = ;

        $sql = 'INSERT INTO usuario_segue_meta (`ID_USUARIO`, `ID_META`, `STATUS_USUARIO_SEGUE_META`) VALUES ('.$id_usuario.' , '.$meta.' , 1)';

        //$stmt = mysqli_prepare ($conn,$sql);
        if ($stmt = mysqli_prepare ($conn,$sql)) {

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


        header("Location: detalhemeta/{ID_META}");
    }






 

  
}