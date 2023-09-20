"strict mode";

import { Dialog } from "./modules/dialog.js";

const btnCreate = document.getElementById("btnCreate");
const btnSubmit = document.getElementById("btnSubmit");

const btnModify = document.getElementById("btnModify");
const btnDelete = document.getElementById("btnDelete");

const dateTime = document.getElementById("datetimepicker");

btnCreate.addEventListener("click", async() => {
    const dialogElement = document.getElementById("dialog");

    const dialog = new Dialog(dialogElement);
    dialog.open();

    const btnClose = document.getElementById("btnclose");
    btnClose.addEventListener("click", () => {
        dialog.close();
    })
});

/*
$(function() {
    $('#datetimepicker3').datetimepicker({
        pickDate: false
    });
});*/