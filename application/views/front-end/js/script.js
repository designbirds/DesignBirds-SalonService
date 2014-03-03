
jQuery(document).ready(function($){

	"use strict";

	$(".donate-updown").click(function(){
		$(".donate").toggleClass("down");
	});	
	
	
	
	
	$('.toggle:first').addClass("activate");
		$(".toggle").mouseenter(function(){
		$(".toggle").removeClass("activate");
		$(this).addClass("activate");
	});	
	
	
		$('.ipadMenu').change(function(){
			var loc = $('option:selected', this).val();
			document.location.href = loc;
		});
	
	
	$(".panel-icon").click(function(){
		$(".side-panel").toggleClass("show");
	});	
	
	
	$(".boxed-style").click( function(){
		$(".theme-layout").addClass("boxed");
		$("body").addClass('bg-body1');
	});
	$(".full-style").click( function(){
		$(".theme-layout").removeClass("boxed");
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat1").click( function(){
		$("body").addClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat2").click( function(){
		$("body").removeClass('bg-body1');
		$("body").addClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat3").click( function(){
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").addClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat4").click( function(){
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").addClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat5").click( function(){
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").addClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat6").click( function(){
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").addClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat7").click( function(){
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").addClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat8").click( function(){
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").addClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat9").click( function(){
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").addClass('bg-body9');
		$("body").removeClass('bg-body10');
	});
	$(".pat10").click( function(){
		$("body").removeClass('bg-body1');
		$("body").removeClass('bg-body2');
		$("body").removeClass('bg-body3');
		$("body").removeClass('bg-body4');
		$("body").removeClass('bg-body5');
		$("body").removeClass('bg-body6');
		$("body").removeClass('bg-body7');
		$("body").removeClass('bg-body8');
		$("body").removeClass('bg-body9');
		$("body").addClass('bg-body10');
	});
	
	
	
	$(".sidebar-widget li").click(function(){
		$('.sub-list', this).slideToggle();
	return false;
	});
	
	
	
	$(".accordians li").click(function(){
		$('.open', this).slideToggle();
	return false;
	
	});
	
	$(".accordians li").click(function(){
		$("h3", this).toggleClass("active-toggle");
	});
	
	
	
	

	var allPanels = $('.sidebar-accordion > dd').hide();
	var dt = $('.sidebar-accordion > dt a');
	
	$('.sidebar-accordion > dt a').click(function() {

		var $this = $(this);
		var $target =  $this.parent('dt').next('dd');
	
		if(!$target.hasClass('active')){
			allPanels.removeClass('active').slideUp();
			$target.addClass('active').slideDown();
			dt.removeClass('activate');
			$this.addClass('activate');
		}
		return false;
	});
	
	
	
	

	$('#slider1').tinycarousel();
	$('#slider2').tinycarousel(
	{
		display: 1,
		interval: true
	});
	$('#slider3').tinycarousel(
	{
		display: 1,
		interval: true
	});
	
	
	
	
	
	if ($('#camera_wrap_1').length !== 0){
	$('#camera_wrap_1').camera({
		height: '38%',
		thumbnails: true,
		time: 12000,
		transPeriod: 1000
	});
	}
	

});
