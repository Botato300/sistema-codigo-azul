"strict mode";

import { Dialog } from "./modules/dialog.js"
import { NOTIFICATION_TYPE, Notification } from "./modules/notification.js"

const btnModify = document.getElementById("btnModify");

const btnCreate = document.getElementById("btnCreate");
btnCreate.addEventListener("click", async () => {
    const dialogElement = document.getElementById("dialog");
    const dialog = new Dialog(dialogElement);
    dialog.open();

    const btnClose = document.getElementById("btnclose");
    btnClose.addEventListener("click", () => dialog.close());

    const btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.addEventListener("click", async () => {
        const zoneName = document.getElementById("nombre").value;
        const zoneNumber = Number(document.getElementById("zoneNumber").value);

        const content = await submitZone(zoneName, zoneNumber);

        const messageType = content.status ? "Se creo la zona con éxito." : "No se pudo crear la zona.";
        const notificationType = content.status ? NOTIFICATION_TYPE.SUCCESS : NOTIFICATION_TYPE.ERROR;

        Notification.show(messageType, notificationType, 5);

        if (content.status) {
            createZoneElement(content.zoneNumber, content.zoneName);
            bindEventsToButtons();
            dialog.close();
        }
    });
});

const bindEventsToButtons = () => {
    const btnDelete = document.querySelectorAll(".delete-button");
    btnDelete.forEach(btn => {
        btn.addEventListener("click", async function (e) {
            const zoneNumber = Number(e.target.parentNode.parentNode.children[0].textContent);

            const status = await deleteZone(zoneNumber);

            if (!status) {
                Notification.show("No se pudo borrar la zona.", NOTIFICATION_TYPE.ERROR, 5);
                return;
            }

            e.target.parentNode.parentNode.remove()
            Notification.show("Se borro la zona con éxito.", NOTIFICATION_TYPE.SUCCESS, 5);
        });
    });
}
bindEventsToButtons();

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
            <button type="button" class="btn btn-primary bg-warning"><i class="fa fa-pencil"></i>
                Modificar</button>
            <button type="button" class="btn btn-primary bg-danger delete-button"><i class="fa fa-ban"></i>
                Eliminar</button>
        </td>
    `;

    table.appendChild(rowElement);
}

const modifyZone = async () => {
    fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "update",
            data: {
                name: zoneName.value,
                number: zoneNumber.value
            }
        })
    });
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