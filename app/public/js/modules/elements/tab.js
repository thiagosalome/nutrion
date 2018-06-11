var app = app || {};

app.tab = (function(){
    var patientTab = jQuery(".js-patient-tab");
    var patientContent = jQuery(".js-patient-content");

    function execute(){
        patientTab.on("click", function(){
            patientTab.removeClass("active"); // Remove o active de todas as tabs
            jQuery(this).addClass("active"); // Adiciona o active na tab atual
            
            var tab = jQuery(this).data("tab"); //Seleciona o data-tab do item atual
            var content = jQuery(".js-patient-content[data-content='" + tab + "']"); //Seleciona o elemento com data-content referente

            patientContent.removeClass("active"); // Remove o active de todos os content
            content.addClass("active"); // Adiciona o active no content referent
            app.screen.verify(); //Verifica novamente a altura da dashboard

        });
    }

    return {
        execute : execute
    }
}());