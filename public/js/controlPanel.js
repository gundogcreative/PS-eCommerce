
$( document ).ready(function() {
	displayMessages();	
});


function displayMessages() { 
	if($(".flashSession div").length > 0) { 
		$(".flashSession").css('display', 'block');

		if($(".flashSession").hasClass("successSession") == true) { 
			$('.flashSession').delay(2000).fadeOut('slow');
		}
	} else { 

		$(".flashSession").css('display', 'none');
	}

}