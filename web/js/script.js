/** If jQuery was cool, node would use it, amirite? **/

// create the BLOG global variable if not existing already
var BLOG = BLOG || {};

// add a function to the BLOG global
BLOG.registerDeleteConfirmation = function() {
    var deleteBtn = $('.delete-btn');
    // make sure we have delete buttons on the page
    if (deleteBtn.length == 0) {
        return;
    }

    // register an event listener on the delete button click
    deleteBtn.on('click', function(event) {
        // generate a confirm javascript alert
        var isConfirmed = confirm('Are you sure you want to exist?');
        /* of the response is false, prevent the clicking flow to continue,
         in this case the form submitting */
        if (!isConfirmed) {
            event.preventDefault();
        }
    });
};


var interval = 120;
var variation = 1;

BLOG.colorShift = function() {
    var background = document.getElementById("background-image");
    var logo = document.getElementById('logo-image');
    var date = new Date();
    var time = date.getTime();

    var seed = time / interval % 360;
    doShiftColor(background, seed);
    doShiftColor(logo, seed);
};

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
    var background = document.getElementById("background-image");
    var main = document.getElementById('main-container');
    var date = new Date();
    var time = date.getTime();
    var seed = time / interval % 360;

    doFloatAround(background, seed);
}

function doFloatAround(element, seed) {

    var x = Math.sin(seed) * 1.6;
    element.style.transform = 'skewY('+ x +'deg) translateY(-100px)';
    console.log(element);

    setTimeout(function () {
        doFloatAround(element, seed + interval / 5000)
    }, 20);
}

function initApp() {
    BLOG.registerDeleteConfirmation();
    BLOG.colorShift();
    floatAround();
}

document.onreadystatechange = function () {
    if (document.readyState === "interactive") {
        initApp();
    }
};
