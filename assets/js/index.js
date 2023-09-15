const count = document.getElementById("count");

let idTimer = setInterval(async () => {


    const response = await fetch("controllers/roomController.php", {
        method: "POST",
        body: JSON.stringify({
            action: "getSlotsAvaible"
        })
    });

    const content = await response.json();
    let countActual = Number(count.textContent) + content.count;
    count.textContent = countActual;

    if (countActual >= 3) {
        clearInterval(idTimer);
    }
}, 1000);