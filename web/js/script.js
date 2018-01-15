/** If jQuery was cool, node would use it, amirite? **/

function colorShift() {
    var background = document.getElementById("background-image");
    var logo = document.getElementById('logo-image');
    doShiftColor(background, 1);
    doShiftColor(logo, 1);
}

function doShiftColor(element, degree) {
    if (degree > 360) {
        degree -= 360;
    }
     element.style.filter = 'hue-rotate(' + degree + 'deg)';
    setTimeout(function () {
        doShiftColor(element, degree + 1)
    }, 120);
}

function initApp() {
    colorShift();
}

document.onreadystatechange = function () {
    if (document.readyState === "interactive") {
        initApp();
    }
};
