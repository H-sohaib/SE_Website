let url = window.location.origin;
let edit_icons = document.querySelectorAll(".edit");

// make the field editable when click on edit icon
edit_icons.forEach((edit_icon) => {
    edit_icon.addEventListener("click", function (e) {
        let div_field = this.parentElement.firstElementChild;
        div_field.setAttribute("contenteditable", "true");
        div_field.focus();
    });
});
// ** remove contenteditable when focus leave (On blur)
edit_icons.forEach((edit_icon) => {
    let editable_field = edit_icon.previousElementSibling;
    editable_field.addEventListener("blur", function (e) {
        this.removeAttribute("contenteditable");
    });
});
// when click on submit , get all the text inside field and and send it to update
// * get all editable span elements in a Array
let editable_fields = [];
edit_icons.forEach((edit_icon) => {
    editable_fields.push(edit_icon.previousElementSibling);
});
let editable_module_num_fields = document.querySelectorAll(".module-num");

// for (let i = 0; i < length; i++) {
//     const item1 = array1[i];
//     const item2 = array2[i];

//     // Perform desired actions with item1 and item2
//     console.log(item1, item2);
// }

let submit = document.querySelector(".submit");
let alert = document.querySelector('div[role="alert"]');
// * on click on submit button
submit.addEventListener("click", function () {
    let modules = [];
    let matieres = [];
    // ** get the updated text in the editable_fields in a Array of objects
    editable_fields.forEach((editable_field) => {
        // * if the field is a module
        // {id : ?  , text : ? , module_num : ?}
        if (editable_field.hasAttribute("data-module")) {
            modules.push({
                id: parseInt(editable_field.getAttribute("data-module")),
                text: editable_field.textContent,
            });
        }
        // * if the field is a mateire
        // {id : ?  , text : ? }
        else if (editable_field.hasAttribute("data-matiere")) {
            matieres.push({
                id: parseInt(editable_field.getAttribute("data-matiere")),
                text: editable_field.textContent,
            });
        }
    });
    // *** add the module_num data in the module objects
    const length = editable_module_num_fields.length;
    for (let i = 0; i < length; i++) {
        const module_num = parseInt(
            editable_module_num_fields[i].textContent.replace("M", "")
        );
        modules[i].module_num = module_num;
    }
    // **** convert the Array of objects to a Json objects
    let modules_json = JSON.stringify(modules);
    let matieres_json = JSON.stringify(matieres);
    // send update for modules
    let ajax1 = $.ajax({
        method: "PATCH",
        url: `${url}/api/modules_update`,
        data: modules_json,
        contentType: "app/json",
    });
    // send update for matieres
    let ajax2 = $.ajax({
        method: "PATCH",
        url: `${url}/api/matieres_update`,
        data: matieres_json,
        contentType: "app/json",
    });
    // check if the 2 ajax successefuly sended
    $.when(ajax1, ajax2)
        .done(function (ajax1Object, ajax2Object) {
            if (ajax1Object[0] == "OK" && ajax2Object[0] == "OK") {
                location.reload();
            }
        })
        .fail(function () {
            // show the alert if it's error
            alert.classList.add("alert-danger");
            alert.classList.remove("d-none");
            alert.textContent =
                "Une erreur s'est produite lors du traitement de la requête. Veuillez réessayer.";
            setTimeout(function () {
                alert.classList.remove("alert-success");
                alert.classList.add("d-none");
                alert.textContent = "";
            }, 15000);
        });
});
