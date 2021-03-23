(function ($) {
	$( '#dl-menu' ).dlmenu();
	$('ul.dl-menu li a').smoothScroll();
	$('.smooth').smoothScroll();
	
	//animation
	new WOW().init();

})(jQuery);

function validateForm(formID){
			errors='no';
			$('#'+formID).find('.form-control').each(function(){
				attr = $(this).attr('required');
				if($(this).is('select')===true){
					value = $(this).find("option:selected").val().trim();
					if (typeof attr !== typeof undefined && attr !== false) {
						if(value==''){
							errors='si';
							if($(this).hasClass('select-chosen')){
								$(this).next(".chosen-container").find('.chosen-single').addClass('has-error');
							}else{
								$(this).addClass('has-error');
							}
						}else{
							if($(this).hasClass('select-chosen')){
								$(this).next(".chosen-container").find('.chosen-single').removeClass('has-error');
							}else{
								$(this).removeClass('has-error');
							}
						}	
					}
				}else{
					value = $(this).val().trim();
					if (typeof attr !== typeof undefined && attr !== false) {
						if(value==''){
							errors='si';
							$(this).addClass('has-error');
						}else{
							$(this).removeClass('has-error');
						}	
					}
				}
			});
			
			if(errors=='no'){
				$('#'+formID).submit();
			}else{
				toastr.error('Uno o più campi devono ancora essere compilati');
			}
		}