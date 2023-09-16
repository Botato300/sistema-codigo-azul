const count = document.getElementById("count");
const roomscontainer = document.getElementById("rooms__container");

let countActual = 0;

let idTimer = setInterval(async () => {
    const response = await fetch("controllers/roomController.php", {
        method: "POST",
        body: JSON.stringify({
            action: "getAvailableSlots"
        })
    });

    const content = await response.json();


    createRoom(content.name);
    if (content.name != "Disponible") countActual += updateCount(content.count);

    if (countActual >= 4) {
        clearInterval(idTimer);
    }
}, 500);


const createRoom = (name) => {
    const room = document.createElement("div");
    room.classList.add("room__container");

    room.innerHTML = `
        <i class="fa fa-user-circle-o ${name != "Disponible" ? "text-danger" : null}"></i>
        <p class="text-muted">${name}</p>
    `;

    roomscontainer.appendChild(room);
}

const updateCount = (slotActual) => {
    let countCurrent = Number(count.textContent) + slotActual;
    count.textContent = countCurrent;

    return countCurrent;
}