/*var DashboardMenu = {
    'js_menu' : jQuery(".js-menu"),
    'js_item_menu' : jQuery(".js-item-menu"),
    'js_aside' : jQuery(".js-aside"),
    'js_nav_item' : jQuery(".js-nav-item"),
    
    "onClick" : function(){
        this.js_menu.on("click", function(){
            DashboardMenu.js_aside.toggleClass("active");
        });
    },

    "dropDown" : function(){
        this.js_nav_item.on("click", function(e){
            jQuery(this).closest(".nav-dropdown").toggleClass("active");
        });
    },
    
    "verifyItemActive" : function(){
        var url = window.location;
        var dataType;
        
        this.js_item_menu.each(function(){
            // this.getAttribute("data-type"));
            dataType = jQuery(this).data("type");

            if(url.href.indexOf(dataType) != -1){
                jQuery(this).addClass("active");
            } 
        });
    }
}*/

var DashboardWindow = {
    "verifyWindow" : function(){
        var mainDashboard = jQuery(".main-dashboard");
        if(mainDashboard.height() < window.innerHeight){
            mainDashboard.css("height", "100vh");
        }   
        else{
            mainDashboard.css("height", "auto");
        }
    }
}

var DashboardHeader = {
    //Attributes
    "js_header_perfil" : jQuery(".js-header-perfil"),
    "js_header_options" : jQuery(".js-header-options"),

    //Functions
    "toggleOptions" : function(){
        this.js_header_perfil.on("click", function(){
            DashboardHeader.js_header_options.fadeToggle(200);
        });
    }
}
/*
var DashboardForm = {
    //Attributes
    'js_message' : jQuery(".js-message"),
    'js_load' : jQuery(".js-load"),

    //Functions
    'onSubmit' : function(form, url){
        jQuery(document).on("submit", form, function(e){
            e.preventDefault();
            jQuery.ajax({
                url : url,
                data : jQuery(this).serialize(),
                type: "POST",
                beforeSend : function(){
                    DashboardForm.js_load.fadeIn('slow');
                },
                success : function(result){
                    DashboardForm.js_load.fadeOut('slow', function(){
                        if(result.indexOf("exception") != -1){
                            console.log(result);
                        }
                        else if(result == "success_delete"){
                            var home_uri = getHomeUri();
                            location = home_uri;
                        }
                        else if(result == "success_update"){
                            var home_uri = getHomeUri();
                            location = home_uri + "nutricionista/paciente/consultar";
                        }
                        else if(result == "success_create_patient" || result == "success_delete_patient"){
                            var home_uri = getHomeUri();
                            location = home_uri + "nutricionista/paciente/consultar";
                        }
                        else if(result == "success_update_patient"){
                            location.reload();
                        }
                        else{
                            DashboardForm.showMessage(result);
                        }
                    });
                }
            });
        });
    },
    'showMessage' : function(msg){
        this.js_message.text(msg).fadeIn(300, function(){
            setTimeout(function(){DashboardForm.js_message.fadeOut(300)}, 2000);
        });
    }
}*/

var DashboardTab = {
    "js_patient_tab" : jQuery(".js-patient-tab"),
    "js_patient_content" : jQuery(".js-patient-content"),

    "changeTab" : function(){
        this.js_patient_tab.on("click", function(){
            DashboardTab.js_patient_tab.removeClass("active"); // Remove o active de todas as tabs
            jQuery(this).addClass("active"); // Adiciona o active na tab atual
            
            var tab = jQuery(this).data("tab"); //Seleciona o data-tab do item atual
            var content = jQuery(".js-patient-content[data-content='" + tab + "']"); //Seleciona o elemento com data-content referente

            DashboardTab.js_patient_content.removeClass("active"); // Remove o active de todos os content
            content.addClass("active"); // Adiciona o active no content referent
            DashboardWindow.verifyWindow(); //Verifica novamente a altura da window

        });
    }
}