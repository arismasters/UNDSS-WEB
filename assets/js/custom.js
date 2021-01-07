$(function(){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host;

    // var path = getUrl.pathname.split("/");
    // $( "a[href='"+getUrl .protocol + "//" + getUrl.host + "/" + path[1] +"']" ).parent("li.nav-item").addClass('active');
    // $( "a[href='"+getUrl .protocol + "//" + getUrl.host + "/" + path[1] +"']" ).parent("div").parent("div").parent("li.nav-item").addClass('active');
    // $( "a[href='"+getUrl .protocol + "//" + getUrl.host + "/" + path[1] +"']" ).parent("div").parent("div.collapse").addClass('show');
    // $( "a[href='"+getUrl .protocol + "//" + getUrl.host + "/" + path[1] +"'].collapse-item" ).addClass('active');

    $.fn.myAlert = function(msg=null, status=null) {
        var html = '<div id="toggle-alert-delete" class="uk-alert-'+status+' toggle" uk-alert>\
        <a class="uk-alert-close" uk-close></a>\
        <h3>Notice</h3>\
        '+msg+'\
        </div>';
        this.empty();
        this.append(html);
    }

    $.fn.submitForm = function(elementId, redirect = null){
        var url = $(this).attr('action');
        var data = "";
        var form_method = $(this).attr("method");
        // var authorization = $(this).attr('data-auth');
        if (form_method.toLowerCase() == "post") {
            data = new FormData(document.getElementById(elementId));
            $.ajax({
                type: form_method,
                url: url,
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                async: false, 
                // beforeSend: function(xhr) {
                //     xhr.setRequestHeader ("Authorization", authorization);
                // },
                success: function(retData){
                    if (retData.status_code == 200) {
                        $("#alert").myAlert(retData.message, 'success');
                        if (redirect == null) {
                            window.location.reload();
                        } else {
                            window.location.href = baseUrl+"/"+redirect;
                        }
                    } else {
                        $("#alert").myAlert(retData.message, 'warning');
                    }            
                }
            });
        }
        else {
            data = $(this).serialize();
            $.ajax({
                type: form_method,
                url: url,
                data: data,
                contentType: 'application/x-www-form-urlencoded',
                cache: false,
                processData: false,
                dataType: 'json',
                async: false, 
                // beforeSend: function(xhr) {
                //     xhr.setRequestHeader ("Authorization", authorization);
                // },
                success: function(retData){
                    // console.log(retData);
                    // var rData = JSON.parse(retData);
                    if (retData.status_code == 200) {
                        $("#alert").myAlert(retData.message, 'success');
                        if (redirect == null) {
                            window.location.reload();
                        } else {
                            window.location.href = baseUrl+"/"+redirect;
                        }
                    } else {
                        $("#alert").myAlert(retData.message, 'warning');
                    }            
                }
            });    
        }
    }

    $("body").on("click", ".modal-hapus", function(){
        var action = $(this).attr("data-action");
        var id = $(this).attr("data-id");
        
        $(".hapus-iya").attr("data-id", id);
        $(".hapus-iya").attr("data-action", action);
    });

    $("body").on("click", ".hapus-iya", function () {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-action');
        // var authorization = $(this).attr('data-auth');
        $.ajax({
            type: "DELETE",
            url: url + "?id=" + id,
            dataType: "json",
            async: false,
            // beforeSend: function(xhr) {
            //     xhr.setRequestHeader ("Authorization", authorization);
            // },
            success: function (retData) {
                if (retData.status_code == 200) {
                    $("#alert").myAlert(retData.message, 'success');
                    window.location.reload();
                } else {
                    $("#alert").myAlert(retData.message, 'warning');
                }
            }
        });
    });

    $("body").on("change", ".inputfile", function (event) {
        var patern = /.png|.PNG|.jpg|.JPG|.jpeg|.JPEG|.jfif|.JFIF/i;
        var input = event.target;
        var reader = new FileReader();
        var idx = $(".inputfile").index(this);
        if (input.value.match(patern)) {
            reader.onload = function () {
                var dataURL = reader.result;
                $(".preview").eq(idx).attr('src', dataURL);
            };
            reader.readAsDataURL(input.files[0]);
            $(".preview").eq(idx).show();
        } else {
            $(".preview").eq(idx).hide();
            // $(".alert-box").alert('Salah tipe file, tipe file harus .png atau .jpg', 'danger');
        }
    });

    $("body").on("click", "path", function(){
        id = $(this).attr("id");
        title = $(this).attr("title");
        window.location.href = baseUrl+"/region";
    });

    $("body").on("mouseenter", "path", function(){
        id = $(this).attr("id");
        title = $(this).attr("title");
        tooltip = $(this).attr("uk-tooltip");
        if (typeof tooltip !== typeof undefined && tooltip !== false) {
            UIkit.tooltip($(this)).show();
        } else {
            $(this).attr("uk-tooltip", title);
            UIkit.tooltip($(this)).show();
        }
    });

    $("#scenario").hide();
    $("#form-scenario").hide();

    $("body").on("click", ".scenario", function(){
        $(".scenario").removeClass("uk-background-secondary");
        $(this).addClass("uk-background-secondary");
        $("#scenario").show();
    });
    
    $("body").on("click", ".close", function(){
        $("#scenario, #form-scenario").hide();
    });
    
    $("body").on("click", ".new-scan", function(){
        $("#form-scenario").show();
    });

    // UIkit.offcanvas("#offcanvas-usage").hide();
    // UIkit.toggle("#my-id").toggle();
    // UIkit.toggle("#form-scenario").toggle();
    // UIkit.util.on('.my-id', 'click', function () {
    //     console.log("form-scenario");
    //     $("#my-id").removeClass("uk-invisible").addClass("uk-visible");
    // });
});