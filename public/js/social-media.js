let linkPicture=document.querySelector('#linkedin-pfp');
let link=document.querySelector('#link');
let fbPicture=document.querySelector('#facebook-pfp');
let fb=document.querySelector('#fb');
let fbButton=document.querySelector('#fb-button');
let twitterButton=document.querySelector('#tw-button');
let twitterPicture=document.querySelector('#twitter-pfp');
let tw=document.querySelector('#tw');
let linkedinButton=document.querySelector('#link-button');
if(fbPicture){
    fbPicture.addEventListener('click', () => {
        fb.style.display = "block"
        if (tw !== null) tw.style.display = "none"
        if (link !== null) link.style.display = "none"

    })
    fbButton.addEventListener('click', () => {
        fb.style.display = "none";
    })
}

if(linkPicture){
    linkPicture.addEventListener('click',()=>{
        link.style.display="block"
        if(tw!==null)tw.style.display="none";
        if(fb!==null)fb.style.display="none";
    })
    linkedinButton.addEventListener('click',()=>{
        link.style.display="none";
    })
}
if(twitterPicture)
twitterPicture.addEventListener('click',()=>{
    tw.style.display="block"
    if(fb!==null) fb.style.display="none"
    if(link!==null)link.style.display="none"
})
twitterButton.addEventListener('click',()=>{
    tw.style.display="none";
})
