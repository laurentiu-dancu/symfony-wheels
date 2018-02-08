import 'jquery';
import 'bootstrap';

// create the BLOG global letiable if not existing already
let BLOG = BLOG || {};

// add a function to the BLOG global
BLOG.registerDeleteConfirmation = function() {
    let deleteBtn = $('.delete-btn');
    // make sure we have delete buttons on the page
    if (deleteBtn.length == 0) {
        return;
    }

    // register an event listener on the delete button click
    deleteBtn.on('click', function(event) {
        // generate a confirm javascript alert
        let isConfirmed = confirm('Are you sure you want to exist?');
        /* of the response is false, prevent the clicking flow to continue,
         in this case the form submitting */
        if (!isConfirmed) {
            event.preventDefault();
        }
    });
};

BLOG.handleCommentSubmit = function() {
    let $replyButtons = $('.reply-btn');
    if ($replyButtons.length == 0) {
        return;
    }

    $replyButtons.on('click', function(event) {
        // trigger modal
        $('#myModal').modal({});
        // get the pressed button element from the event
        let $btn = $(event.currentTarget);
        // find comment main block, which hold's the id of the comment the user wants to reply
        let $commentRoot = $btn.parents('.comment-details');
        // if there is no such a parent, we're trying to reply directly to the article
        let commentIdToReply = $commentRoot.length > 0 ? $commentRoot.data('id') : null;

        // update the parent Id hidden input's value
        $('#comment_parentId').val(commentIdToReply);
    });
};


let interval = 120;
let letiation = 1;

BLOG.colorShift = function() {
    let background = document.getElementById("background-image");
    let logo = document.getElementById('logo-image');
    let date = new Date();
    let time = date.getTime();

    let seed = time / interval % 360;
    doShiftColor(background, seed);
    doShiftColor(logo, seed);
};

function doShiftColor(element, degree) {
    if (degree > 360) {
        degree -= 360;
    }
    element.style.filter = 'hue-rotate(' + degree + 'deg)';
    setTimeout(function () {
        doShiftColor(element, degree + letiation)
    }, interval);
}

function floatAround() {
    let background = document.getElementById("background-image");
    let main = document.getElementById('main-container');
    let date = new Date();
    let time = date.getTime();
    let seed = time / interval % 360;

    doFloatAround(background, seed);
}

function doFloatAround(element, seed) {

    let x = Math.sin(seed) * 1.6;
    element.style.transform = 'skewY('+ x +'deg) translateY(-100px)';
    console.log(element);

    setTimeout(function () {
        doFloatAround(element, seed + interval / 5000)
    }, 20);
}

function initApp() {
    BLOG.registerDeleteConfirmation();
    BLOG.handleCommentSubmit();
    // BLOG.colorShift();
    // floatAround();
}

document.onreadystatechange = function () {
    if (document.readyState === "interactive") {
        initApp();
    }
};
