$(document).ready(function() {
    if (location.hash !== '') $('a[href="' + location.hash + '"]').tab('show');
    return $('a[data-toggle="tab"]').on('shown', function(e) {
      return location.hash = $(e.target).attr('href').substr(1);
    });
    $('#dp').datepicker({
	format: 'dd/mm/yyyy'
	});
	$('#tounament-tabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});
});