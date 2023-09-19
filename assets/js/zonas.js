"strict mode";

import { Dialog } from "./modules/dialog.js"
import { NOTIFICATION_TYPE, Notification } from "./modules/notification.js"

init();

const btnCreate = document.getElementById("btnCreate");
btnCreate.addEventListener("click", async () => {
    const dialogElement = document.getElementById("dialog");
    const dialog = new Dialog(dialogElement);
    dialog.open();

    document.getElementById("nombre").value = "";
    document.getElementById("zoneNumber").value = "";

    const btnClose = document.getElementById("btnclose");
    btnClose.addEventListener("click", () => dialog.close());

    const btnSubmit = document.getElementById("btnSubmit");
    let sending = false;
    btnSubmit.addEventListener("click", async () => {
        if (sending) return;

        const zoneName = document.getElementById("nombre").value;
        const zoneNumber = Number(document.getElementById("zoneNumber").value);

        sending = true;
        const content = await submitZone(zoneName, zoneNumber);

        const messageType = content.status ? "Se creo la zona con éxito." : "No se pudo crear la zona.";
        const notificationType = content.status ? NOTIFICATION_TYPE.SUCCESS : NOTIFICATION_TYPE.ERROR;

        Notification.show(messageType, notificationType, 5);

        if (content.status) {
            createZoneElement(7, "p");
            dialog.close();
            location.reload();
        }
        sending = false;
    });
});

let searchTimer = "";
const searchBar = document.getElementById("searchBar");
searchBar.addEventListener("input", (e) => {
    searchBar.value = searchBar.value.replace(/\D/g, '');

    clearTimeout(searchTimer);

    const zoneNumber = searchBar.value.trim();

    searchTimer = setTimeout(() => sendSearch(zoneNumber), 1000);
});

const sendSearch = async (zoneNumber) => {
    const response = await fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "search",
            data: {
                zoneNumber: Number(zoneNumber)
            }
        })
    });

    const content = await response.json();
    console.log(content);
}

function bindEventsToButtons() {
    const btnDelete = document.querySelectorAll(".delete-button");
    btnDelete.forEach(btn => {
        btn.addEventListener("click", async (e) => {
            const zoneNumber = Number(e.target.parentNode.parentNode.children[0].textContent);

            const status = await deleteZone(zoneNumber);

            if (!status) {
                Notification.show("No se pudo borrar la zona.", NOTIFICATION_TYPE.ERROR, 5);
                return;
            }

            e.target.parentNode.parentNode.remove();
            Notification.show("Se borro la zona con éxito.", NOTIFICATION_TYPE.SUCCESS, 5);
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

            let zoneName = e.target.parentNode.parentNode.children[1].textContent;
            let zoneNumber = Number(e.target.parentNode.parentNode.children[0].textContent);

            const zoneNameInput = document.getElementById("zoneName");
            const zoneNumberInput = document.getElementById("zoneNumber2");

            zoneNameInput.value = zoneName;
            zoneNumberInput.value = zoneNumber;

            let sending = false;
            const btnSubmit = document.getElementById("btnSubmit2");
            btnSubmit.addEventListener("click", async () => {
                if (sending) return;

                const zoneName = document.getElementById("zoneName").value;
                const zoneNumber = Number(document.getElementById("zoneNumber2").value);

                sending = true;
                const status = await modifyZone(zoneName, zoneNumber);
                // const status = true;

                if (!status) {
                    Notification.show("No se pudo modificar la zona.", NOTIFICATION_TYPE.ERROR, 5);
                    return;
                }

                dialog.close();
                Notification.show("Se modifico la zona con éxito.", NOTIFICATION_TYPE.SUCCESS, 5);
                location.reload();
            });
            sending = false;
        });
    });
}

const submitZone = async (zoneName, zoneNumber) => {
    const response = await fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "insert",
            data: {
                name: zoneName.toUpperCase(),
                number: zoneNumber
            }
        })
    });

    const content = await response.json();
    return content;
}

const createZoneElement = (id, name) => {
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

const modifyZone = async (zoneName, zoneNumber) => {
    const response = await fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "update",
            data: {
                name: zoneName,
                number: zoneNumber
            }
        })
    });

    const content = await response.json();
    return content;
}

const deleteZone = async (zoneNumber) => {
    const response = await fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "delete",
            data: {
                number: zoneNumber
            }
        })
    });

    const content = await response.json();
    return content.status;
}

async function getAllZones() {
    const response = await fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "getAll"
        })
    });

    const content = await response.json();
    return content;
}

async function init() {
    bindEventsToButtons();
    const content = await getAllZones();
    console.log(content);
}