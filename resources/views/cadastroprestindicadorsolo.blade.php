<?php
   session_start();
?>

@extends ('navbar')

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Prestação Indicador</title>
</head>

<body>        
    <section>
        <div class="cadastra-stepline">
            <div class="formatacao-telas-cadastro">
                <h1 class="titulo promeblue">Cadastro de Prestação Indicador</h1>
                    <div class="container">
                        <div>
                            <form action = "cadastroprestindicadorsolo" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <div class="col-md-12 p-m-null">
                                <label class="promeblue subtitulo3">Indicador:</label>
                                <select name="ID_INDICADOR" class="imputlist input">
                                @foreach ($indicador as $auxindicador)
                                    <option value="{{ $auxindicador->ID_INDICADOR }}">{{ $auxindicador->NOME }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">Data Referência:</label>
                                    <input type="date" name="DATA_REFERENCIA" class="smallinputlist input">
                            </div>
                            <div class="col-md-12 p-m-null">
                                <label class="promeblue subtitulo3">Valor:</label>
                                <input type="number" step="any" placeholder="R$ 0,00" name="VALOR" class="smallinputlist input"></input>
                            </div>
                            <div class="col-md-12 p-m-null">
                                <label class="promeblue subtitulo3">Percentual Indicador:</label>
                                <input type="number" step="any" placeholder="%" name="PERCENTUAL_INDICADOR" class="smallinputlist input"></input>
                            </div>
                            <div class="col-md-12 p-m-null"> 
                                <label class="promeblue subtitulo3">Consideração:</label>
                                <input type="text" name="CONSIDERACAO" class="smallinputlist input"></input>
                            </div>
                            <div class="col-md-12 p-m-null">
                                <input type="submit" value="Cadastrar" class="btn-primary btn-pad"></input>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>