<?php
   session_start();
?>

@extends ('navbar')

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Indicador</title>
</head>

<body>        
    <section>
        <div class="cadastra-stepline">
            <div class="formatacao-telas-cadastro">
                <h1 class="titulo promeblue">Cadastro de Indicador</h1>
                    <div class="container">
                        <form action = "cadastroindicadorsolo" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="col-md-12"> 
                            <label class="promeblue subtitulo3">Gestão:</label>
                            <select name="ID_GESTAO" class="inputlist input">
                                @foreach ($gestao as $auxgestao)
                                    <option value="{{ $auxgestao->ID_GESTAO }}">{{ $auxgestao->PROMESSA_CAMPANHA }}</option>
                                @endforeach
                            </select>
                            <label class="promeblue subtitulo3">Nome:</label>
                            <input type="text" name="NOME" class="imputnormal input"></input>
                            <label class="promeblue subtitulo3">Descricao:</label>
                            <input type="text" name="DESCRICAO" class="inputtext input"></input>
                            <label class="promeblue subtitulo3">Protocolo:</label>
                            <input type="number" name="PROTOCOLO" class="imputnormal input"></input>
                            <br>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">UND.Medida</label>
                                <select name="UND_MEDIDA">
                                            <option>R$</option>
                                            <option>%</option>
                                            <option>QTD</option>
                                            <option>M</option>
                                            <option>M²</option>
                                            <option>M³</option>
                                            <option>KM</option>
                                            <option>KM²</option>
                                            <option>Pessoas</option>
                                            <option>kWh</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-m-null">
                                <label class="promeblue subtitulo3">Valor Meta:</label>
                                <input type="number" step="any" name="VALOR_META" class="imputnormal input"></input>
                            </div>
                            <div class="col-md-12 p-m-null">
                                <label class="promeblue subtitulo3">Fonte:</label>
                                <input type="text" name="FONTE" class="imputnormal input"></input>
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
                            <hr>
                            <div class="col-md-12 p-m-null">
                                <input type="submit" value="Cadastrar" class="btn-primary btn-pad"></input>
                             </div>
                             </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>