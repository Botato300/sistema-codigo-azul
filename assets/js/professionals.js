"strict mode";

import { Dialog } from "./modules/dialog.js";
import { NOTIFICATION_TYPE, Notification } from "./modules/notification.js";

init();

const btnCreate = document.getElementById("btnCreate");
btnCreate.addEventListener("click", async () => {

    const dialogElement = document.getElementById("dialog");
    const dialog = new Dialog(dialogElement);
    dialog.open();

    const btnClose = document.getElementById("btnclose");
    btnClose.addEventListener("click", () => dialog.close());

    const btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.addEventListener("click", (e) => {
        e.preventDefault();
        const data = getFormData();
        sending = true;
        const content = await submitProfessional(data);

        if (!content.status) Notification.show("No se pudo agregar al profesional.", NOTIFICATION_TYPE.ERROR, 5);

        if (content.status) {
            dialog.close();
            location.reload();
        }
        sending = false;
    });
});

let searchTimer = "";
const searchBar = document.getElementById("searchBar");
searchBar.addEventListener("input", (e) => {
    if (searchBar.value.length == 0) location.reload();

    searchBar.value = searchBar.value.replace(/\D/g, '');

    clearTimeout(searchTimer);

    const profNumber = searchBar.value.trim();

    searchTimer = setTimeout(() => sendSearch(profNumber), 1000);
});

const sendSearch = async (profNumber) => {
    const response = await fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "search",
            data: {
                profNumber: Number(profNumber)
            }
        })
    });

    const content = await response.json();

    if (!content.status) {
        Notification.show("No se pudo encontrar al profesional que buscas.", NOTIFICATION_TYPE.ERROR, 5);
        return false;
    }

    ResetProfessionalElement();
    createProfessionalElement(profNumber, content.data.nombre);
}

function bindEventsToButtons() {
    const btnDelete = document.querySelectorAll(".delete-button");
    btnDelete.forEach(btn => {
        btn.addEventListener("click", async (e) => {
            const profNumber = Number(e.target.parentNode.parentNode.children[0].textContent);

            const status = await deleteProfessional(profNumber);

            if (!status) {
                Notification.show("No se pudo borrar al profesional.", NOTIFICATION_TYPE.ERROR, 5);
                return;
            }

            e.target.parentNode.parentNode.remove();
            Notification.show("Se borro al profesional con éxito.", NOTIFICATION_TYPE.SUCCESS, 5);
        });
    });

    const btnModify = document.querySelectorAll(".modify-button");
    btnModify.forEach(btn => {
        btn.addEventListener("click", async (e) => {
            const dialogModify = document.getElementById("modifyDialog");
            const dialog = new Dialog(dialogModify);
            dialog.open();

            const btnClose = document.getElementById("btnclose2");
            btnClose.addEventListener("click", () => {
                dialog.close();
            });

            let profName = e.target.parentNode.parentNode.children[1].textContent;
            let profNumber = Number(e.target.parentNode.parentNode.children[0].textContent);

            const profNameInput = document.getElementById("profName");
            profNameInput.value = profName;

            document.getElementById("profNumber2").textContent = profNumber;

            let sending = false;
            const btnSubmit = document.getElementById("btnSubmit2");
            btnSubmit.addEventListener("click", async () => {
                if (sending) return;

                const profName = document.getElementById("profName").value;
                const profNumber = Number(document.getElementById("profNumber2").textContent);

                sending = true;
                const status = await modifyProfessional(profName, profNumber);

                if (!status) {
                    Notification.show("No se pudo modificar al profesional.", NOTIFICATION_TYPE.ERROR, 5);
                    return;
                }

                dialog.close();
                location.reload();
            });
            sending = false;
        });
    });
}

const submitProfessional = async (dataArr) => {
    const response = await fetch("controllers/professionalController", {
        method: "POST",
        body: JSON.stringify({
            action: "insert",
            data: dataArr
        })
    });

    const content = await response.json();
    return content;
}

const createProfessionalElement = (id, name) => {
    const table = document.getElementById("dataTable");

    const rowElement = document.createElement("tr");
    rowElement.innerHTML = `
        <td>${id}</td>
        <td>${name}</td>
        <td>
            <button type="button" class="btn btn-primary bg-warning modify-button"><i class="fa fa-pencil"></i>
                Modificar</button>
            <button type="button" class="btn btn-primary bg-danger delete-button"><i class="fa fa-ban"></i>
                Eliminar</button>
        </td>
    `;

    table.appendChild(rowElement);
}

const ResetProfessionalElement = () => {
    const table = document.getElementById("dataTable");
    table.innerHTML = "";
}

const modifyProfessional = async (profName, profNumber) => {
    const response = await fetch("controllers/professionalController", {
        method: "POST",
        body: JSON.stringify({
            action: "update",
            data: {
                name: profName,
                number: profNumber
            }
        })
    });

    const content = await response.json();
    return content;
}

const deleteProfessional = async (profNumber) => {
    const response = await fetch("controllers/professionalController", {
        method: "POST",
        body: JSON.stringify({
            action: "delete",
            data: {
                number: profNumber
            }
        })
    });

    const content = await response.json();
    return content.status;
}

async function getAllProfessionals() {
    const response = await fetch("controllers/professionalController", {
        method: "POST",
        body: JSON.stringify({
            action: "getAll"
        })
    });

    const content = await response.json();
    return content;
}

async function init() {
    const content = await getAllProfessionals();

    if (!content.status) {
        Notification.show("No se pudieron obtener los profesionales.", NOTIFICATION_TYPE.ERROR, 5);
        return;
    }

    for (let i = 0; i < content.data.length; i++) {
        createProfessionalElement(content.data[i].numero, content.data[i].nombre);
    }

    bindEventsToButtons();
}

function getFormData() {
    const data = {
        DNI: document.getElementById("tipoDoc").value,
        DOCUMENT_NUM: document.getElementById("numDoc").value,
        CARREER_TYPE: document.getElementById("tipoCarrera").value,
        NAME: document.getElementById("nombre").value,
        LASTNAME: document.getElementById("apellido").value,
        TUITION: document.getElementById("matricula").value,
        DATE_BIRTH: document.getElementById("birthday").value,
        GENRES: document.getElementById("generos").value,
        TELEPHONE: document.getElementById("cellphone_number").value,
        ADDRESS: document.getElementById("address_street").value,
        EMAIL: document.getElementById("email").value,
        CALL_DATE: document.getElementById("fechaGuardia").value,
        TIME_ADMISSION: document.getElementById("inicioHoraGuardia").value,
        PICKUP_TIME: document.getElementById("finalHoraGuardia").value
    }

    return data;
}