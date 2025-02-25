function CheckColorTheme() {
    const colorTheme = localStorage.getItem('color-theme')

    if(colorTheme === null) return

    const darkMedia = document.getElementById('stylesheetdark')
    const lightMedia = document.getElementById('stylesheetlight')

    if(colorTheme === 'dark') {
        lightMedia.media = "not all"
        darkMedia.media = "all"
    }
    else if(colorTheme === 'light') {
        lightMedia.media = "all"
        darkMedia.media = "not all"
    }
}

CheckColorTheme()
