const submit = document.querySelector('.event-form-submit');
const event_form_div = document.querySelector('.event-form');
const inputs = document.querySelectorAll('.event-form-input');
const links = document.querySelectorAll('.event-link-input');

submit.addEventListener('click', sendData);


function sendData(e) {
    e.preventDefault();

    const form = document.querySelector('.event-form-form');
    const formData = new FormData(form);

    let dataToSend = {};

    for (const [k, v] of formData) {
        dataToSend[k] = v;
    }

    fetch('php/addevent.php', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dataToSend)
    })
        .then(response => {
        event_form_div.classList.add('hidden');
        response.json().then(data => {
            $(".main-grid").load("php/renderEvents.php?month=" + data['month'], resizeAllGridItems);
            select.value = data['month'];
            inputs.forEach(input => {
                input.value = "";
                input.removeAttribute('data-validate');
                submit.classList.remove('enabled');
                submit.disabled = true;
            });
    })
})
}

