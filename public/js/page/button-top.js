const buttonTop = document.getElementById('button-top')

function buttonTopClass(status) {
    return status ? 'button-top-active' : 'button-top-disabled'
}

window.addEventListener('scroll', function () {
    buttonTop.classList.add(buttonTopClass(window.pageYOffset > 250))
    buttonTop.classList.remove(buttonTopClass(window.pageYOffset <= 250))
})
