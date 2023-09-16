const count = document.getElementById("count");
const roomscontainer = document.getElementById("rooms__container");


let idTimer = setInterval(async () => {
    const response = await fetch("controllers/roomController.php", {
        method: "POST",
        body: JSON.stringify({
            action: "getAvailableSlots"
        })
    });

    const content = await response.json();

    let countActual = 0;
    createRoom(content.name);
    if (content.name != "Disponible") countActual = updateCount(content.count);

    if (countActual >= 4) {
        clearInterval(idTimer);
    }
}, 2000);


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
    let countActual = Number(count.textContent) + slotActual;
    count.textContent = countActual;

    return countActual;
}