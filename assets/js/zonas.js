"strict mode";

import { Dialog } from "./modules/dialog.js"

const zoneName = document.getElementById("nombre");
const zoneNumber = document.getElementById("zoneNumber");

const btnSubmit = document.getElementById("btnSubmit");
const btnCreate = document.getElementById("btnCreate");
const btnModify = document.getElementById("btnModify");
const btnDelete = document.getElementById("btnDelete");

btnCreate.addEventListener("click", async (e) => {
    const dialogElement = document.getElementById("dialog");

    const dialog = new Dialog(dialogElement);
    dialog.open();

    const btnClose = document.getElementById("btnclose");
    btnClose.addEventListener("click", () => {
        dialog.close();
    })
});



btnSubmit.addEventListener("click", async (e) => {
    e.preventDefault();

    const content = await submitZone();
});

const submitZone = () => {
    fetch("controllers/areaController", {
        method: "POST",
        body: JSON.stringify({
            action: "insert",
            data: {
                name: zoneName.value,
                number: zoneNumber.value
            }
        })
    });
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