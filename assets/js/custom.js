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

    $.fn.mata_uang = function() {
		var angka = this.text();
        var pecah = angka.split(",");
		var number_string = pecah[0].replace(/\./g, '').toString();

		var sisa 	= number_string.length % 3;
		var rupiah 	= number_string.substr(0, sisa);
		var ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
        var separator = "";

		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

        if (pecah[1]){
            rupiah = rupiah + ',' + pecah[1];
        }
		this.text(rupiah);
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

    $(".mata_uang").each(function(){
        $(this).mata_uang();
    });

    // UIkit.offcanvas("#offcanvas-usage").hide();
});