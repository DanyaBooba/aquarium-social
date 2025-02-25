const inputChoose = document.querySelector('.import-post__link input')
let platform = 'telegram'

function chooseChange(current) {
    switch (current) {
        case 'telegram':
            document.getElementById('choose-telegram').classList.add('active')
            document.getElementById('choose-vk').classList.remove('active')
            inputChoose.placeholder = 'https://t.me/...'
            platform = 'telegram'
            break
        case 'vk':
            document.getElementById('choose-vk').classList.add('active')
            document.getElementById('choose-telegram').classList.remove('active')
            inputChoose.placeholder = 'https://vk.com/wall-...'
            platform = 'vk'
            break
    }
}

function sendLink() {
    const url = document.getElementById('link')?.value
    window.open(`/post/import/${platform}/?url=${encodeURIComponent(url)}`, '_self')
}

chooseChange('telegram')
