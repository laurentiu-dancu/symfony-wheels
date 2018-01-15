/** If jQuery was cool, node would use it, amirite? **/
var interval = 120;
var variation = 1;

function colorShift() {
    var background = document.getElementById("background-image");
    var logo = document.getElementById('logo-image');
    var date = new Date();
    var time = date.getTime();

    console.log(date.getTime());
    var seed = time / interval % 360;
    doShiftColor(background, seed);
    doShiftColor(logo, seed);
}

function doShiftColor(element, degree) {
    if (degree > 360) {
        degree -= 360;
    }
     element.style.filter = 'hue-rotate(' + degree + 'deg)';
    setTimeout(function () {
        doShiftColor(element, degree + variation)
    }, interval);
}

function floatAround() {
    var main = document.getElementById('main-container');

    doFloatAround(main, 0);
}

function doFloatAround(element, seed) {
    var x = Math.sin(seed);
    var y = Math.cos(seed);

    element.style.transform = 'translate(' + x + 'px, ' + y + 'px)';

    setTimeout(function () {
        doFloatAround(element, seed + 0.6)
    }, 20);
}

function initApp() {
    colorShift();
    // floatAround();
}

document.onreadystatechange = function () {
    if (document.readyState === "interactive") {
        initApp();
    }
};
