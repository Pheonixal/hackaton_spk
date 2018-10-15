$('select').on('change', function() {
  window.location.href = $(this).data('href');
});