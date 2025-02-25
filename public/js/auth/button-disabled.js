const inputsFromButtonDisabled = document.querySelectorAll('#signin-email form input')
const buttonToDisabled = document.querySelector('#signin-email form button:not(.button-submit-code)[type="submit"]')

function checkFormInput() {
    let status = true
    inputsFromButtonDisabled.forEach(input => {
        if (['email', 'password', 'text'].includes(input.type) && input.value.length <= 2) status = false
        if (input.type === 'checkbox' && input.value === 'privacy' && !input.checked) status =  false
    })

    return status
}

function checkOnInput() {
    if (!buttonToDisabled) return

    checkFormInput()
            ? buttonToDisabled.removeAttribute('disabled')
            : buttonToDisabled.setAttribute('disabled', true)
}

checkOnInput()
