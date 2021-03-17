var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host;

$(function(){
    $("body").on("click", "path", function(){
        id = $(this).attr("id");
        title = $(this).attr("title");
        window.location.href = baseUrl+"/dashboard/detail/"+id;
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
});