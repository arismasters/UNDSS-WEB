$(function(){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host;
        
    $("body").on('submit', '#formUser', function( event ) {
        event.preventDefault();
        $(this).submitForm("formUser", "user");
        return false;
    });

    $("body").on('submit', '#formUpdatePassword', function( event ) {
        event.preventDefault();
        $(this).submitForm("formUpdatePassword", "user");
        return false;
    });
});