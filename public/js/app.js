(function($){
	$('body').on('submit', 'form', function(event){
		var method = $(this).children(':hidden[name=_method]').val();
		if($.type(method) != 'undefined' && method == 'DELETE'){
			if(!confirm('Are you sure ?')){
				event.preventDefault();
			}
		}
	})
})(jQuery);