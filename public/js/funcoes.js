function criarDoughnut(dados, idCanvas) {
    new Chart(document.getElementById(idCanvas).getContext("2d")).Doughnut(dados,{segmentShowStroke:false, animationSteps:55, animationEasing:"easeInQuart"});
}

function carregaCidade(uf) {
    $.ajax({
        type: "POST",
        url: "verificaCidade.php",
        data: {estado:uf},        
        success: function(data) {
            $('#cidades').html(data);
        }
    });
    
}

function mapaClickEstado(uf) {
    $('#estado').val(uf)
    carregaCidade(uf);
}


function criarMapa() {
    var width  = 500;
    var height = 500;
    
    var svg = d3.select('#mapaBrasil').append('svg').attr('width', width).attr('height', height);

    d3.json('js/brasil.min.json', function(json) {
        var center = d3.geo.centroid(json)
        var scale  = 650;
        var offset = [width/2, height/2.5];
        var projection = d3.geo.mercator().scale(scale).center(center).translate(offset);
        var path = d3.geo.path().projection(projection);

        svg.selectAll('path')
        .data(json.features)
        .enter()
        .append('path')
        .attr('d', path)
        .attr('uf', function(d) { return d.properties.UF; })
        .on('click', function(d) { mapaClickEstado(d.properties.UF) });
    });
}