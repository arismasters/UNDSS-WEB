// Main Js
// Document Ready
$(function(){
    // clock & date
    if ($('.running_clock').length > 0 || $('.running_date').length > 0){ startTime(); }

    // datepicker
    if ($('.datepicker').length > 0 ){ datepick_start(); }

    // scroll event
    if ($('#scrollup-notifier').length > 0) {
        $('#scrollup-notifier a').on('click', function(){
            $('#scrollup-notifier').attr('hidden', 'true');
        });
    }
    if ($('#scroll-notifier').length > 0 ) {
        bodyscroll();
    }

    // Redirect event
    $("body").on("click", "[link-address]", function(){
        location.href = $(this).attr("link-address");
    });

    $("body").on("click", "[link-address-blank]", function(){
        window.open($(this).attr("link-address-blank"), '_blank');
    });

    $("body").on("change", "[link-change]", function () {
        if($(this).val() != ""){
            location.href = $(this).attr("link-change") + $(this).val();
        } else {
            location.href = $(this).attr("link-default");
        }
    });

    // Table on double click redirect
    $("body").on("dblclick", "[link-detail]", function(){
        location.href = $(this).attr("link-detail");
    });

    // data option
    $("body").on("click", "[link-option]", function(){
        var id = $(this).attr("link-option");
        var header = $(this).attr("link-header");
        
        UIkit.util.on('#modal-option-list', 'beforeshow', function () {
            $("#modal-option-list #header").html(header);
            $("#modal-option-list [url-option]").each(function () { $(this).attr('link-address', $(this).attr('url-option') + id); });
        });
        
        UIkit.util.on('#modal-option-list', 'hidden', function () {
            $("#modal-option-list #header").html('');
            $("#modal-option-list [url-option]").each(function () { $(this).removeAttr('link-address'); });
        });

        UIkit.modal('#modal-option-list').show();
    });

    $("body").on("click", "[link-source]", function(){
        var url = $(this).attr("link-source");
        var view = $(this).attr("link-view");
        var html = p_getview(url);

        $('.layout-half-bg:not(.default)').attr('hidden', 'true');
        $('.list-data .list-item').removeClass('active');
        $(this).closest('.list-item').addClass('active');
        $(view).html(html);

        setTimeout(() => {
            $(view).removeAttr('hidden');
            if ($(window).width() <= 960 ) $('html, body').css('overflow', 'hidden');
        }, 200);
    });

    $("body").on("click", "[link-source-close]", function(){
        $('.list-data .list-item').removeClass('active');
        $('.layout-half-bg:not(.default)').attr('hidden', 'true');
        if ($(window).width() <= 960) $('html, body').css('overflow', 'auto');
    });

    $("body").on("change", "[link-action-checked]", function(){
        var set_value = 0;
        var message = $(this).attr("link-action-message-alt");
        if (this.checked) {
            set_value = 1;
            message = $(this).attr("link-action-message");
        }

        var url = $(this).attr("link-action-check") + '/' + set_value;
        $('#modal-confirm-button').attr('link-confirm-action', url);
        $('#modal-confirmation #message').html(message);
        UIkit.modal('#modal-confirmation').show();
    });

    $("body").on("click", "[link-confirm-action]", function(){
        UIkit.modal('#modal-confirmation').hide();
        var url = $(this).attr("link-confirm-action");
        p_action(url);
    });

    // Button inception
    // add
    $('body').on('click', '.button-add', function () {
        $('.layout-half-bg:not(.default)').attr('hidden', 'true');
        
        var target = $(this).attr('url-target');
        var action = $(target + " form").attr('action-add');
       
        $(target + " .title").html('Tambah');
        $(target + " form").attr('action', action);
        $('.form-submit').trigger("reset");
        textarea_autoexpand();
        $('.hide-onedit').removeAttr('hidden');
        $('.hide-onedit input').attr('required', 'true');
        if ($(window).width() <= 960) $('html, body').css('overflow', 'hidden');
        setTimeout(function(){ $(target).removeAttr('hidden'); }, 100);
    });

    // edit
    $('body').on('click', '.button-edit', function () {
        var id = $(this).attr('url-id');
        var url = $(this).attr('url-data');
        var target = $(this).attr('url-target');
        var result = p_getdata(url);
        var action = $(target + " form").attr('action-edit');
        
        $(target + " .title").html('Edit');
        // $(target + " form").attr('action', action);
        $(target + " form").attr('action', action + '/' + id);
        p_datainput(result.data); //insert data to form
        $('.hide-onedit').attr('hidden', 'true');
        $('.hide-onedit input').removeAttr('required');
        
        $('.layout-half-bg:not(.default)').attr('hidden', 'true');
        $('.list-data .list-item').removeClass('active');
        $(this).closest('li').addClass('active');
        
        $(target).removeAttr('hidden');
        textarea_autoexpand();
        if ($(window).width() <= 960) $('html, body').css('overflow', 'hidden');
    });

    $('body').on('click', '.button-edit-special', function () {
        var id = $(this).attr('url-id');
        var url = $(this).attr('url-data');
        var target = $(this).attr('url-target');
        var result = p_getdata(url);
        var action = $(target + " form").attr('action-edit');

        $(target + " .title").html('Edit');
        $(target + " form").attr('action', action + '/' + id);
        p_datainput(result.data);
        $('.hide-onedit').attr('hidden', 'true');
        $('.hide-onedit input').removeAttr('required');
        
        $(target).removeAttr('hidden');
        textarea_autoexpand();
        if ($(window).width() <= 960) $('html, body').css('overflow', 'hidden');
    });

    // delete
    $('body').on('click', '.button-delete', function () {
        var url = $(this).attr('url-data');
        var message = $(this).attr("message-data");
        $('#modal-confirm-button').attr('link-confirm-action', url);
        $('#modal-confirmation #message').html(message);
        UIkit.modal('#modal-confirmation').show();
    });

    // action
    $('body').on('click', '.button-action', function () {
        var url = $(this).attr('url-data');
        var message = $(this).attr("message-data");
        $('#modal-confirm-button').attr('link-confirm-action', url);
        $('#modal-confirmation #message').html(message);
        UIkit.modal('#modal-confirmation').show();
    });

    // autocomplete
    $('body').on('keyup', '[autocomplete]', function () {
        var auto = $(this).attr('name');
        var input = $(this).attr('for');

        if ($(this).val().length > 0) {
            $('[name=' + input + ']').val('');

            var url = $(this).attr('autocomplete');
            var res = url.toString().split("?");
            if(res.length > 1){ 
                var res_2 = res[1].split('/');
                url = res[0] + '/' + res_2[1] + '/' + $(this).val() + '?' + res_2[0] + '&'; 
            } else {
                url = url + '/' + $(this).val() + '?';
            }

            url = url + 'source=' + auto + '&input=' + input;

            var html = p_getview(url);

            $('#autocomplete-box').remove();
            $(this).after(html);
        } else {
            $('#autocomplete-box').remove();
        }
    });

    // navigation 
    if ($('[navigation-toggle]').length > 0){
        $('[navigation-toggle]').on('click', function(){
            if($('#layout-navigation').hasClass('active')){
                $('#layout-navigation').removeClass('active');
                $('#layout-navigation [navigation-toggle] i').html('drag_handle');
            }else{
                $('#layout-navigation').addClass('active');
                $('#layout-navigation [navigation-toggle] i').html('navigate_before');
            }
        });
    }

    // scroll controller
    if ($(window).width() > 960) {
        $('body').on('mouseover', '.layout-half-bg', function () {
            $('html, body').css('overflow', 'hidden');
        });
        $('body').on('mouseleave', '.layout-half-bg', function () {
            $('html, body').css('overflow', 'auto');
        });
    }

    // event on window resize
    $(window).resize(function () {
        // $('.layout-half-bg:not(.default), #chat-header, #chat-inputbox').attr('hidden', 'true');
        $('.list-data .list-item').removeClass('active');
        $('html, body').css('overflow', 'auto');
        setTimeout(function () { $('.uk-sticky-placeholder').css('height', 'auto'); }, 200);

        if ($(window).width() > 960) {
            $('.layout-half-bg').on('mouseover', function () {
                $('html, body').css('overflow', 'hidden');
            });
            $('.layout-half-bg').on('mouseleave', function () {
                $('html, body').css('overflow', 'auto');
            });
        }
    });

    // circle bar initial
    circle_bar();

    // preview img
    $('body').on('change', '[type="file"]', function(){
        read_url(this, $(this).attr('preview-target'));
    });

    $("body").on("keyup", ".search_city", function(){
        var link_url = $(this).attr('data-link');
        var authorization = $(this).attr('data-auth');
        var q = $(this).val();
        if (q.length > 2) {
            $.ajax({
                type: "get",
                url: link_url + q,
                cache: false,
                contentType: false,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                beforeSend: function(xhr) {
                    xhr.setRequestHeader ("Authorization", authorization);
                },
                success: function(retData){
                  console.log(retData);
                  if (retData.status_code == 200){
                    $(".select_option_city").children().remove();
                    $.each(retData.data, function(key, value){
                        $('.select_option_city').append($("<option></option>").attr("value",value.id).text(value.city));
                    });
                    // $(".select_option_city").focus();
                  } else {
                      return [];
                  }
                }
            });
        }
    });
});

// scroll
function bodyscroll() {
    $(window).scroll(function () {

        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 180) {
            $('#scroll-notifier').attr('hidden', 'true');
            $('#shortcut-option.autohide-scroll').removeAttr('hidden');
        } else {
            $('#scroll-notifier').removeAttr('hidden');
            $('#scrollup-notifier').attr('hidden', 'true');

            $('#shortcut-option.autohide-scroll').attr('hidden', 'true');

            // navigation effect
            if ($("#main-nav").length > 0 && $('body').scrollTop() > 70) {
                $("#main-nav").removeClass('show');
            }
        }

        if ($(window).scrollTop() == 0) {

        }
    });
}

function infinite_scroll(url, page = 1){
    if ($('.list-data.infinity-list').length > 0){
        var win = $(window);
        win.scroll(function () {
            if ($(document).height() - win.height() <= (Math.round(win.scrollTop()) + 60)) {
                var html = p_getlist(url + page);
                
                if (page > 1) {
                    $('.list-data.infinity-list').append(html);
                }
                if (html != '') {
                    page = page + 1;
                } else {
                    $(window).unbind('scroll');
                    $('#scrollup-notifier').removeAttr('hidden');
                    console.log('end of page');

                    setTimeout(function(){
                        infinite_scroll(url, page);
                    }, 1500);
                    bodyscroll();
                }
            }
        });
    }
}

function infinite_scroll_child(url, page_child = 1){
    console.log('init',url);
    if ($('.infinity-list-child').length > 0){
        var win = $('.layout-body');
        win.scroll(function () {
            console.log('scroll');
            if ($(document).height() - win.height() <= (Math.round(win.scrollTop()) + 60)) {
                var html = p_getlist(url + page_child, 'child');
                $('.infinity-list-child').append(html);
                if (html != '') {
                    page_child = page_child + 1;
                } else {
                    win.unbind('scroll');
                    $('#scrollup-notifier').removeAttr('hidden');
                    console.log('end of page_child');

                    setTimeout(function(){
                        infinite_scroll_child(url, page_child, 'child');
                    }, 1500);
                }
            }
        });
    }
}

// ui
function list_activation(target){
    $(target).addClass('active');
}

// form
function form_reset(target = null) {
    
    if(target == null){
        $(":input:not([type=hidden], [type=radio]), select, textarea").val('');
        $(":input[type=radio], :input[type=checkbox]").prop('checked', false);
    } else {
        $(target + " :input:not([type=hidden], " + target + " [type=radio]), " + target + "  select, " + target + " textarea").val('');
        $(target + " :input[type=radio], " + target + " :input[type=checkbox]").prop('checked', false);
    }
}

function textarea_autoexpand(){
    if ($('textarea').length > 0){
        var textarea = document.querySelector('textarea');
        textarea.style.cssText = 'height:auto; padding:0';
        textarea.style.cssText = 'height:' + (textarea.scrollHeight + 30) + 'px';

        $('textarea').unbind().one('focus', function () {
            this.baseScrollHeight = this.scrollHeight;
        }).on('input', function () {
            if (this.baseScrollHeight < this.scrollHeight) {
                this.baseScrollHeight = this.scrollHeight;
                $(this).css('height', this.scrollHeight + 'px');
            } else if (this.baseScrollHeight >= this.scrollHeight) {
                this.baseScrollHeight = this.scrollHeight;
                $(this).css('height', 'auto');
                $(this).css('height', this.scrollHeight + 'px');
            }
        });
    }
}

// circle bar
function circle_bar(){
    // circle bar
    if ($('.circle-bar.red').length > 0) {
        $('.circle-bar.red').circleProgress({
            fill: { color: '#ff5c5c' }
        }).on('circle-animation-progress', function (event, progress, stepValue) {
            if(stepValue == 1) $(this).find('.caption').text(100 + '%');
            else if (stepValue == 0) $(this).find('.caption').text(0 + '%');
            else $(this).find('.caption').text(String(stepValue.toFixed(2)).substr(2) + '%');
        });
    }

    if ($('.circle-bar.green').length > 0) {
        $('.circle-bar.green').circleProgress({
            fill: { color: '#32d296' }
        }).on('circle-animation-progress', function (event, progress, stepValue) {
            if (stepValue == 1) $(this).find('.caption').text(100 + '%');
            else if (stepValue == 0) $(this).find('.caption').text(0 + '%');
            else $(this).find('.caption').text(String(stepValue.toFixed(2)).substr(2) + '%');
        });
    }

    if ($('.circle-bar.yellow').length > 0) {
        $('.circle-bar.yellow').circleProgress({
            fill: { color: '#faa05a' }
        }).on('circle-animation-progress', function (event, progress, stepValue) {
            if (stepValue == 1) $(this).find('.caption').text(100 + '%');
            else if(stepValue == 0) $(this).find('.caption').text(0 + '%');
            else $(this).find('.caption').text(String(stepValue.toFixed(2)).substr(2) + '%');
        });
    }
}

// Clock & date
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    // document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    if ($('.running_clock').length > 0) {
        $(".running_clock").html(hr + ":" + min + " " + ap);
    }

    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    // var date = curWeekDay + ", " + curDay + " " + curMonth;
    var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear;

    if ($('.running_date').length > 0) {
        $(".running_date").html(date);
    }

    var time = setTimeout(function () { startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i; } return i;
}

// datepicker 
function datepick_start(){ 
    // datepicker https://amsul.ca/pickadate.js/date/
    $('.datepicker').pickadate({
        // Strings and translations
        monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],

        // Buttons
        today: 'Hari ini',
        clear: '',
        close: 'Keluar',
        selectMonths: true,
        selectYears: true,

        // Accessibility labels
        labelMonthNext: 'Bulan berikutnya',
        labelMonthPrev: 'Bulan sebelumnya',
        labelMonthSelect: 'Pilih bulan',
        labelYearSelect: 'Pilih Tahun',

        // Formats
        // format: 'd mmmm, yyyy',
        format: 'yyyy-mm-dd',
        // formatSubmit: 'yyyy-mm-dd',
        onRender: function () {
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var weekdays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var today = new Date(),
                // todayString = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear()
                header_html =
                    '<div class="picker__header_custom main-bg uk-light">' +
                    '<p>' + weekdays[today.getDay()] + '</p>' +
                    '<h1 class="uk-heading-xlarge uk-margin-remove">' + today.getDate() + '</h1>' +
                    '<h1 class="uk-heading-small uk-margin-small">' + months[today.getMonth()] + '</h1>' +
                    '</div>';

            $(".picker__header_custom").remove();
            $(".picker__box").prepend(header_html);

            $('.picker__select--month, .picker__select--year').addClass('uk-select uk-border-pill border-remove');
            $('.picker__button--today').addClass('uk-button uk-button-primary main-bg uk-border-pill uk-margin-small-right');
            $('.picker__button--close').addClass('uk-button uk-button-default uk-border-pill');
        },
        onOpen: function () {
            $(".picker__holder").css('display', 'inline-block');
        },
        onClose: function () {
            $(".picker__holder").css('display', 'none');
        },
    });
}

// loader
function show_loader(element = '#loader') {
    // $(element).addClass('uk-animation-slide-top-medium');
    $(element).removeAttr('hidden');
}

function hide_loader(element = '#loader'){
    // $(element).removeClass('uk-animation-slide-top-medium').addClass('uk-animation-slide-bottom-medium uk-animation-reverse');

    setTimeout(() => {
        // $(element).removeClass('uk-animation-slide-bottom-medium uk-animation-reverse').addClass('uk-animation-slide-top-medium');
        $(element).attr('hidden', 'true');
    }, 500);
}


// converter
var random_math = function () {
    return Math.round(Math.random() * 100);
};

function convert_bytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

function convert_fileicon(type) {
    var split = type.split("/");
    var class_ = split[0];
    var attribute = split[1];
    var icon = '';

    if (class_ == "image") { icon = 'photo'; }
    else if (class_ == "application" && attribute == "pdf") { icon = 'picture_as_pdf'; }
    else { icon = 'file_copy'; }


    return icon;
}

// readurl 
function read_url(input, target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            if ($(target).attr('src') != undefined){
                $(target).attr('src', e.target.result);
            } else {
                $(target).attr('hidden', 'hidden');
                $(target + '-inject').attr('data-src', e.target.result).removeAttr('hidden');
            }
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// autocomplete
// var autocomplete = $.UIkit.autocomplete("#oto", { /* options */ });

function getAutocompleteData (element) {
    var link_url = $(this).attr('data-link');
    var authorization = $(this).attr('data-auth');
    var q = $(element).val();
    if (q.length > 2) {
        $.ajax({
            type: "get",
            url: link_url + q,
            cache: false,
            contentType: false,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            beforeSend: function(xhr) {
                xhr.setRequestHeader ("Authorization", authorization);
            },
            success: function(retData){
                console.log(retData);
                if (retData.status_code == 200){
                return retData.data;
                } else {
                    return [];
                //   release(retData);
                }
            }
        });
    }
} 

