"strict mode";

import { Dialog } from "./modules/dialog.js"
import { NOTIFICATION_TYPE, Notification } from "./modules/notification.js"

const zoneName = document.getElementById("nombre");
const zoneNumber = document.getElementById("zoneNumber");

const btnModify = document.getElementById("btnModify");
const btnDelete = document.getElementById("btnDelete");

const btnCreate = document.getElementById("btnCreate");
btnCreate.addEventListener("click", async () => {
    const dialogElement = document.getElementById("dialog");
    const dialog = new Dialog(dialogElement);
    dialog.open();

    const btnClose = document.getElementById("btnclose");
    btnClose.addEventListener("click", () => dialog.close());

    const btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.addEventListener("click", async () => {
        const status = await submitZone();

        const messageType = status ? "Se creo la zona con éxito" : "No se pudo crear la zona.";
        const notificationType = status ? NOTIFICATION_TYPE.SUCCESS : NOTIFICATION_TYPE.ERROR;

        Notification.show(messageType, notificationType, 5);
        if (status) dialog.close();
    });
});

const submitZone = async () => {
    const response = await fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "insert",
            data: {
                name: zoneName.value,
                number: Number(zoneNumber.value)
            }
        })
    });

    const content = await response.json();
    return content.status;
}

const createComponentZone = async (id, name) => {

}

const openDialog = async () => {

}

const closeDialog = async () => {

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

const deleteZone = async () => {
    fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "delete",
            data: {
                number: zoneNumber.value
            }
        })
    });
}