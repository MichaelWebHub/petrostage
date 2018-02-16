function renderForm() {
    close_button.addEventListener('click', closeForm);
    open_button.addEventListener('click', openForm);

    function closeForm() {
        event_form_div.classList.add('hidden');
    }

    function openForm() {
        event_form_div.classList.remove('hidden');

        if ($('.event-form').height() < $(".container").height()) {
            $('.event-form').css('height', $(".container").height());
        }

    }
}
// Form validation
var inputs_count = 0;

inputs.forEach(function(input, i) {
    inputs_count = i;
    if (input.tagName == 'SELECT') {
        input.addEventListener('change', validate);
    } else {
        input.addEventListener('input', validate);
    }

});

links.forEach(function(link) {
    link.addEventListener('change', checkProtocol);

});

function checkProtocol() {
    if (this.value.indexOf('http') === -1) {
        this.value = 'http://' + this.value;
    }
}

function validate() {
    if (this.classList.contains('event-link-input') == false) {
        if (this.value != "") {
            if (this.tagName == 'TEXTAREA') {
                if (this.value.length >= 100) {
                    this.setAttribute('data-validate', 'isset');
                } else {
                    this.removeAttribute('data-validate');
                }
            } else {
                this.setAttribute('data-validate', 'isset');
            }

            if (this.classList.contains('event-email-input')) {
                if (this.value.indexOf('@') != -1 && this.value.indexOf('.') != -1) {
                    this.setAttribute('data-validate', 'isset');
                    this.classList.remove('invalid-input');
                } else {
                    this.removeAttribute('data-validate');
                    this.classList.add('invalid-input');
                }
            } else {
                this.setAttribute('data-validate', 'isset');
            }

        } else {
            this.removeAttribute('data-validate');
        }
    }

    let valid_inputs = document.querySelectorAll('[data-validate=isset]');

    if (valid_inputs.length == inputs_count - 3) {
        submit.classList.add('enabled');
        submit.disabled = false;
    } else {
        submit.classList.remove('enabled');
        submit.disabled = true;
    }
}

const textarea = document.querySelector('.event-description-input');
const validate_textarea = document.querySelector('.validate-textarea');

textarea.addEventListener('input', validateTextarea);

function validateTextarea() {
    validate_textarea.innerText = textarea.value.length + "/400";
    if (textarea.value.length < 100 || textarea.value.length == 400) {
        validate_textarea.classList.add('textarea_full');
    } else {
        validate_textarea.classList.remove('textarea_full');
    }
}

const start_date = document.querySelector('.event-date-start');
const end_date = document.querySelector('.event-date-end');

end_date.addEventListener('change', checkDate);
start_date.addEventListener('change', checkDate);

function checkDate() {
    let start = new Date(start_date.value);
    let end = new Date(end_date.value);

    if (end.getTime() < start.getTime()) {
        end_date.value = start_date.value;
    }
}