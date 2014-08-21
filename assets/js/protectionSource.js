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

addEvent(document.getElementById('pageWrap'), 'click', function () {
    if (snapper.state().state == "left") {
        snapper.close();
    } else {;
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
    if (snapper.state().state == "right") {
        snapper.close();
    } else {;
    }
});



