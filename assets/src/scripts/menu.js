var form = function($) {
	$document.ready(function(){
		$('.btn-toggle-menu').click(function(event){
			event.preventDefault();

			var $el = $(this),
				$nav = $('nav');

			if ($el.hasClass('active')) {

				$el.removeClass('active');
				$nav.slideUp();
			} else {
				$el.addClass('active');
				$nav.slideDown();
			}
		})
	})
}(jQuery);