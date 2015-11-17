$( document ).ready(function() {
    $('.calendar-professor').fullCalendar({
        lang: 'pt-br',
        dayClick: function(date, jsEvent, view) {
        	$('.fc-day').removeClass('data-selecionada');
	        $(this).addClass('data-selecionada');
	    }
    });
    $('.calendar-responsavel').fullCalendar({
        lang: 'pt-br',
    });
});	