$('.statuschange').on('change', function() {
	var val = $(this).find('option:selected').data('href');
  	window.location.href = val;
});