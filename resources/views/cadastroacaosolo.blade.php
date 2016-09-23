<?php
   session_start();
?>

@extends ('navbar')

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Acão</title>
</head>

<body>        
    <section>
        <div class="cadastra-stepline">
            <div class="formatacao-telas-cadastro">
                <h1 class="titulo promeblue">Cadastro de Acão</h1>
                    <div class="container">
                        <div>
                            <form action = "cadastroacaosolo" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <div class="col-md-12 p-m-null"> 
                                <label class="promeblue subtitulo3">Descrição:</label>
                                <input type="text" name="DESCRICAO" class="smallinputlist input"></input>
                            </div>
                            <div class="col-md-12 p-m-null">
                                <label class="promeblue subtitulo3">Meta:</label>
                                <select name="ID_META" class="imputlist input">
                                @foreach ($meta as $auxmeta)
                                    <option value="{{ $auxmeta->ID_META }}">{{ $auxmeta->DESCRICAO }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">Data Início:</label>
                                    <input type="date" name="DATA_INICIO" class="smallinputlist input">
                            </div>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">Data Final:</label>
                                    <input type="date" name="DATA_FIM" class="smallinputlist input">
                            </div>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">Investimento Previsto:</label>
                                <input type="text" placeholder="R$ 0,00" name="INVESTIMENTO_PREVISTO" class="smallinputlist input"></input>
                                <label class="promeblue subtitulo3">Investimento Efetuado:</label>
                                <input type="text" placeholder="R$ 0,00" name="INVESTIMENTO_EXECUTADO" class="smallinputlist input"></input>
                                <div>
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