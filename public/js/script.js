function myCollaps() {
    const nav = document.getElementById("sidebar-nav");
    const navSm = document.getElementById("menu-navbar");
    const collapsArea = document.getElementById("collapse-area");
    if (nav.classList.contains("show")) {
        nav.classList.remove("show");
        nav.classList.add("hidden");
    } else if (nav.classList.contains("hidden")) {
        nav.classList.remove("hidden");
        nav.classList.add("show");
    }
    if (navSm.classList.contains("hidden-sm")) {
        navSm.classList.remove("hidden-sm");
        collapsArea.classList.remove("hidden-area-collapse");
        navSm.classList.add("show-sm");
        collapsArea.classList.add("show-area-collapse");
    } else if (navSm.classList.contains("show-sm")) {
        navSm.classList.remove("show-sm");
        collapsArea.classList.remove("show-area-collapse");
        navSm.classList.add("hidden-sm");
        collapsArea.classList.add("hidden-area-collapse");
    }
}

function areaCollapse() {
    const navbarSm = document.getElementById("menu-navbar");
    const collapsArea = document.getElementById("collapse-area");
    navbarSm.classList.remove("show-sm");
    navbarSm.classList.add("hidden-sm");
    collapsArea.classList.add("hidden-area-collapse");
    collapsArea.classList.remove("show-area-collapse");
}
function setInput(classHtml, inputHtml, textHtml, dataHtml) {
    var dropInput = document.getElementsByClassName(classHtml),
        len = dropInput.length,
        i;

    function click() {
        document.getElementById(textHtml).textContent = this.innerText;
        document
            .getElementById(inputHtml)
            .setAttribute("value", this.getAttribute(dataHtml));
    }

    for (i = 0; i < len; i += 1) {
        dropInput[i].onclick = click;
    }
}
