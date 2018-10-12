jQuery(document).ready(function(){
	"use strict";
 $('.company').click(function(event){
            event.stopPropagation();
        });
     $(window).click(function() {
        $('.company__list').addClass('hide');
   	 });
     $('.company').on('click',function(){
		$('.company__list').toggleClass('hide');
	});
});
