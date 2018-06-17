// Definindo o objeto global da aplicação
var app = app || {};
app.imc = (function(){
    

    peso.onBlur = function(){
        var valAltura = altura.value;
        var valPeso = peso.value;
        var result = calculaIMC(valAltura, valPeso);
        imc.value = result; //falta verificar se vai aparecer
    }

    function calculaIMC(_altura, _peso){
        // ICM = peso/altura²
        return (_peso/(_altura*_altura));        
    }

    quadril.onBlur = function(){
        var valCintura = cintura.value;
        var valQuadril = quadril.value;
        var result = calculaICQ(valCintura, valQuadril);
        icq.value = result; //falta verificar se vai aparecer
    }

    function calculaICQ(_cintura, _quadril){
        //divide a cintura em cm pelo quadril em cm
        return (_cintura/_quadril);
    }
}());
    