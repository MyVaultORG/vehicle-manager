function ajaxLoad(action) {
    ajax_load_div = $(".ajax_load");

    if (action === "open") {
        ajax_load_div.fadeIn(200).css("display", "flex");
    }

    if (action === "close") {
        ajax_load_div.fadeOut(200);
    }        
}