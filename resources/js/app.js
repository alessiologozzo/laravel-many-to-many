import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

import * as Func from "./functions.js";

window.Func = Func;

let app = document.getElementById("app");
app.addEventListener("click", Func.removeMenusHandler);
app.addEventListener("click", Func.removeConfirmElementHandler);

window.Var = {
    resized: false,
    originalValues: [10],
    projectIndex: null
}

// window.alVar = {
//     originalValues: [10]
// }

// window.alFunc = {

//     showMenu(e){
//         e.stopPropagation();

//         let menu = e.currentTarget.querySelector(".al-menu");
//         let menuData = e.currentTarget.closest(".al-menu-data");
//         let height = menuData.offsetHeight;
    
//         menu.classList.toggle("al-menu-visible");
//         menu.style.top = `${height}px`;
//     },
    
//     removeMenusHandler(e){
//         let menus = document.getElementsByClassName("al-menu");

//         for(let i = 0; i < menus.length; i++)
//                 menus[i].classList.remove("al-menu-visible");
//     },

//     edit($event, index){
//         let parent = $event.currentTarget.closest(".justify-content-between");

//         let firstChild = parent.querySelector("div:nth-child(1)"); 
//         let secondChild = parent.querySelector("div:nth-child(2)");
//         let inputBox = secondChild.querySelector("input[type='text']");
//         let inputFile = secondChild.querySelector("input[type='file']");
//         let inputEmail = secondChild.querySelector("input[type='email']");
//         let inputPassword = secondChild.querySelector("input[type='password']");

//         if(inputBox != null){
//             if(firstChild.classList.contains("d-none")){
//                 inputBox.value = window.alVar.originalValues[index];
//                 firstChild.classList.remove("d-none");
//                 secondChild.classList.add("d-none");
//             }
//             else{ //Caso edit
//                 firstChild.classList.add("d-none");
//                 secondChild.classList.remove("d-none");
//                 inputBox.focus();
//                 inputBox.select();
//                 window.alVar.originalValues[index] = inputBox.value;
//             }
//         }
//         else if(inputFile != null){
//             if(firstChild.classList.contains("d-none")){
//                 inputFile.value = window.alVar.originalValueFile;
//                 firstChild.classList.remove("d-none");
//                 secondChild.classList.add("d-none");
//             }
//             else{ //Caso edit
//                 firstChild.classList.add("d-none");
//                 secondChild.classList.remove("d-none");
//                 inputFile.focus();
//                 inputFile.select();
//                 window.alVar.originalValueFile = inputFile.value;
//             }
//         }
//         else if(inputEmail != null){
//             if(firstChild.classList.contains("d-none")){
//                 inputEmail.value = window.alVar.originalValues[index];
//                 firstChild.classList.remove("d-none");
//                 secondChild.classList.add("d-none");
//             }
//             else{ //Caso edit
//                 firstChild.classList.add("d-none");
//                 secondChild.classList.remove("d-none");
//                 inputEmail.focus();
//                 inputEmail.select();
//                 window.alVar.originalValues[index] = inputEmail.value;
//             }
//         }
//         else if(inputPassword != null){
//             if(firstChild.classList.contains("d-none")){
//                 inputPassword.value = window.alVar.originalValues[index];
//                 firstChild.classList.remove("d-none");
//                 secondChild.classList.add("d-none");
//             }
//             else{ //Caso edit
//                 firstChild.classList.add("d-none");
//                 secondChild.classList.remove("d-none");
//                 inputPassword.focus();
//                 inputPassword.select();
//                 window.alVar.originalValues[index] = inputPassword.value;
//                 inputPassword.value = "";
//             }
//         }
        
//     },

//     askConfirm(e){
//         e.stopPropagation();
//         let confirmElement = document.getElementsByClassName("al-confirm")[0];
//         confirmElement.classList.remove("d-none");
//     },

//     removeConfirmElementHandler(e){
//         let needToRemove = false;
//         let confirmElement = document.getElementsByClassName("al-confirm")[0];

//         if(confirmElement != null){
//             if(!confirmElement.classList.contains("d-none")){
//                 let confirmElementLeft = confirmElement.getBoundingClientRect().x;
//                 let confirmElementRight = confirmElementLeft + confirmElement.getBoundingClientRect().width;
//                 let confirmElementTop = confirmElement.getBoundingClientRect().y;
//                 let confirmElementBottom = confirmElementTop + confirmElement.getBoundingClientRect().height;
            
//                 if((e.clientX < confirmElementLeft || e.clientX > confirmElementRight) || (e.clientY < confirmElementTop || e.clientY > confirmElementBottom))
//                 needToRemove = true;
//             }
//         }

//         if(needToRemove)
//             confirmElement.classList.add("d-none");
//     },

//     removeConfirmElement(){
//         let confirmElement = document.getElementsByClassName("al-confirm")[0];
//         confirmElement.classList.add("d-none");
//     },

//     submitForm(e){
//         let parent = e.currentTarget.closest(".al-confirm");
//         let form = parent.querySelector("form");

//         form.submit();
//     }
// };
