const listRu = [
    'удобная',
    'современная',
    'адаптивная',
    'актуальная',
    'свободная'
]

const listEn = [
    'convenient',
    'modern',
    'adaptive',
    'topical',
    'free'
]

const textToChange = document.getElementById('js-change')
const locale = document.querySelector('html').lang.toLowerCase()
let startIndexList = -1

function random(min, max) {
    return Math.random() * (max - min) + min;
}

function textValue() {
    startIndexList += 1
    if (startIndexList >= listEn.length) startIndexList = 0

    switch (locale) {
        case 'ru':
            return listRu[startIndexList]
        default:
            return listEn[startIndexList]
    }
}

function delay(ms) {
    return new Promise((res) => setTimeout(res, ms))
}

const changeText = async () => {
    let d = random(50, 60)

    while (true) {
        await delay(3000)

        while (textToChange.textContent.length > 0) {
            let temp = textToChange.textContent
            textToChange.textContent = temp.substring(0, temp.length - 1)
            await delay(d)
        }

        let chooseText = textValue()
        let num = 1

        while (textToChange.textContent != chooseText) {
            textToChange.textContent = chooseText.substring(0, num)
            num += 1
            await delay(d)
        }
    }
};

function startChangeText() {
    if (!textToChange) return

    textToChange.textContent = textValue()
    changeText()
}

startChangeText()
