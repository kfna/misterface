var stage_width = 0;
var stage_height = 0;
var index = 0;

var anim = 0;
var anim_int; 

$(document).ready(function(){ 

  stage = $("#stage");
  stage_width = stage.width();
  stage_height = stage.height();
  stage_init(stage.width(),stage.height());
  
  
  $("#fullimage_01").css("z-index",1000000);
  $("#fullimage_01").css("left",(stage_width*2)+"px");
  $("#fullimage_01").stop().animate({ left:0, }, 1600,"easeInOutBack", function(){ 
    
	setTimeout(function(){
	  $("#fullimage_01").stop().animate({ left:-(stage_width*2)+"px", }, 1200,"easeInOutBack", function(){ $("#fullimage_01").hide().css("left",0);  });
	},1500);
	
  });
  
  $('.onClickAwards').click(function(){ 
    $('.tvcredits').hide();
    $('.awards').fadeToggle(); 
  });
  $('.onClickTVCredits').click(function(){ 
    $('.awards').hide();
    $('.tvcredits').fadeToggle(); 
  });
  $('.onClickExpand').click(function(e){ $(".fields").slideToggle(); });
  
  $('.onClickPeople').click(function(){
   $('.isPeople').fadeOut();
   $(this).prev().fadeIn();
 });
 
 $('.onClickPeople').click(function(){
   $('.isPeople').fadeOut();
   $(this).prev().fadeIn();
 });
 
 $(".onClickPeople").mouseenter(function(e) {
     $(this).children().stop().fadeIn();
    }).mouseleave(function(e){
	   $(this).children().stop().fadeOut();
    });
 
 
 $('.onClickClosePeople').click(function(e){ 
   $('.isPeople').show();
   $("#"+$(this).attr("rel")).fadeOut();
 });
 
 $('.onClickGoTo').click(function(){ 
   $('#menu li').removeClass('init');
   $('#menu li').removeClass('active');
   $(this).parent().addClass('active');
 });
 
 
 $("#slider").jCarouselLite({ visible:6,start:0, speed: 600,btnPrev: '.prev',btnNext: '.next',vertical:true });
 

 
});

$(window).resize(function() {
  stage = $("#stage");
  stage_width = stage.width();
  stage_height = stage.height();
  stage_init(stage.width(),stage.height());
  goTo(index);
});




function stage_init(w,h){
  $(".isLayer").width(w);
  $(".isLayer").height(h);
  $("#layers").width(w*9);
  about_h = $("#about .holder").height();
  clients_h = $("#clients .holder").height();
  people_h = $("#people .holder").height();
  works_h = $("#work .holder").height();
  news_h = $("#news .holder").height();
  archives_h = $("#work .holder").height();
  $("#about .holder").css('margin-top',(stage_height-about_h)/2+"px");
  $("#clients .holder").css('margin-top',(stage_height-clients_h)/2+"px");
  $("#people .holder").css('margin-top',(stage_height-people_h)/2+"px");
  $("#work .holder").css('margin-top',(stage_height-works_h)/2+"px");
  $("#archive .holder").css('margin-top',(stage_height-archives_h)/2+"px");
  $("#news .holder").css('margin-top',(stage_height-news_h)/2+"px");
 
}

function goTo(id){
	index = id;
	if(id!=0){ 
	  $("#footer").fadeOut(100); 
	  
	}
	
	if(id==1 || id==2|| id==3 || id==4){ $("#fullimage_01").fadeIn(200); $("#fullimage_02").fadeOut(200); }
	if(id==0 || id==5|| id==6){ $("#fullimage_02").fadeIn(200); $("#fullimage_01").fadeOut(200); }
	
	$("#layers").stop().animate({ left: -(stage_width*id)+"px", }, 1600,"easeInOutBack", function(){ 
	  if(id==0){ $("#footer").slideDown(); }
	  if(id==0){ $("#logo").fadeOut(); 
	    $('#menu li').removeClass('active');
		$('#menu li:first').addClass('init');
	  }else{ 
	    $("#logo").fadeIn();  
	  }
	});
}

function overlay(page,params){
  $('#overlay_loader').load('wp-content/themes/misterface/_inc/inc.'+page+'.php?p='+page+'&'+params, function() {
   $("#overlay").fadeToggle();
  });
	
}

function overlay_close(){
  try{
    stopVideo();
	$("#jquery_jplayer_1").jPlayer("stop");
  }catch(err){
  }
  $("#overlay").animate({width: "hide"}, 800, "easeInQuad", function(){}); 
}

 
 
 
