let origin = location.origin;
let nav_links = document.querySelectorAll(".ripple");
let header_links = document.querySelectorAll(".scrollto");

// console.log(nav_links);
// console.log(header_links);

window.onload = function () {
    // navBar active link
    nav_links.forEach((nav_link) => {
        if (
            nav_link.getAttribute("href") === `${location.origin}/admin` &&
            nav_link.getAttribute("href") === location.href
        ) {
            nav_link.classList.add("active");
        } else if (
            location.href.includes(nav_link.getAttribute("href")) &&
            nav_link.getAttribute("href") !== `${location.origin}/admin`
        ) {
            nav_link.classList.add("active");
        }
    });
    // Header active link
    header_links.forEach((header_link) => {
        if (
            header_link.getAttribute("href") === `${location.origin}` &&
            header_link.getAttribute("href") === location.href
        ) {
            header_link.classList.add("active");
        } else if (
            location.href.includes(header_link.getAttribute("href")) &&
            header_link.getAttribute("href") !== `${location.origin}`
        ) {
            header_link.classList.add("active");
        }
    });
};
