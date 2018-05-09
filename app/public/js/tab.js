var app = app || {};

app.tab = (function(){
    var js_patient_tab = jQuery(".js-patient-tab");
    var js_patient_content = jQuery(".js-patient-content");

    function exetute(){
        js_patient_tab.on("click", function(){
            js_patient_tab.removeClass("active"); // Remove o active de todas as tabs
            jQuery(this).addClass("active"); // Adiciona o active na tab atual
            
            var tab = jQuery(this).data("tab"); //Seleciona o data-tab do item atual
            var content = jQuery(".js-patient-content[data-content='" + tab + "']"); //Seleciona o elemento com data-content referente

            js_patient_content.removeClass("active"); // Remove o active de todos os content
            content.addClass("active"); // Adiciona o active no content referent
            app.dashboard.verify(); //Verifica novamente a altura da dashboard

        });
    }
}());