/**
 * Created with JetBrains PhpStorm.
 * User: winder
 * Date: 04.04.13
 * Time: 2:04
 * To change this template use File | Settings | File Templates.
 */
function factory_change (factory_name) {
	$('.factory_body:visible').fadeOut( 200,function() {$('.'+factory_name).fadeIn(); });
	$('.dm_current').removeClass('dm_current');
	$('#'+factory_name+'_b').addClass('dm_current');

}

function changeShap(url, height, id) {
	$("header").css({backgroundImage : "url("+url+")"});
	$(".menu_uz ul li a").removeClass("current");
	$("#"+id).addClass("current");
}
