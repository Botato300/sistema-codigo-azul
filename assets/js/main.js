const count = document.getElementById("count");

setInterval(async () => {
    const response = await fetch("controllers/quirofanoController.php", {
        method: "POST",
        body: JSON.stringify({
            action: "getSlotsAvaible"
        })
    });
    const content = await response.json();
    count.textContent += Number(content.count);
}, 1000);