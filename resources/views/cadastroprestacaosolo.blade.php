<?php
   session_start();
?>

@extends ('navbar')

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Prestação Ação</title>
</head>

<body>        
    <section>
        <div class="cadastra-stepline">
            <div class="formatacao-telas-cadastro">
                <h1 class="titulo promeblue">Cadastro de Prestação Acão</h1>
                    <div class="container">
                        <div>
                            <form action = "cadastroprestacaosolo" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <div class="col-md-12 p-m-null">
                                <label class="promeblue subtitulo3">Ação:</label>
                                <select name="ID_ACAO" class="imputlist input">
                                @foreach ($acao as $auxacao)
                                    <option value="{{ $auxacao->ID_ACAO }}">{{ $auxacao->DESCRICAO }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">Data Referência:</label>
                                    <input type="date" name="DATA_REFERENCIA" class="smallinputlist input">
                            </div>
                            <div class="col-md-12 p-m-null">
                                <label class="promeblue subtitulo3">Percentual Ação:</label>
                                <input type="number" step="any" placeholder="%" name="PERCENTUAL_ACAO" class="smallinputlist input"></input>
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