(function($){

	$(document).live('acf/setup_fields', function(e, postbox){

		var oembed_timeout;

		function get_oembed($context, e) {
			var oembed_url = $context.find('input.oembed').val(),
				$embed_wrap = $context.find('.embed_wrap');

			if (oembed_url.length < 6) {
				$embed_wrap.html('');
				return;
			}

			$embed_wrap.html('').addClass('loading');

			$.ajax({
				type : 'POST',
				dataType : 'json',
				url : window.ajaxurl,
				data : {
					action: 'acf_oembed_handler',
					oembed_url: oembed_url,
					width: $embed_wrap.attr('data-preview-width'),
					height: $embed_wrap.attr('data-preview-height')
				},
				success: function(response) {
					$embed_wrap.html(response.embed).removeClass('loading');
				}
			});
		}

		$(postbox).find('.oembed').each(function(){
			$(this).bind('keyup paste', function(e){
				var $input = $(this);
				if (oembed_timeout) {
					clearTimeout(oembed_timeout);
				}

				oembed_timeout = setTimeout(function(){
					var $context = $input.parents('.acf-oembed-field');
					get_oembed($context, e);
				}, 500);
			});

		});

	});

})(jQuery);
