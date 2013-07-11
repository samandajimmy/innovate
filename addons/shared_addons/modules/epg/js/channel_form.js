(function ($) {
	$(function () {
		// editor switcher
		$('select[name^=editor_type]').live('change', function () {
			
			var chunk = $(this).closest('li.editor');
			var textarea = $('textarea', chunk);

			// Destroy existing WYSIWYG instance
			if (textarea.hasClass('wysiwyg-simple') || textarea.hasClass('wysiwyg-advanced')) {
				textarea.removeClass('wysiwyg-simple');
				textarea.removeClass('wysiwyg-advanced');

				var instance = CKEDITOR.instances[textarea.attr('id')];
				instance && instance.destroy();
			}
			// Set up the new instance
			textarea.addClass(this.value);
			pyro.init_ckeditor();
		});		
	})
})(jQuery);