$("body").click(function(b){var a=!1;b.target&&(a=$(b.target).closest(".gp_edit_select"));a.length?(a=a.find(".gp_edit_select_options"),a.is(":visible")?$(b.target).closest(".gp_selected_folder").length&&CloseFolder():(a.slideDown(500,function(){$("#gp_image_area").addClass("gp_active")}),$("#gp_gallery_avail_imgs").animate({height:80},500))):CloseFolder()});
function CloseFolder(){$(".gp_active").length&&($("#gp_gallery_avail_imgs").animate({height:220},500),$(".gp_edit_select_options").slideUp(500,function(){$("#gp_image_area").removeClass("gp_active")}))}$gp.links.gp_gallery_folder=function(b,a){b.preventDefault();LoadImages(a)};function LoadImages(b){var a=strip_from(gp_editor.save_path,"?"),a=b?a+("?cmd=gallery_folder&dir="+encodeURIComponent(b)):a+"?cmd=gallery_images";$gp.jGoTo(a)}gpresponse.img_deleted_id=function(){$("#"+this.CONTENT).remove()};