
const search = document.querySelector('.header-search-input');
var select = document.querySelector('.header-search-select');

const events = document.querySelector('.main-grid');
const eventNames = document.querySelectorAll('.event-title');
const eventStartDate = document.querySelectorAll('.event-start-date');

var close_button;
var open_button;

$(document).ready(function () {

    function callback() {
        resizeAllGridItems();

        setTimeout(function() {
            resizeAllGridItems();
        }, 1000);
        open_button = document.querySelector('.add-event');
        close_button = document.querySelector('.event-form-close');
        renderForm();
    }

    $(".main-grid").load("php/renderEvents.php?month=", callback);

    $(".header-search-select").change(function(e) {
        e.preventDefault();
        $(".main-grid").load("php/renderEvents.php?month=" + select.value, callback);
    });

    $(".header-controls-link").click(function () {
        $(".main-grid").load("php/about.php");
    });

    $(".show-all").click(function () {
        $(".main-grid").load("php/renderEvents.php", callback);
    });

    Array.from(select.children).forEach(option => {
        if (option.value == (new Date()).getMonth() + 1) {
        option.setAttribute("selected", "true");
    }
})

    $(".header-search-input").change(function(e) {
        e.preventDefault();
        if (search.value != "") {
            var regexp = / /g;
            var dataToSend = search.value.replace(regexp, "+").toLowerCase();
            $(".main-grid").load("php/searchEvent.php?title=" + dataToSend, callback);
        } else {
            $(".main-grid").load("php/renderEvents.php?month=" + select.value, callback);
        }

    });



});

