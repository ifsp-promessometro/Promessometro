<?php
   session_start();
?>

@extends ('navbar')

<!DOCTYPE html>
<html>
<head>

  <title>Meta Page</title>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
        $( document ).ready(function() {
          $("#testcircle").circliful({
            animation: 1,
            animationStep: 3,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: 50,
          });
        });
      </script>
</head>
<body>
  <section>
    <div class="middlecenter-cadastra">
      <h1 class="titulo promeblue">TEMA | {{ $tema->NOME}}</h1>
      <div class="subtitulo2 promeblue-claro">Cidade atual: {{ $cidade->NOME}}
      </div>
      <div class="container">
        <div class="col-md-12">
          <div class="col-md-6 rightline">
            <div class="col-md-12 margin-tmi" style="height: 350px;">
              <div class="col-md-7">
                <div class="subtitulo promeblue-claro">Metas
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 p-fifty">
            <div class="col-md-12 margin-tmi" style="height: 350px;">
              <div class="col-md-7">
                <div class="subtitulo promeblue-claro">Indicadores
                </div>
                <div class="row">
                  <div class="p-m-null" id="myfirstchart" style="height: 250px; width: 300px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="gradient-line">
      <div class="container">
        <div class="col-md-12">
          <div class="col-md-6 rightline">
            <div class="accordions">
              <div class="accordion-item">
                <input type="checkbox" name="accordion" id="accordion-1" />
                <label for= "accordion-1"><font class="btn btn-primary btn-sm subtitulo3" style="color: white; display:block; clear: both">Ver Metas</font></label>
                <div class="accordion-content">
                  <div class="row col-md-6">
                  @foreach ($meta as $auxmeta)
                  <hr class="gradient-line">
                          {{--*/$percentual_meta_total = 0/*--}}
                          {{--*/ $total = 0/*--}}
                          {{--*/ $contaux=0/*--}}
                          @foreach ($acao as $auxacao)
                          @if ($auxacao->ID_META === $auxmeta->ID_META)
                                    {{--*/ $percentual = 0 /*--}}
                                    {{--*/ $percentual1_acao = 0 /*--}}
                                    {{--*/ $percentual2_acao = 0 /*--}}
                                    {{--*/ $contador = 0 /*--}}
                                    @foreach ($pca as $pcaaux0)
                                      @if ($pcaaux0->ID_ACAO == $auxacao->ID_ACAO)
                                      {{--*/ $percentual1_acao = $pcaaux0->PERCENTUAL_ACAO /*--}}
                                      {{--*/ $contador++ /*--}}
                                      {{--*/ $percentual2_acao = $percentual2_acao + $percentual1_acao /*--}}
                                      @endif
                                    @endforeach
                                    @if ($contador < 1)
                                    {{--*/ $contador = 1 /*--}}
                                    @endif
                                    {{--*/ $percentual = $percentual + ($percentual2_acao / $contador) /*--}}
                                    {{--*/$total = $total + $percentual/*--}}
                                    {{--*/$contaux++ /*--}}
                          @endif
                          @endforeach
                          @if ($contaux < 1)
                            {{--*/ $contaux = 1 /*--}}
                          @endif
                    {{--*/$percentual_meta_total = $total / $contaux/*--}}

                    <div class="col-md-2" >
                      @if($percentual_meta_total <1)
                        <img src="../img/vermelha.png">
                      @elseif($percentual_meta_total >= 1 && $percentual_meta_total < 100)
                        <img src="../img/amarela.png">
                      @else
                        <img src="../img/verde.png">
                      @endif 
                    </div>
                    <div class="col-md-3" >
                      <P class="subtitulo3 promeblue-claro">{{ number_format(($percentual_meta_total), 0) }} %</P>
                    </div>
                    <div class="col-md-7" >
                      <a onclick="javascript:location.href='/Promessometro/public/detalhemeta/{{$auxmeta->ID_META}}'">
                      <P class="subtitulo3 promeblue-claro">{{ $auxmeta->DESCRICAO }}</P>
                      </a>
                    </div>
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="accordions">
              <div class="accordion-item">
                <input type="checkbox" name="accordion" id="accordion-2" />
                <label for= "accordion-2"><font class="btn btn-primary btn-sm subtitulo3" style="color: white; display:block; clear: both">Ver Indicadores</font></label>
                <div class="accordion-content">
                  <div class="col-md-6" >
                  @foreach ($indicador as $auxindicador)
                    <hr class="gradient-line">
                    <div class="col-md-2" >
                      @if($percentual_meta_total <1)
                        <img src="../img/vermelha.png">
                      @elseif($percentual_meta_total >= 1 && $percentual_meta_total < 100)
                        <img src="../img/amarela.png">
                      @else
                        <img src="../img/verde.png">
                      @endif 
                    </div>
                    <div class="col-md-3" >
                      <P class="subtitulo3 promeblue-claro">{{ number_format(($percentual_meta_total), 0) }} %</P>
                    </div>
                    <div class="col-md-7" >
                      <a onclick="javascript:location.href='/Promessometro/public/detalheindicador/{{$auxindicador->ID_INDICADOR}}'">
                      <P class="subtitulo3 promeblue-claro">{{ $auxindicador->DESCRICAO }}</P>
                      </a>
                    </div>
                    @endforeach
                    <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
  </section>

  <script type="text/javascript">
    new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  { year: '2008', value: 20 },
  { year: '2009', value: 10 },
  { year: '2010', value: 5 },
  { year: '2011', value: 5 },
  { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>
</body>
</html>