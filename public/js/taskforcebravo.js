$(function(){
	$(".open").pageslide();
	
	$(".container").click(function() {
	    $("#pageslide").pageslide();
	});
});

$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});

$(function () {
	$("[data-toggle='dropdown']").dropdown();
})

// AUTOMATIC MODAL ON PAGE LOAD [NEED COOKIES TO PROPERLY ENABLE] 
// http://stackoverflow.com/questions/13352658/reveal-modal-with-cookie-to-display-only-once
// https://github.com/carhartl/jquery-cookie
// $(window).load(function(){
// 	$('#requestModal').modal('show');
// });