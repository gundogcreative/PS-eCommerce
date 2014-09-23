//SNAP.JS 

var snapper = new Snap({
    element: document.getElementById('pageWrap')
});

var addEvent = function addEvent(element, eventName, func) {
    if (element.addEventListener) {
        return element.addEventListener(eventName, func, false);
    } else if (element.attachEvent) {
        return element.attachEvent("on" + eventName, func);
    }
};

addEvent(document.getElementById('open-left'), 'click', function () {
    if (snapper.state().state == "left") {
       snapper.close();
    } else {
        snapper.open('left');
    }
});

addEvent(document.getElementById('open-right'), 'click', function () {
    if (snapper.state().state == "right") {
        snapper.close();
    } else {
       snapper.open('right');
    }
});

addEvent(document.getElementById('pageWrap'), 'click', function () {
    if (snapper.state().state == "left") {
        snapper.close();
    } else {;
    }
});

addEvent(document.getElementById('pageWrap'), 'click', function () {
    if (snapper.state().state == "right") {
        snapper.close();
    } else {;
    }
});





//BOOTSTRAP TOOLTIPS

$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});





//FASTCLICK [REMOVE DELAY ON MOBILE CLICKS]

$(function() {
    FastClick.attach(document.body);
});





//BOOTSWITCH 

$("[name='download-version']").bootstrapSwitch();





//STICKY SYSTEM BUILD SUMMARY 

$("#pageWrap").scroll(function() {    
    var scroll = $("#pageWrap").scrollTop();
    if (scroll > 230) {
        $("#summary").addClass("sticky");
    }
    else {
        $("#summary").removeClass("sticky");
    }
});

$("#pageWrap").scroll(function() {    
    var scroll = $("#pageWrap").scrollTop();
    if (scroll > 230) {
        $("#requestSupport").addClass("sticky");
    }
    else {
        $("#requestSupport").removeClass("sticky");
    }
});





//CHANGE ICON ON CLICK

$(".caretDrop").click(function(){
  $(".caretIcon", this).toggleClass("fa-caret-up");
});











    
    
    
    
    
    