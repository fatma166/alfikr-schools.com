function countChecked(){"all"===checkState&&$(".bulk_action input[name='table_records']").iCheck("check"),"none"===checkState&&$(".bulk_action input[name='table_records']").iCheck("uncheck");var e=$(".bulk_action input[name='table_records']:checked").length;e?($(".column-title").hide(),$(".bulk-actions").show(),$(".action-cnt").html(e+" Records Selected")):($(".column-title").show(),$(".bulk-actions").hide())}!function(e,t){var n=function(e,t,n){var i;return function(){function c(){n||e.apply(a,o),i=null}var a=this,o=arguments;i?clearTimeout(i):n&&e.apply(a,o),i=setTimeout(c,t||100)}};jQuery.fn[t]=function(e){return e?this.bind("resize",n(e)):this.trigger(t)}}(jQuery,"smartresize");
var CURRENT_URL=window.location.href.split("?")[0],$BODY=$("body"),
$MENU_TOGGLE=$("#menu_toggle"),
$SIDEBAR_MENU=$("#sidebar-menu"),
$SIDEBAR_FOOTER=$(".sidebar-footer"),
$LEFT_COL=$(".left_col"),$RIGHT_COL=$(".right_col"),
$NAV_MENU=$(".nav_menu"),$FOOTER=$("footer");
$(document).ready(function(){var e=function()
{$RIGHT_COL.css("min-height",$(window).height());
var e=$BODY.outerHeight(),
t=$BODY.hasClass("footer_fixed")?0:$FOOTER.height(),
n=$LEFT_COL.eq(1).height()+$SIDEBAR_FOOTER.height(),i=n>e?n:e;i-=$NAV_MENU.height()+t,$RIGHT_COL.css("min-height",i)};
$SIDEBAR_MENU.find("a").on("click",function(t){var n=$(this).parent();n.is(".active")?(n.removeClass("active active-sm"),
$("ul:first",n).slideUp(function(){e()})):(n.parent().is(".child_menu")||($SIDEBAR_MENU.find("li").removeClass("active active-sm"),
$SIDEBAR_MENU.find("li ul").slideUp()),n.addClass("active"),$("ul:first",n).slideDown(function(){e()}))}),



//$MENU_TOGGLE.on("click",function(){
  $( document ).ready(function() {  
    $BODY.hasClass("nav-md")?($SIDEBAR_MENU.find("li.active ul").hide(),
    $SIDEBAR_MENU.find("li.active").addClass("active-sm").removeClass("active")):($SIDEBAR_MENU.find("li.active-sm ul").show(),
    $SIDEBAR_MENU.find("li.active-sm").addClass("active").removeClass("active-sm")),$BODY.toggleClass("nav-md nav-sm"),e()
    
    
}),
    
    
    $SIDEBAR_MENU.find('a[href="'+CURRENT_URL+'"]').parent("li").addClass("current-page"),
    $SIDEBAR_MENU.find("a").filter(function(){return this.href==CURRENT_URL}).parent("li").addClass("current-page").parents("ul").slideDown(function(){e()}).parent().addClass("active"),$(window).smartresize(function(){e()}),e(),$.fn.mCustomScrollbar&&$(".menu_fixed").mCustomScrollbar({autoHideScrollbar:!0,theme:"minimal",mouseWheel:{preventDefault:!0}})}),$(document).ready(function(){$(".collapse-link").on("click",function(){var e=$(this).closest(".x_panel"),t=$(this).find("i"),n=e.find(".x_content");e.attr("style")?n.slideToggle(200,function(){e.removeAttr("style")}):(n.slideToggle(200),e.css("height","auto")),t.toggleClass("fa-chevron-up fa-chevron-down")}),$(".close-link").click(function(){var e=$(this).closest(".x_panel");e.remove()})}),$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip({container:"body"})}),$(".progress .progress-bar")[0]&&$(".progress .progress-bar").progressbar(),$(document).ready(function(){if($(".js-switch")[0]){var e=Array.prototype.slice.call(document.querySelectorAll(".js-switch"));e.forEach(function(e){new Switchery(e,{color:"#26B99A"})})}}),$(document).ready(function(){$("input.flat")[0]&&$(document).ready(function(){$("input.flat").iCheck({checkboxClass:"icheckbox_flat-green",radioClass:"iradio_flat-green"})})}),$("table input").on("ifChecked",function(){checkState="",$(this).parent().parent().parent().addClass("selected"),countChecked()}),$("table input").on("ifUnchecked",function(){checkState="",$(this).parent().parent().parent().removeClass("selected"),countChecked()});var checkState="";$(".bulk_action input").on("ifChecked",function(){checkState="",$(this).parent().parent().parent().addClass("selected"),countChecked()}),$(".bulk_action input").on("ifUnchecked",function(){checkState="",$(this).parent().parent().parent().removeClass("selected"),countChecked()}),$(".bulk_action input#check-all").on("ifChecked",function(){checkState="all",countChecked()}),$(".bulk_action input#check-all").on("ifUnchecked",function(){checkState="none",countChecked()}),$(document).ready(function(){$(".expand").on("click",function(){$(this).next().slideToggle(200),$expand=$(this).find(">:first-child"),"+"==$expand.text()?$expand.text("-"):$expand.text("+")})}),"undefined"!=typeof NProgress&&($(document).ready(function(){NProgress.start()}),$(window).load(function(){NProgress.done()}));