(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(document).on('change', '#class_name', function(){
		var data = {
			action : 'tru_class_filter', 
			cat_id : $(this).val()
		}
		$.ajax({
			type: 'post', 
			url: tru_ajax_object.ajaxurl,
			data: data,
			beforeSend: function(){
				$('.students-list').html('Loading...');
			}, 
			success: function(res){
				if(res){
					$('.students-list').html(res);
				}
			}
		});
	});

})( jQuery );
