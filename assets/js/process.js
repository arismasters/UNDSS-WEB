// Process Js
$(function () {
    // form handler
    p_form();
});

// Ajax getdata
function p_getdata(url, loader = true, async = false){ 
    var result;
    $.ajax({
        url: url,
        type: "POST",             // Type of request to be send, called as method
        data: {}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        dataType: 'json',          // Response data type
        async: async,
        beforeSend: function () { // A function to be called before start
            if (loader == true) UIkit.modal('#modal-loader').show();
        },
        success: function (responses) {  // A function to be called if request succeeds
            result = responses;
        },
        complete: function (xhr, status) {
            if (loader == true) setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500);
        },
        error: function (xhr, status, error) { console.log(xhr.responseText); }
    });
    
    return result;
}

function p_action(url, data = null) {
    $.ajax({
        url: url,
        type: "POST",             // Type of request to be send, called as method
        data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        dataType: 'json',          // Response data type
        async: false,
        beforeSend: function () { // A function to be called before start
            UIkit.modal('#modal-loader').show();
        },
        success: function (responses) {  // A function to be called if request succeeds
            console.log(responses);
            if (responses.status_code != '200') {
                UIkit.notification(responses.message, { pos: 'top-right' });
                UIkit.modal('#modal-loader').hide();
            } else {
                setTimeout(() => { 
                    location.reload();
                }, 500);
            }
        },
        complete: function (xhr, status) {
            setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500);
        },
        error: function (xhr, status, error) { UIkit.notification(error, { pos: 'top-right' }); }
    });
}

function p_getview(url, sync = false, loader = true){
    var result;

    $.ajax({
        url: url,
        type: "POST",             // Type of request to be send, called as method
        data: {}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        dataType: 'html',          // Response data type
        async: sync,
        beforeSend: function () { // A function to be called before start
            if(loader == true) UIkit.modal('#modal-loader').show();
        },
        success: function (responses) {  // A function to be called if request succeeds
            result = responses;
        },
        complete: function (xhr, status) {
            if (loader == true) setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500);
        },
        error: function (xhr, status, error) { UIkit.notification(error, { pos: 'top-right' }) }
    });

    return result;
}

function p_getlist(url, group = 'parent', sync = false, loader = true){
    var result;
    $.ajax({
        url: url,
        type: "POST",             // Type of request to be send, called as method
        data: {}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        dataType: 'html',          // Response data type
        async: sync,
        beforeSend: function () { // A function to be called before start
            if (loader == true && group == 'parent') $('#list-loader').removeAttr('hidden');
            if (loader == true && group == 'child') $('#list-loader-child').removeAttr('hidden');
        },
        success: function (responses) {  // A function to be called if request succeeds
            result = responses;
        },
        complete: function (xhr, status) {
            if (loader == true && group == 'parent') setTimeout(() => { $('#list-loader').attr('hidden', 'hidden'); }, 1000);
            if (loader == true && group == 'child') setTimeout(() => { $('#list-loader-child').attr('hidden', 'hidden'); }, 1000);
        },
        error: function (xhr, status, error) { UIkit.notification(error, { pos: 'top-right' }) }
    });

    return result;
}

function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

// Ajax Form
function p_form(){
    $('body').on('submit', '.form-submission', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
    
        $.ajax({
            url: url,
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            dataType: 'json',          // Response data type
            async: false, 
            beforeSend: function () { // A function to be called before start
                UIkit.modal('#modal-loader').show();
            },
            success: function (responses) {  // A function to be called if request succeeds
                console.log(url, responses);
                if (responses != null){
                    if (responses.status_code != '200') {
                        if (responses.status != false){
                            if (!isObject(responses.message)){
                                UIkit.notification(responses.message, { pos: 'top-right' })
                            } else {
                                console.log(responses.message);
                                // new Map(responses.message).forEach(logMapElements);
                                UIkit.notification('All column are required', { pos: 'top-right' })
                            }
                        } else {
                            UIkit.notification(responses.error, { pos: 'top-right' })
                        }
                    } else {
                        setTimeout(() => { location.reload(); }, 800);
                    }
                } else {
                    UIkit.notification('Server not responding', { pos: 'top-right' })
                }
            },
            complete: function (xhr, status) {
                setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500);
            },
            error: function (xhr, status, error) { 
                console.log(xhr);
                message = xhr.responseJSON.message;
                if (typeof message != "object") {
                    UIkit.notification(xhr.responseJSON.message, { pos: 'top-right' })
                } else {
                    message = xhr.responseJSON.message;
                    for (var value in message) {
                        UIkit.notification(message[value], { pos: 'top-right' })
                    }
                }
            }
        });
    });

    $('body').on('submit', '.form-submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var form_method = $(this).attr('method');
        var authorization = $(this).attr('data-auth');
        var form_data = "";
        if (form_method.toLowerCase() == "post") {
            form_data = new FormData(this);
            UIkit.modal('#modal-loader').show();
            setTimeout(() => {
                $.ajax({
                    url: url,
                    type: form_method,             // Type of request to be send, called as method
                    data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false
                    dataType: 'json',          // Response data type
                    async: false, 
                    beforeSend: function(xhr) { // A function to be called before start
                        // UIkit.modal('#modal-loader').show();
                        xhr.setRequestHeader ("Authorization", authorization);
                    },
                    success: function (responses) {  // A function to be called if request succeeds
                        if (responses.status_code != '200'){
                            UIkit.notification(responses.message, { pos: 'top-right' });
                        }else {
                            setTimeout(() => { location.reload(); }, 800); 
                        }
                    },
                    complete: function (xhr, status) {
                        setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500); 
                    },
                    error: function (xhr, status, error) { 
                        console.log(xhr); 
                        message = xhr.responseJSON.message;
                        if (typeof message != "object"){
                            UIkit.notification(xhr.responseJSON.message, { pos: 'top-right' }) 
                        } else {
                            message = xhr.responseJSON.message;
                            for (var value in message) {
                                UIkit.notification(message[value], { pos: 'top-right' }) 
                            }
                        }
                    }
                });
            }, 500);
        } else {
            form_data = getFormData($(this));

            $.ajax({
                url: url,
                type: form_method,             // Type of request to be send, called as method
                data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: 'application/x-www-form-urlencoded',
                dataType: 'json',          // Response data type
                async: false, 
                beforeSend: function(xhr) { // A function to be called before start
                    UIkit.modal('#modal-loader').show();
                    xhr.setRequestHeader ("Authorization", authorization);
                },
                success: function (responses) {  // A function to be called if request succeeds
                    console.log(responses);
                    if(responses.status_code != '200'){
                        UIkit.notification(responses.message, { pos: 'top-right' })
                    }else {
                        setTimeout(() => { location.reload(); }, 800); 
                    }
                },
                complete: function (xhr, status) {
                    setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500); 
                },
                error: function (xhr, status, error) { console.log(xhr); UIkit.notification(error, { pos: 'top-right' }) }
            });

        }
        console.log(form_method);
        
        return false;
    });
}

$('body').on('submit', '#form_booking', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var authorization = $(this).attr('data-auth');
    console.log(url);

    $.ajax({
        url: url,
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        dataType: 'json',          // Response data type
        async: false, 
        beforeSend: function(xhr) { // A function to be called before start
            UIkit.modal('#modal-loader').show();
            xhr.setRequestHeader ("Authorization", authorization);
        },
        success: function (responses) {  // A function to be called if request succeeds
            console.log(responses);
            if(responses.status_code != '200'){
                UIkit.notification(responses.message, { pos: 'top-right' })
            }else {
                setTimeout(() => { location.reload(); }, 800); 
            }
        },
        complete: function (xhr, status) {
            setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500); 
        },
        error: function (xhr, status, error) { console.log(xhr); UIkit.notification(error, { pos: 'top-right' }) }
    });
});

$('body').on('submit', '#form_edit_booking', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var authorization = $(this).attr('data-auth');
    var id = $("input[name=id]").val();
    var rent_start = $("input[name=rent_start]").val();
    var rent_end = $("input[name=rent_end]").val();
    var data = JSON.stringify({'id':id, 'rent_start':rent_start, 'rent_end':rent_end});
    console.log(url);

    $.ajax({
        url: url,
        type: "PATCH",             // Type of request to be send, called as method
        data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: 'application/json',       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        dataType: 'json',          // Response data type
        beforeSend: function(xhr) { // A function to be called before start
            UIkit.modal('#modal-loader').show();
            xhr.setRequestHeader ("Authorization", authorization);
        },
        success: function (responses) {  // A function to be called if request succeeds
            console.log(responses);
            if(responses.status_code != '200'){
                UIkit.notification(responses.message, { pos: 'top-right' })
            }else {
                setTimeout(() => { location.reload(); }, 800); 
            }
        },
        complete: function (xhr, status) {
            setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500); 
        },
        error: function (xhr, status, error) { console.log(xhr); UIkit.notification(error, { pos: 'top-right' }) }
    });
});

$('body').on('submit', '#form_update_invoice_status', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var authorization = $(this).attr('data-auth');
    var id = $("input[name=id]").val();
    var status = $("input[name=status]").val();
    var data = JSON.stringify({'id':id, 'status':status});
    console.log(url);

    $.ajax({
        url: url,
        type: "PATCH",             // Type of request to be send, called as method
        data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: 'application/json',       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        dataType: 'json',          // Response data type
        beforeSend: function(xhr) { // A function to be called before start
            UIkit.modal('#modal-loader').show();
            xhr.setRequestHeader ("Authorization", authorization);
        },
        success: function (responses) {  // A function to be called if request succeeds
            console.log(responses);
            if(responses.status_code != '200'){
                UIkit.notification(responses.message, { pos: 'top-right' })
            }else {
                setTimeout(() => { location.reload(); }, 800); 
            }
        },
        complete: function (xhr, status) {
            setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500); 
        },
        error: function (xhr, status, error) { console.log(xhr); UIkit.notification(error, { pos: 'top-right' }) }
    });
    return false;
});

$('body').on('submit', '#form_edit_version', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var authorization = $(this).attr('data-auth');
    var id = $("input[name=id]").val();
    var app_name = $("#app_name option:selected").val();
    var code = $("input[name=code]").val();
    var message = $("input[name=message]").val();
    var urlna = $("input[name=url]").val();
    var data = JSON.stringify({'id':id, 'app_name':app_name, 'code':code, 'message':message, 'url':urlna});
    console.log(authorization);

    $.ajax({
        url: url,
        type: "PATCH",             // Type of request to be send, called as method
        data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: 'application/json',       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        dataType: 'json',          // Response data type
        beforeSend: function(xhr) { // A function to be called before start
            UIkit.modal('#modal-loader').show();
            xhr.setRequestHeader ("Authorization", authorization);
        },
        success: function (responses) {  // A function to be called if request succeeds
            console.log(responses);
            if(responses.status_code != '200'){
                UIkit.notification(responses.message, { pos: 'top-right' })
            }else {
                setTimeout(() => { location.reload(); }, 800); 
            }
        },
        complete: function (xhr, status) {
            setTimeout(() => { UIkit.modal('#modal-loader').hide(); }, 500); 
        },
        error: function (xhr, status, error) { console.log(xhr); UIkit.notification(error, { pos: 'top-right' }) }
    });
    return false;
});

// inser data to input
function p_datainput(data){
    for (var value in data) {
        if ($("[name='" + value + "']").attr('type') != "file" && $("[name='" + value + "']").attr('type') != "password") {
            if ($("[name='" + value + "']").attr('type') != "radio"){
                $("[name=" + value + "]").val(data[value]);
            } else if ($("[name='" + value + "']").attr('type') == "radio"){
                $("[name='" + value + "'][value='" + data[value] + "']").prop('checked', true);
            } else if ($("[name='" + value + "']").attr('type') == "checkbox"){
                $("[name='" + value + "'][value='" + data[value] + "']").prop('checked', true);
            }
        } else {
            var img_url = $("[name-tag=" + value + "]").attr('img-url');
            if (data[value] != "") $("[name-tag=" + value + "]").attr('src', img_url + data[value]);
            else $("[name-tag='" + value + "']").attr('src', img_url + 'default.png');
        }
    }
}

isObject = function (a) {
    return (!!a) && (a.constructor === Object);
};

function isArray(o) {
    return Object.prototype.toString.call(o) === '[object Array]';
}

function logMapElements(value, key, map) {
    // console.log(`m[${key}] = ${value}`);
    UIkit.notification('${ value }', { pos: 'top-right' })
}