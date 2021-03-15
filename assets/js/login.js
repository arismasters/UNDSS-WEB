// Login Js
// Variable
var apps_name = '';
var username  = '';
var password  = '';
var _name     = '';

// Document Ready
$(function(){
    // login event
    $('body').on('submit', '.login-submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var direct = $(this).attr('direct');

        $.ajax({
            url: url,
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            dataType: 'json',          // Response data type
            beforeSend: function () { // A function to be called before start
                show_loginloader();
                $(".login-submit").attr('hidden', 'true');
            },
            success: function (responses) {  // A function to be called if request succeeds
                if (responses.status_code != '200') {
                    if (responses.message != ''){
                        UIkit.notification(responses.message, { pos: 'top-right' });
                    } else {
                        if (responses.message.username){
                            UIkit.notification(responses.message.username, { pos: 'top-right' });
                        }
                        if (responses.message.password){
                            UIkit.notification(responses.message.password, { pos: 'top-right' });
                        }
                    }
                } else {
                    location.href = direct;
                }
            },
            complete: function (xhr, status) {
                setTimeout(function () {
                    hide_loginloader();
                    $(".login-submit").removeAttr('hidden');
                }, 1500);
            },
            error: function (xhr, status, error) { console.log(xhr); UIkit.notification(error, { pos: 'top-right' }) }
        });
    });

    $("body").on("click", "[login-action]", function () {
        
        if ($('#username').val() != '' && $('#password').val() != ''){
            show_loginloader();
            $("#login-action").attr('hidden', 'true');

            setTimeout(function () {
                hide_loginloader();
                $("#login-action").removeAttr('hidden');
                // // get data from database
                // var result = useraccess_check(url, username);
                // if (result.status == 'success') {
                //     _name = result.data.name;
                //     password_reset();
                // } else
                //     username_denine();
            }, 1500);
        }
    });

    $('body').one('submit', '.form-forgot-password', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var form_method = $(this).attr('method');
        var form_data = new FormData(this);

        $.ajax({
            url: url,
            type: form_method, 
            data: form_data, 
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (responses) {
                console.log(responses);
                if(responses.status_code != '200'){
                    UIkit.notification(responses.message, { pos: 'top-right' })
                }else {
                    setTimeout(() => { location.reload(); }, 800); 
                }
            },
            error: function (xhr, status, error) { console.log(xhr); UIkit.notification(error, { pos: 'top-right' }) }
        });
        $(".uk-modal-close-outside").trigger('click');
        return false;
    });
});

function login_request(){
    
}


function username_check(url){
    show_loginloader();
    $("#username-frame, #login-head").attr('hidden', 'true');
    apps_name = $("#login-title").html();
    
    setTimeout(function () { 
        hide_loginloader();
        // get data from database
        var result = useraccess_check(url, username);
        if (result.status == 'success'){
            _name = result.data.name;
            password_reset();
        }else
            username_denine();
    }, 1500);
}

function username_reset(){
    $("#password-frame, #login-head").attr('hidden', 'true');
    $("#username-frame, #login-head").removeAttr('hidden');
    $("#login-title").html(apps_name);
    $("#login-icon").html('security').unbind().css('cursor', 'text');
    $("#username").focus();
    $("#password").val('');
}

function username_denine(){
    $("#login-failed").removeAttr('hidden');
    setTimeout(function () {
        $("#login-failed").attr('hidden', 'true');
        username_reset();
        $("#username").focus();
    }, 1500);
}

function password_check(url){
    show_loginloader();
    $("#password-frame, #login-head").attr('hidden', 'true');
    
    setTimeout(function () { 
        hide_loginloader();
        
        var result = useraccess_check(url, username, password);
        if (result.status == 'success')
            window.location.href = $('#login-action').attr('action');
        else
            password_denine();
    }, 1500);
}

function password_reset(){
    $("#password-frame, #login-head").removeAttr('hidden');
    $("#login-title").html(_name);
    $("#login-icon").html('close').on('click', function () { username_reset(); }).css('cursor', 'pointer');
    $("#password").focus();
    $("#username").val('');
}

function password_denine() {
    $("#login-failed").removeAttr('hidden');
    setTimeout(function () {
        $("#login-failed").attr('hidden', 'true');
        password_reset();
        $("#password").val('').focus();
    }, 1500);
}

// Ajax request
function login_requestss(url){
    var result = false;

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        async: false,
        data: { username: username, password: password },
        success: function (response) {
            result = response;
            console.log(response);
        },
        complete: function (xhr, status) { },
        error: function (xhr, status, error) { console.log(xhr);}
    });

    return result;
}

// loader
function show_loginloader(element = '#loader') {
    $(element).removeAttr('hidden');
}

function hide_loginloader(element = '#loader') {
    $(element).attr('hidden', 'true');
}
