$(function(){function l(a){a=a.find("a.gp_label");return 0==a.length?"":a.data("arg")}function g(a){e&&e.removeClass("current");e=a;if(e.length){m=e.attr("id");e.addClass("current");q();a=f.height();var b=h.height();b<a&&h.css("min-height",a);var c=e.position();if(c){var d=0;0<c.top&&(d=Math.round(c.top/b*100));a=c.top-d/120*a;a=Math.max(0,a);f.stop().animate({top:a})}}else f.hide()}function q(){var a,b;b=e.find("span").html();b=b.replace(/&amp;/g,"&").replace(/&lt;/g,"<").replace(/&gt;/g,">");b=
jQuery.parseJSON(b);a=e.find(".external").length?r:s;b=$.extend({},{title:"",layout_color:"",layout_label:"",types:"",size:"",mtime:"",opts:""},b);var c;$.each("title key url layout_label types size mtime opts".split(" "),function(){c=RegExp("(%5B"+this+"%5D|\\["+this+"\\])","gi");a=a.replace(c,b[this])});f.show().html(a).find(".layout_icon").css({background:b.layout_color});b.special&&f.find(".not_special").hide();b.has_layout?f.find(".no_layout").hide():f.find(".has_layout").hide();b.level>=max_level_index&&
f.find(".insert_child").hide()}function n(){var a,b,c=$("#admin_menu"),d={path:gpBLink+"/Admin_Menu",expires:100};if(0<c.length){a=t("gp_menu_hide")||"";a=decodeURIComponent(a);var e=$("#gp_curr_menu").val();a=a.replace(RegExp("#"+e+"=\\[[^#=\\]\\[]*\\]",""),"");b="#"+$("#gp_curr_menu").val()+"=[";c.find(".hidechildren > div > .gp_label").each(function(a,c){b+=$(c).data("arg")+","});b+="]";$.cookie("gp_menu_hide",a+b,d)}$.cookie("gp_menu_prefs",$("#gp_menu_select_form").serialize(),d)}function p(){var a,
b,c="";$(".menu_marker").each(function(){var d=$(this);b=d.data("menuid");a=d.children();c+="&menus["+b+"]="+encodeURIComponent(a.eq(0).val());c+="&menuh["+b+"]="+encodeURIComponent(a.eq(1).val());c+="&menuc["+b+"]="+encodeURIComponent(a.eq(2).val())});return c}function t(a){a+="=";for(var b=document.cookie.split(";"),c=0;c<b.length;c++){for(var d=b[c];" "==d.charAt(0);)d=d.substring(1,d.length);if(0==d.indexOf(a))return d.substring(a.length,d.length)}return!1}var h=$("#admin_menu"),f=$("#admin_menu_tools"),
e=!1,m=!1,k=!1,s=$("#menu_info").html(),r=$("#menu_info_extern").html();h.nestedSortable({disableNesting:"no-nest",forcePlaceholderSize:!0,handle:"a.sort",items:"li",opacity:0.8,placeholder:"placeholder",tabSize:25,toleranceElement:"> div",listType:"ul",delay:2,stop:function(a,b){var c=b.item,d=c.parent().siblings("div"),e=c.children("div"),c={cmd:"drag",drag_key:l(e),parent:l(d),prev:l(c.prev().children("div")),hidden:c.closest("#menu_available_list").length};0<d.length&&d.parent(":not(.haschildren)").addClass("haschildren");
0<k.length&&0==k.find("li").length&&k.removeClass("haschildren");g(e);$gp.loading();c=jQuery.param(c,!0);c+=p();$gp.postC(window.location.href,c)},start:function(a,b){k=b.item.parent().siblings("div").parent()}}).disableSelection();gpresponse.gp_menu_refresh=function(a){h.nestedSortable("refresh");m&&(a=$("#"+m),g(a))};$gp.links.menu_info=function(a){a.preventDefault();var b=$(this).parent();window.setTimeout(function(){g(b)},100)};$gp.links.expand_img=function(a){$gp.links.menu_info.call(this,a);
$li=$(this).closest("li");$li.hasClass("haschildren")&&($li.toggleClass("hidechildren"),n())};gpinputs.menupost=function(){var a=p(),b=$(this).closest("form");b.attr("action",$gp.jPrep(b.attr("action"),a));$gp.post(this);return!1};$gp.links.menupost=function(a){a.preventDefault();a=strip_to(this.search,"?");a+=p();$gp.postC(this.href,a)};$("#gp_menu_select").change(function(){n();var a=window.location.href;a.indexOf("?")?window.location=strip_from(a,"?"):$gp.Reload()});$(document).on("click","input:checkbox",
function(){$this=$(this);0<$this.filter(":checked").length?$this.closest("li").addClass("gpui-state-checked"):$this.closest("li").removeClass("gpui-state-checked")});$(document).on("keyup","input.gpsearch",function(){var a=this.value.toLowerCase();$(this).closest("form").find(".gpui-scrolllist li:not(.gpui-state-checked)").each(function(){var b=$(this);-1==b.text().toLowerCase().indexOf(a)?b.hide():b.show()})});(function(){var a=$("#admin_menu").find("div:first");g(a);n()})()});