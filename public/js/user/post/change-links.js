Fancybox.bind()

const modalLinkElement = document.getElementById('modalLink')
const modalLinkData = document.getElementById('modalLink_data')
const modalLink = new bootstrap.Modal(modalLinkElement)
const buttonModal = document.getElementById('modalLinkButtonOpen')

function changeLinks() {
    document.querySelectorAll('#postMain a').forEach(link => {
        let tempLink = link.href
        link.href = '#'
        link.onclick = () => {
            modalLink.show()
            modalLinkData.innerHTML = `"${tempLink}"`
            buttonModal.onclick = () => {
                window.open(tempLink, '_blank')
            }
        }
    })
}

changeLinks()
