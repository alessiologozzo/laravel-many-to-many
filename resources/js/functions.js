import { forEach } from "lodash";

export function showMenu(e) {
    e.stopPropagation();
    let menu = e.currentTarget.querySelector(".al-menu");
    let menuData = e.currentTarget.closest(".al-menu-data");
    let height = menuData.offsetHeight;

    menu.classList.toggle("al-menu-visible");
    menu.style.top = `${height}px`;
}

export function removeMenusHandler() {
    let menus = document.getElementsByClassName("al-menu");

    for (let i = 0; i < menus.length; i++)
        menus[i].classList.remove("al-menu-visible");
}

export function resizeSidebar() {
    let sidebar = document.getElementsByTagName("aside")[0];
    let sidebarResizer = document.getElementsByClassName("sidebar-resizer")[0];
    let sidebarResizerChevron = sidebarResizer.querySelector("i");
    let links = sidebar.querySelectorAll("a");

    window.Var.resized = !window.Var.resized;

    if (window.Var.resized) { //Ingrandisco la sidebar
        sidebar.classList.add("sidebar-resized");

        links.forEach(function (link) {
            let span = link.querySelector("span");
            span.classList.remove("d-none");

            sidebarResizerChevron.classList.remove("fa-solid", "fa-chevron-right");
            sidebarResizerChevron.classList.add("fa-solid", "fa-chevron-left");
        });
    }
    else { //Rimpicciolisco la sidebar
        sidebar.classList.remove("sidebar-resized");

        links.forEach(function (link) {
            let span = link.querySelector("span");
            span.classList.add("d-none");

            sidebarResizerChevron.classList.remove("fa-solid", "fa-chevron-left");
            sidebarResizerChevron.classList.add("fa-solid", "fa-chevron-right");
        });
    }
}

export function edit($event, index) {
    let parent = $event.currentTarget.closest(".justify-content-between");

    let firstChild = parent.querySelector("div:nth-child(1)");
    let secondChild = parent.querySelector("div:nth-child(2)");
    let inputBox = secondChild.querySelector("input[type='text']");
    let inputFile = secondChild.querySelector("input[type='file']");
    let inputEmail = secondChild.querySelector("input[type='email']");
    let inputPassword = secondChild.querySelector("input[type='password']");

    if (inputBox != null) {
        if (firstChild.classList.contains("d-none")) {
            inputBox.value = window.Var.originalValues[index];
            firstChild.classList.remove("d-none");
            secondChild.classList.add("d-none");
        }
        else { //Caso edit
            firstChild.classList.add("d-none");
            secondChild.classList.remove("d-none");
            inputBox.focus();
            inputBox.select();
            window.Var.originalValues[index] = inputBox.value;
        }
    }
    else if (inputFile != null) {
        if (firstChild.classList.contains("d-none")) {
            inputFile.value = window.Var.originalValueFile;
            firstChild.classList.remove("d-none");
            secondChild.classList.add("d-none");
        }
        else { //Caso edit
            firstChild.classList.add("d-none");
            secondChild.classList.remove("d-none");
            inputFile.focus();
            inputFile.select();
            window.Var.originalValueFile = inputFile.value;
        }
    }
    else if (inputEmail != null) {
        if (firstChild.classList.contains("d-none")) {
            inputEmail.value = window.Var.originalValues[index];
            firstChild.classList.remove("d-none");
            secondChild.classList.add("d-none");
        }
        else { //Caso edit
            firstChild.classList.add("d-none");
            secondChild.classList.remove("d-none");
            inputEmail.focus();
            inputEmail.select();
            window.Var.originalValues[index] = inputEmail.value;
        }
    }
    else if (inputPassword != null) {
        if (firstChild.classList.contains("d-none")) {
            inputPassword.value = window.Var.originalValues[index];
            firstChild.classList.remove("d-none");
            secondChild.classList.add("d-none");
        }
        else { //Caso edit
            firstChild.classList.add("d-none");
            secondChild.classList.remove("d-none");
            inputPassword.focus();
            inputPassword.select();
            window.Var.originalValues[index] = inputPassword.value;
            inputPassword.value = "";
        }
    }

}

export function askConfirm(e) {
    e.stopPropagation();
    let confirmElement = document.getElementsByClassName("al-confirm")[0];
    confirmElement.classList.remove("d-none");
}

export function removeConfirmElementHandler(e) {
    let needToRemove = false;
    let confirmElement = document.getElementsByClassName("al-confirm")[0];

    if (confirmElement != null) {
        if (!confirmElement.classList.contains("d-none")) {
            let confirmElementLeft = confirmElement.getBoundingClientRect().x;
            let confirmElementRight = confirmElementLeft + confirmElement.getBoundingClientRect().width;
            let confirmElementTop = confirmElement.getBoundingClientRect().y;
            let confirmElementBottom = confirmElementTop + confirmElement.getBoundingClientRect().height;

            if ((e.clientX < confirmElementLeft || e.clientX > confirmElementRight) || (e.clientY < confirmElementTop || e.clientY > confirmElementBottom))
                needToRemove = true;
        }
    }

    if (needToRemove)
        confirmElement.classList.add("d-none");
}

export function removeConfirmElement() {
    let confirmElement = document.getElementsByClassName("al-confirm")[0];
    confirmElement.classList.add("d-none");
}

export function submitForm(e) {
    let parent = e.currentTarget.closest(".al-confirm");
    let form = parent.querySelector("form");

    form.submit();
}

export function submitFormIndex(index){
    let form = document.getElementsByTagName("form")[index];
    form.submit();
}