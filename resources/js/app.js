import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

window.alVar = {
    originalValues: [10],
    origialValueFile: null
}

window.alFunc = {

    showMenu(e){
        e.stopPropagation();

        let menu = e.currentTarget.querySelector(".al-menu");
        let menuData = e.currentTarget.closest(".al-menu-data");
        let height = menuData.offsetHeight;
    
        menu.classList.toggle("al-menu-visible");
        menu.style.top = `${height}px`;
    },
    
    removeMenusHandler(e){
        let menus = document.getElementsByClassName("al-menu");

        for(let i = 0; i < menus.length; i++)
                menus[i].classList.remove("al-menu-visible");
    },

    edit($event, index){
        let parent = $event.currentTarget.closest(".justify-content-between");

        let firstChild = parent.querySelector("div:nth-child(1)"); 
        let secondChild = parent.querySelector("div:nth-child(2)");
        let inputBox = secondChild.querySelector("input[type='text']");
        let inputFile = secondChild.querySelector("input[type='file']");

        if(inputBox != null){
            if(firstChild.classList.contains("d-none")){
                inputBox.value = window.alVar.originalValues[index];
                firstChild.classList.remove("d-none");
                secondChild.classList.add("d-none");
            }
            else{ //Caso edit
                firstChild.classList.add("d-none");
                secondChild.classList.remove("d-none");
                inputBox.focus();
                inputBox.select();
                window.alVar.originalValues[index] = inputBox.value;
            }
        }
        else{
            if(firstChild.classList.contains("d-none")){
                inputFile.value = window.alVar.originalValueFile;
                firstChild.classList.remove("d-none");
                secondChild.classList.add("d-none");
            }
            else{ //Caso edit
                firstChild.classList.add("d-none");
                secondChild.classList.remove("d-none");
                inputFile.focus();
                inputFile.select();
                window.alVar.originalValueFile = inputFile.value;
            }
        }
        
    }
};
