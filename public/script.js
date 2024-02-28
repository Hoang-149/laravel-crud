jQuery(document).ready(function($){

    $(".btn-add").on("click", function(e){
        e.preventDefault();
        $(".action").css("display","none");
        $(".action-confirm").css("display","flex");
        $(".field-team").css("pointer-events","auto");
    });

    $(".btn-cancel").on("click", function(e){
        e.preventDefault();
        $(".action").css("display","flex");
        $(".action-confirm").css("display","none");
        $(".field-team").css("pointer-events","none");
    });

});