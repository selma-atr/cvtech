$( document ).ready(function(){
	
	
	
	$(".toggle-btn").on("click",function(){
		
		var opt = $(this).find(".sb");
		
		if( opt.is(":visible") ) opt.hide();
		else opt.show();
	});
});

function redirect(url){
		 window.location.replace(url);
}