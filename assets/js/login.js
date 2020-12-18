$(function(){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host;
        
    $("body").on('submit', '#formLogin', function( event ) {
        event.preventDefault();
        $(this).submitForm("formLogin", "setting");
        return false;
    });
});