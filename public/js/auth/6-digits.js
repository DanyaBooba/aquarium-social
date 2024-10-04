const input = document.getElementById('6digits_input')
const digits = document.getElementById('6digits')
const buttonDigits = document.querySelector('form button[type="submit"]')

buttonDigits.setAttribute('disabled', '')

digits.addEventListener('change', event => {
    // event.detail.value
    input.setAttribute('value', event.detail.value)
    event.detail.value.length >= 6 ?
        buttonDigits.removeAttribute('disabled') :
        buttonDigits.setAttribute('disabled', '')
})
