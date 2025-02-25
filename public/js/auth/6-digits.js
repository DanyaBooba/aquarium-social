function sixDigits() {
    const input = document.getElementById('6digits_input')
    const digits = document.getElementById('6digits')
    const buttonDigits = document.querySelector('form button[type="submit"]')

    if(!buttonDigits || !digits || !input) return

    buttonDigits.setAttribute('disabled', '')

    digits.addEventListener('change', event => {
        input.setAttribute('value', event.detail.value)
        event.detail.value.length >= 6 ?
            buttonDigits.removeAttribute('disabled') :
            buttonDigits.setAttribute('disabled', '')
    })
}

sixDigits()
