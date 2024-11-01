jQuery(document).ready(function(){
    nice_loader_location();
});
jQuery(window).resize(function(){
    nice_loader_location();
});
jQuery(window).load(function(){
    setTimeout(function(){ nice_loader_remove(); }, 1200);
});
function nice_loader_location() {
    var window_height      = jQuery(window).height();
    var nice_loader_height = jQuery(".wp_nice_loader").height();
    var top_position       = window_height/2 - (nice_loader_height/2);
    jQuery("#wp_nice_loader_container .wp_nice_loader").css("top",top_position);
}
function nice_loader_remove() {
    jQuery("#wp_nice_loader_container").fadeOut(1000, function(){
        jQuery(this).remove();
        jQuery("body").removeClass("wp_nice_loader_body");
    });
}
