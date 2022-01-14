require("./bootstrap");

let almaModalUpdate = document.getElementById("almaModalUpdate");
almaModalUpdate.addEventListener("show.bs.modal", function (event) {
    let button = event.relatedTarget;
    let recipient = button.getAttribute("data-bs-alma");

    let modalTitle = almaModalUpdate.querySelector(".modal-title");

    modalTitle.textContent = "Teste: " + recipient;
});
