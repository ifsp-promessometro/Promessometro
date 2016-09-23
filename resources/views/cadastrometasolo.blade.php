<?php
   session_start();
?>

@extends ('navbar')

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Metas</title>
</head>

<body>        
    <section>
        <div class="cadastra-stepline">
            <div class="formatacao-telas-cadastro">
                <h1 class="titulo promeblue">Cadastro de Metas</h1>
                    <div class="container">
                        <form action = "cadastrometasolo" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="col-md-12"> 
                            <label class="promeblue subtitulo3">Descrição:</label>
                            <input type="text" name="DESCRICAO" class="inputtext input"></input>
                            <label class="promeblue subtitulo3">População Beneficiada:</label>
                            <select name="ID_POP_BENEFICIADA" class="inputlist input">
                                @foreach ($pop_beneficiada as $auxpop)
                                    <option value="{{ $auxpop->ID_POP_BENEFICIADA }}">{{ $auxpop->DESCRICAO }}</option>
                                @endforeach
                            </select>
                            <div>
                                <div class="col-md-3 p-m-null">
                                <label class="promeblue subtitulo3">Data Início:</label>
                                    <input type="date" name="DATA_INICIO" class="dateinputlist input">
                            </div>
                            <div class="col-md-3">
                                <label class="promeblue subtitulo3">Data Final:</label>
                                    <input type="date" name="DATA_FIM" class="dateinputlist input">
                            </div>
                            <div class="col-md-12 p-m-null">
                                <label class="promeblue subtitulo3">Gestão:</label>
                                <select name="ID_GESTAO" class="inputlist input">
                                    @foreach ($gestao as $auxgestao)
                                        <option value="{{ $auxgestao->ID_GESTAO }}">{{ $auxgestao->PROMESSA_CAMPANHA }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">Tema:</label>
                                <select name="ID_TEMA" class="inputlist input">
                                    @foreach ($tema as $auxtema)
                                        <option value="{{ $auxtema->ID_TEMA }}">{{ $auxtema->NOME }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">Cidade:</label>
                                <select name="ID_CIDADE" class="inputlist input">
                                @foreach ($cidade as $auxcidade)
                                    <option value="{{ $auxcidade->ID_CIDADE }}">{{ $auxcidade->NOME }}</option>
                                @endforeach
                                </select>
                            </div>
                                <div class="col-md-12 p-m-null">
                                    <input type="submit" value="Cadastrar" class="btn-primary btn-pad"></input>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>