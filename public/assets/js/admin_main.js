/**
 * Easy selector helper function
 */
const select = (el, all = false) => {
    el = el.trim();
    if (all) {
        return [...document.querySelectorAll(el)];
    } else {
        return document.querySelector(el);
    }
};

/**
 * Easy event listener function
 */
const onEvent = (type, el, listener, all = false) => {
    let selectEl = select(el, all);
    if (selectEl) {
        if (all) {
            selectEl.forEach((e) => e.addEventListener(type, listener));
        } else {
            selectEl.addEventListener(type, listener);
        }
    }
};

/**
 * Easy on scroll event listener
 */
const onscroll = (el, listener) => {
    el.addEventListener("scroll", listener);
};

// /**
//  * Header fixed top on scroll
//  */
// let selectHeader = select("#header");
// if (selectHeader) {
//     let headerOffset = selectHeader.offsetTop;
//     let nextElement = selectHeader.nextElementSibling;
//     const headerFixed = () => {
//         if (headerOffset - window.scrollY <= 0) {
//             selectHeader.classList.add("fixed-top");
//             nextElement.classList.add("scrolled-offset");
//         } else {
//             selectHeader.classList.remove("fixed-top");
//             nextElement.classList.remove("scrolled-offset");
//         }
//     };
//     window.addEventListener("load", headerFixed);
//     onscroll(document, headerFixed);
// }
/**
 * Mobile nav toggle
 */
onEvent("click", ".mobile-nav-toggle", function (e) {
    select("#navbar").classList.toggle("navbar-mobile");
    this.classList.toggle("bi-list");
    this.classList.toggle("bi-x");
});

/**
 * Mobile nav dropdowns activate
 */
onEvent(
    "click",
    ".navbar .dropdown > a",
    function (e) {
        if (select("#navbar").classList.contains("navbar-mobile")) {
            e.preventDefault();
            this.nextElementSibling.classList.toggle("dropdown-active");
        }
    },
    true
);
