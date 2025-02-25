const feedButtonAll = document.getElementById('feedAll')
const feedButtonSubs = document.getElementById('feedSubs')

function feedActive(status) {
    switch (status) {
        case 'all':
            feedButtonAll.classList.add('active')
            feedButtonSubs.classList.remove('active')
            break
        case 'subs':
            feedButtonSubs.classList.add('active')
            feedButtonAll.classList.remove('active')
            break
    }
}

feedActive('all')
