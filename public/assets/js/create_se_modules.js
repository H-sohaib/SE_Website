let selector = document.querySelector(".add-what");
let module_fields = document.querySelectorAll(".module-field");
let matiere_fields = document.querySelectorAll(".matiere-field");

selector.addEventListener("change", function (event) {
    if (this.value == "module") {
        // * remove disable on modules field
        module_fields.forEach(function (module_field) {
            module_field.removeAttribute("disabled");
        });

        // * add disable on matiere field
        matiere_fields.forEach(function (matiere_field) {
            matiere_field.setAttribute("disabled", "");
        });
    } else if (this.value == "matiere") {
        // * add disable on modules field
        module_fields.forEach(function (module_field) {
            module_field.setAttribute("disabled", "");
        });
        // * remove disable on matiere field
        matiere_fields.forEach(function (matiere_field) {
            matiere_field.removeAttribute("disabled");
        });
    } else {
        module_fields.forEach(function (module_field) {
            module_field.setAttribute("disabled", "");
        });
        matiere_fields.forEach(function (matiere_field) {
            matiere_field.setAttribute("disabled", "");
        });
    }
});




function confirmDelete(msg, button) {
    if (!confirm(msg))
        console.log(button.parentElement);
}