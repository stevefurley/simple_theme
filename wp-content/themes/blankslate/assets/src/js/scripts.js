// Default JavaScript Functions and Initiations
$(document).ready(function() {

  $('.slider-container').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    arrows: true,
  });


  // Mobile menu button
  $('#mobile-menu-button').on('click', function(){
    event.stopPropagation();
    if(!$(this).hasClass('open')) {
      $('#mobile-menu-button, .mobile-menu, overlay').addClass('open');
    } else {
      $('#mobile-menu-button, .mobile-menu, overlay').removeClass('open');
    }
  });



  $('.mobile-menu, .hamburger-menu').on('click',  function(event){
    event.stopPropagation();
  });

  $('html').on('click', function() {
    if($('.mobile-menu').hasClass('open')) {
      $('.mobile-menu, #mobile-menu-button, overlay').removeClass('open');
    }
  });

  var $i = 1;
	$('.load-more').live('click', function(e) {
		e.preventDefault();
		var $maxPages = $('.max-pages').text();

		$i++;
		var link = jQuery(this).attr('href');
		var segements = link.split("/");
		segements[segements.length - 2] = "" + $i;
		var newurl = segements.join("/");

		$.ajax({
			url: newurl,
			success: function(data) {
				data=$(data).find('.more-content .results .col-12');
				data.each(function(){
					$(this).addClass('hidden');
				});
				$('.more-content .results').append(data);
				$('.more-content .results .hidden').each(function(){
					$(this).fadeIn();
				});
			}

		});

		if($i >= $maxPages) {
			$('.load-more').fadeOut('slow');
		}
	});


}); // end document ready
