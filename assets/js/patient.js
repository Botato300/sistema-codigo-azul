"strict mode";

import { Dialog, Dialog } from "./modules/dialog.js";
import { NOTIFICATION_TYPE, Notification } from "./modules/notification.js";

init();

const dialog = new Dialog(document.getElementById("dialog"));
const btnCreate = document.getElementById("btnCreate");
btnCreate.addEventListener("click", async () => {
    if (dialog.isOpen()) return false;
    dialog.open();
});

const btnClose = document.getElementById("btnclose");
btnClose.addEventListener("click", () => dialog.close());

const btnSubmit = document.getElementById("btnSubmit");
btnSubmit.addEventListener("click", async (e) => {
    if (document.getElementById("dialogTitle").textContent == "Modificar Pacientes") return false;

    e.preventDefault();
    const data = getForm();

    btnSubmit.disabled = true;

    const content = await submitPatient(data);

    if (!content.status) Notification.show("No se pudo agregar al paciente.", NOTIFICATION_TYPE.ERROR, 5);

    if (content.status) {
        dialog.close();
        location.reload();
    }
    btnSubmit.disabled = false;
});

function bindEventsToButtons() {
    const btnDelete = document.querySelectorAll(".delete-button");
    btnDelete.forEach(btn => {
        btn.addEventListener("click", async (e) => {
            const patientNumber = Number(e.target.parentNode.parentNode.children[0].textContent);

            const status = await deletePatient(patientNumber);

            if (!status) {
                Notification.show("No se pudo borrar al paciente.", NOTIFICATION_TYPE.ERROR, 5);
                return;
            }

            e.target.parentNode.parentNode.remove();
            Notification.show("Se borro al paciente con éxito.", NOTIFICATION_TYPE.SUCCESS, 5);
        });
    });

    const btnModify = document.querySelectorAll(".modify-button");
    btnModify.forEach(btn => {
        btn.addEventListener("click", async (e) => {
            const dialogModify = document.getElementById("dialog");
            const dialog = new Dialog(dialogModify);
            dialog.open();

            const btnClose = document.getElementById("btnclose");
            btnClose.addEventListener("click", () => {
                dialog.close();
                resetDialog();
            });
            dialogModify.addEventListener("close", resetDialog);

            const patientNumber = Number(e.target.parentNode.parentNode.children[0].textContent);

            const data = await getPatientData(patientNumber);

            document.getElementById("tipoDoc").value = data.tipoDocumento;
            document.getElementById("numDoc").value = data.numeroDocumento;
            document.getElementById("grupoSanguineo").value = data.grupoSanguineo;
            document.getElementById("nombre").value = data.nombre;
            document.getElementById("apellido").value = data.apellido;
            document.getElementById("historiaClinica").value = data.idRol;
            document.getElementById("birthday").value = data.fechaNacimiento;
            document.getElementById("generos").value = data.genero;
            document.getElementById("cellphone_number").value = data.telefono;
            document.getElementById("address_street").value = data.domicilio;
            document.getElementById("email").value = data.correoElectronico;

            document.getElementById("btnSubmit").textContent = "Actualizar";
            document.getElementById("dialogTitle").textContent = "Modificar Pacientes";


            let sending = false;
            const btnSubmit = document.getElementById("btnSubmit");
            btnSubmit.addEventListener("click", async (e) => {
                e.preventDefault();

                if (sending) return;

                sending = true;
                const data = getForm();
                const status = await modifyPatient(data);

                if (!status) {
                    Notification.show("No se pudo modificar al paciente.", NOTIFICATION_TYPE.ERROR, 5);
                    return;
                }

                dialog.close();
                resetDialog();
                location.reload();
            });
            sending = false;
        });
    });
}

const submitPatient = async (dataArr) => {
    const response = await fetch("controllers/patientController", {
        method: "POST",
        body: JSON.stringify({
            action: "insert",
            data: dataArr
        })
    });

    const content = await response.json();
    return content;
}

const createPatientElement = (id, name) => {
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

const ResetPatientElement = () => {
    const table = document.getElementById("dataTable");
    table.innerHTML = "";
}

let searchTimer = "";
const searchBar = document.getElementById("searchBar");
searchBar.addEventListener("input", (e) => {
    if (searchBar.value.length == 0) location.reload();

    searchBar.value = searchBar.value.replace(/\D/g, '');

    clearTimeout(searchTimer);

    const patientNumber = searchBar.value.trim();

    searchTimer = setTimeout(() => sendSearch(patientNumber), 1000);
});

const sendSearch = async (patientNumber) => {
    const response = await fetch("controllers/patientController", {
        method: "POST",
        body: JSON.stringify({
            action: "search",
            data: {
                patientNumber: Number(patientNumber)
            }
        })
    });

    const content = await response.json();

    if (!content.status) {
        Notification.show("No se pudo encontrar al paciente que buscas.", NOTIFICATION_TYPE.ERROR, 3);
        return false;
    }

    ResetPatientElement();

    const fullName = content.data.nombre + " " + content.data.apellido;

    createPatientElement(patientNumber, fullName);
    bindEventsToButtons();
}

const modifyPatient = async (dataArr) => {
    const response = await fetch("controllers/patientController", {
        method: "POST",
        body: JSON.stringify({
            action: "update",
            data: dataArr
        })
    });

    const content = await response.json();
    return content.status;
}

const deletePatient = async (patientNumber) => {
    const response = await fetch("controllers/patientController", {
        method: "POST",
        body: JSON.stringify({
            action: "delete",
            data: {
                id: patientNumber
            }
        })
    });

    const content = await response.json();
    return content.status;
}

async function getAllPatients() {
    const response = await fetch("controllers/patientController", {
        method: "POST",
        body: JSON.stringify({
            action: "getAll"
        })
    });

    const content = await response.json();
    return content;
}

async function init() {
    const content = await getAllPatients();

    if (!content.status) {
        Notification.show("No hay ningun paciente para mostrar.", NOTIFICATION_TYPE.INFO, 3);
        return;
    }

    const data = content["data"][0];
    const fullName = `${data.nombre} ${data.apellido}`;
    for (let i = 0; i < content.data.length; i++) {
        createPatientElement(data.idRol, fullName);
    }

    bindEventsToButtons();
}

const getPatientData = async (patientNumber) => {
    const response = await fetch("controllers/patientController", {
        method: "POST",
        body: JSON.stringify({
            action: "getPatient",
            data: {
                patientNumber: patientNumber
            }
        })
    });

    const content = await response.json();
    return content.data;
}

    

function getForm() {
    const formData = {
        DNI: document.getElementById("tipoDoc").value,
        DOCUMENT_NUM: document.getElementById("numDoc").value,
        BLOOD: document.getElementById("grupoSanguineo").value,
        NAME: document.getElementById("nombre").value,
        LAST_NAME: document.getElementById("apellido").value,
        CLINIC_HISTORY: document.getElementById("historiaClinica").value,
        DATE_BIRTH: document.getElementById("birthday").value,
        GENRES: document.getElementById("generos").value,
        TELEPHONE: document.getElementById("cellphone_number").value,
        ADDRESS: document.getElementById("address_street").value,
        EMAIL: document.getElementById("email").value

    }
    return formData;
}

function resetDialog() {
    document.getElementById("tipoDoc").value = "DNI";
    document.getElementById("numDoc").value = "";
    document.getElementById("grupoSanguineo").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("apellido").value = "";
    document.getElementById("historiaClinica").value = "";
    document.getElementById("birthday").value = "";
    document.getElementById("generos").value = "M";
    document.getElementById("cellphone_number").value = "";
    document.getElementById("address_street").value = "";
    document.getElementById("email").value = "";

    document.getElementById("btnSubmit").textContent = "Enviar Paciente";
    document.getElementById("dialogTitle").textContent = "Cargar Paciente";
}


