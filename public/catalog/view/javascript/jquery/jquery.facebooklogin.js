// added in version 1.2 -> "stay on same page"
var  facebook_login_stay_here = false;

$(document).ready(function() { 
    $('.ocx-facebook-login-trigger').live('click', function() {	
		
		if ($(this).hasClass("ocx-stay-here")) {
			facebook_login_stay_here = true;
		} else {
			facebook_login_stay_here = false;  // to avoid case when value is set from previous call
		}
		
		FB.getLoginStatus( function(response){
			if (response.status !== 'connected') {
				FB.login(function(response) {
					if (response.authResponse) {
						$('.ocx-facebook-login-trigger').trigger('click');
					}	
				}, { scope: 'email'});
			
			} else {  // LOGGED ON FACEBOOK
				
				FB.api('/me', function(response) {
					
					$.ajax({
						type: 'POST',
						url: 'index.php?route=module/facebook_login/checkuser',
						data: response,
						dataType: 'json',
						beforeSend: function () {
							$('.facebooklogin-modal').remove();
							
							$('body').prepend('<div class="facebooklogin-modal loading-background"><a class="close-facebooklogin-modal">&#215;</a><div class="facebooklogin-modal-content"></div></div>');
							$('.facebooklogin-modal').facebooklogin({
								animation: 'fadeAndPop',
								animationspeed: 300,
								closeonbackgroundclick: false
							});
						},
						success: function(json) {
							if (json['redirect']) {
								if (facebook_login_stay_here) {
									location.reload();
								} else {
									location = json['redirect'];
								}	
							}
							
							if (json['output']) {
								$('.facebooklogin-modal').removeClass('loading-background');
								$('.facebooklogin-modal-content').html(json['output']);
							}
						}
					});
				});
			}
		});
    });
});

/* Facebook login popup start func */

(function($) {
	$('a[data-facebooklogin-id]').live('click', function(e) {
		e.preventDefault();
		var modalLocation = $(this).attr('data-facebooklogin-id');
		$('#'+modalLocation).facebooklogin($(this).data());
	});

/*---------------------------
 Extend and Execute
----------------------------*/

    $.fn.facebooklogin = function(options) {
        
        
        var defaults = {  
	    	animation: 'fadeAndPop', //fade, fadeAndPop, none
		    animationspeed: 300, //how fast animtions are
		    closeonbackgroundclick: true, //if you click background will modal close?
		    dismissmodalclass: 'close-facebooklogin-modal' //the class of a button or element that will close an open modal
    	}; 
    	
        //Extend dem' options
        var options = $.extend({}, defaults, options); 
	
        return this.each(function() {
        
/*---------------------------
 Global Variables
----------------------------*/
        	var modal = $(this),
        		topMeasure  = parseInt(modal.css('top')),
				topOffset = modal.height() + topMeasure,
          		locked = false,
				modalBG = $('.facebooklogin-modal-bg');

/*---------------------------
 Create Modal BG
----------------------------*/
			if(modalBG.length == 0) {
				modalBG = $('<div class="facebooklogin-modal-bg" />').insertAfter(modal);
			}		    
     
/*---------------------------
 Open & Close Animations
----------------------------*/
			//Entrance Animations
			modal.bind('facebooklogin:open', function () {
			  modalBG.unbind('click.modalEvent');
				$('.' + options.dismissmodalclass).unbind('click.modalEvent');
				if(!locked) {
					lockModal();
					if(options.animation == "fadeAndPop") {
						modal.css({'top': $(document).scrollTop()-topOffset, 'opacity' : 0, 'visibility' : 'visible', 'display' : 'block'});
						modalBG.fadeIn(options.animationspeed/2);
						modal.delay(options.animationspeed/2).animate({
							"top": $(document).scrollTop()+topMeasure + 'px',
							"opacity" : 1
						}, options.animationspeed,unlockModal());					
					}
					if(options.animation == "fade") {
						modal.css({'opacity' : 0, 'visibility' : 'visible', 'display' : 'block', 'top': $(document).scrollTop()+topMeasure});
						modalBG.fadeIn(options.animationspeed/2);
						modal.delay(options.animationspeed/2).animate({
							"opacity" : 1
						}, options.animationspeed,unlockModal());					
					} 
					if(options.animation == "none") {
						modal.css({'visibility' : 'visible', 'display' : 'block', 'top':$(document).scrollTop()+topMeasure});
						modalBG.css({"display":"block"});	
						unlockModal()				
					}
				}
				modal.unbind('facebooklogin:open');
			}); 	

			//Closing Animation
			modal.bind('facebooklogin:close', function () {
			  if(!locked) {
					lockModal();
					if(options.animation == "fadeAndPop") {
						modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
						modal.animate({
							"top":  $(document).scrollTop()-topOffset + 'px',
							"opacity" : 0
						}, options.animationspeed/2, function() {
							modal.css({'top':topMeasure, 'opacity' : 1, 'visibility' : 'hidden', 'display' : 'none'});
							unlockModal();
						});					
					}  	
					if(options.animation == "fade") {
						modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
						modal.animate({
							"opacity" : 0
						}, options.animationspeed, function() {
							modal.css({'opacity' : 1, 'visibility' : 'hidden', 'display' : 'none', 'top' : topMeasure});
							unlockModal();
						});					
					}  	
					if(options.animation == "none") {
						modal.css({'visibility' : 'hidden', 'display' : 'none', 'top' : topMeasure});
						modalBG.css({'display' : 'none'});	
					}		
				}
				modal.unbind('facebooklogin:close');
			});     
   	
/*---------------------------
 Open and add Closing Listeners
----------------------------*/
        	//Open Modal Immediately
    	modal.trigger('facebooklogin:open')
			
			//Close Modal Listeners
			var closeButton = $('.' + options.dismissmodalclass).bind('click.modalEvent', function () {
			  modal.trigger('facebooklogin:close')
			});
			
			if(options.closeonbackgroundclick) {
				modalBG.css({"cursor":"pointer"})
				modalBG.bind('click.modalEvent', function () {
				  modal.trigger('facebooklogin:close')
				});
			}
			$('body').keyup(function(e) {
        		if(e.which===27){ modal.trigger('facebooklogin:close'); } // 27 is the keycode for the Escape key
			});
			
			
/*---------------------------
 Animations Locks
----------------------------*/
			function unlockModal() { 
				locked = false;
			}
			function lockModal() {
				locked = true;
			}	
			
        });//each call
    }//orbit plugin call
})(jQuery);
        
