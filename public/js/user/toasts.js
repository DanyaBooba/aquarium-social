function showToast() {
    const toastElList = [].slice.call(document.querySelectorAll('.toast'))
    const toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.show())
}

function hideToasts() {
    const toastElList = [].slice.call(document.querySelectorAll('.toast'))
    const toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.hide())
}

function showToastId(id) {
    hideToasts()
    const toastElement = document.querySelector(`.toast#${id}`)
    const toast = new bootstrap.Toast(toastElement)
    toast.show()
}

function shareLink(link) {
    showToastId('userLinkCopy')
    buttonCopyURL(link)
}
