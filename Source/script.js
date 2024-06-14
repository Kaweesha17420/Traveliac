const wrapper = document.querySelector('.wrapper');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnpopup = document.querySelector('.btnLogin-popup');
const btnpopup2 = document.querySelector('.btnSignUp-popup');
const iconClose= document.querySelector('.icon-close');
const log=document.querySelector('.btnLogin-popup');




registerlink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
})

loginlink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
})
btnpopup.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
    
})
btnpopup2.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
    
})
iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
})


/*log.addEventListener('click', ()=> {
    log.style.backgroundColor = '#2157f8';
})*/

function showPopup() {
    document.getElementById("wrapper").style.display = "block";
    
}

function hidePopup() {
    document.getElementById("wrapper").style.display = "none";

}

/* FAQ section use this js */

let answer=document.querySelectorAll(".Faq");
answer.forEach((event)=>{
    event.addEventListener('click',()=>{
        if(event.classList.contains("active")){
            event.classList.remove("active");
        }
        else{
            event.classList.add("active");
        }
    })
})

