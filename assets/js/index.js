const count = document.getElementById("count");
const roomscontainer = document.getElementById("rooms__container");

let roomsAvailable = 0;
let totalRooms = 0;

let idTimer = setInterval(async () => {
    const response = await fetch("controllers/roomController.php", {
        method: "POST",
        body: JSON.stringify({
            action: "getAvailableSlots"
        })
    });

    const content = await response.json();

    createRoom(content.name);

    if (content.name != "Disponible") roomsAvailable += updateCount();

    if (totalRooms >= 4) {
        clearInterval(idTimer);
    }
}, 500);


const createRoom = (name) => {
    const room = document.createElement("div");
    room.classList.add("room__container");

    room.innerHTML = `
        <i class="fa fa-user-circle-o ${name != "Disponible" ? "text-danger" : null}"></i>
        <p class="${name != "Disponible" ? "text-danger" : null}">Quirofano ${roomsAvailable}</p>
        <p class="text-muted">${name}</p>
    `;

    roomscontainer.appendChild(room);

    totalRooms += 1;
}

const updateCount = () => {
    let countCurrent = Number(count.textContent) + 1;
    count.textContent = countCurrent;

    return countCurrent;
}