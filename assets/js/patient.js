"strict mode";

import { Dialog } from "./modules/dialog.js";

const btnCreate = document.getElementById("btnCreate");
const btnSubmit = document.getElementById("btnSubmit");

const btnModify = document.getElementById("btnModify");
const btnDelete = document.getElementById("btnDelete");

btnCreate.addEventListener("click", async () => {
    const dialogElement = document.getElementById("dialog");

    const dialog = new Dialog(dialogElement);
    dialog.open();

    const btnClose = document.getElementById("btnclose");
    btnClose.addEventListener("click", () => {
        dialog.close();
    })
});

function getForm(){
const formData = {
        DNI: document.getElementById("tipoDoc").value,
        DOCUMENT_NUM: document.getElementById("numeroDoc").value,
        BLOOD: document.getElementById("grupoSanguineo").value,
        NAME: document.getElementById("nombre").value,
        LAST_NAME: document.getElementById("lastname").value,
        CLINIC_HISTORY: document.getElementById("historiaClinica").value,
        BIRTHDAY: document.getElementById("birthday").value,
        DATE_BIRTH: document.getElementById("birthday").value,
        GENRES: document.getElementById("generos").value,
        TELEPHONE: document.getElementById("cellphone_number").value,
        ADDRESS: document.getElementById("address_street").value,
        EMAIL: document.getElementById("email").value 
}
}

function form(){

}