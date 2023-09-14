const count = document.getElementById("count");

setInterval(async () => {
    const response = await fetch("controllers/quirofanoController.php", {
        method: "POST",
        body: JSON.stringify({
            action: "getSlotsAvaible"
        })
    });

    const content = await response.json();
    let countActual = Number(count.textContent) + content.count;
    if (countActual <= 4) count.textContent = countActual;
}, 1000);