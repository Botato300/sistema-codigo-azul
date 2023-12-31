const count = document.getElementById('count');

let roomsAvailable = 0;
let totalRooms = 0;

const downloadsContaier = document.getElementById('downloads__container');

downloadsContaier.addEventListener('click', e => {
	if (e.target.dataset.filetype) fetchReport(e.target.dataset.filetype);
});

let idTimer = setInterval(async () => {
	const content = await fetchRoomData(totalRooms + 1);

	createRoom(content.name);

	if (content.name != 'Disponible')
		roomsAvailable += updateCount();

	if (totalRooms >= 4) clearInterval(idTimer);
}, 1000);

const fetchRoomData = async (slot) => {
	const response = await fetch('controllers/areaController.php', {
		method: 'POST',
		body: JSON.stringify({
			action: 'getAvailableArea',
			data: { slot: slot }
		}),
	});

	const content = await response.json();

	return content;
}

const fetchReport = async (fileType) => {
	const response = await fetch('controllers/controllerReport', {
		method: 'POST',
		body: JSON.stringify({
			action: 'download',
			data: {
				fileType: fileType
			},
		})
	});

	const content = await response.json();

	return content;
}

const createRoom = (name) => {
	const room = document.createElement('div');
	room.classList.add('room__container');

	room.innerHTML = `
    	<i class="fa fa-user-circle-o ${name != 'Disponible' ? 'text-danger' : null}"></i>
        <span class="${name != 'Disponible' ? 'text-danger' : null}">Quirofano ${totalRooms + 1}</span>
        <span class="text-muted">${name}</span>
    `;
	const roomscontainer = document.getElementById('rooms__container');
	roomscontainer.appendChild(room);
	totalRooms += 1;
}

const updateCount = () => {
	let countCurrent = Number(count.textContent) + 1;
	count.textContent = countCurrent;

	return countCurrent;
}
