// displays a  dialog popup upon clicking on the social media account's picture
// to confirm resetting the said  account's settings
// the popup is hidden upon clicking on the cancellation button ("no")

let linkPicture = document.querySelector('#linkedin-pfp');
let linkDialog = document.querySelector('#link'); // LinkedIn reset  confirmation dialog
let fbPicture = document.querySelector('#facebook-pfp');
let fbDialog = document.querySelector('#fb');// Facebook reset  confirmation dialog
let fbCancelButton = document.querySelector('#fb-button');
let twitterCancelButton = document.querySelector('#tw-button');
let twitterPicture = document.querySelector('#twitter-pfp');
let twDialog = document.querySelector('#tw'); // Twitter reset confirmation dialog
let linkedinCancelButton = document.querySelector('#link-button');
if (fbPicture) {
    fbPicture.addEventListener('click', () => {
        fbDialog.style.display = "block"
        if (twDialog !== null) twDialog.style.display = "none"
        if (linkDialog !== null) linkDialog.style.display = "none"

    })
    fbCancelButton.addEventListener('click', () => {
        fbDialog.style.display = "none";
    })
}

if (linkPicture) {
    linkPicture.addEventListener('click', () => {
        linkDialog.style.display = "block"
        if (twDialog !== null) twDialog.style.display = "none";
        if (fbDialog !== null) fbDialog.style.display = "none";
    })
    linkedinCancelButton.addEventListener('click', () => {
        linkDialog.style.display = "none";
    })
}
if (twitterPicture)
    twitterPicture.addEventListener('click', () => {
        twDialog.style.display = "block"
        if (fbDialog !== null) fbDialog.style.display = "none"
        if (linkDialog !== null) linkDialog.style.display = "none"
    })
twitterCancelButton.addEventListener('click', () => {
    twDialog.style.display = "none";
})
