const email = document.getElementById("email");
const btnSubmit = document.getElementById("btnSubmit");

const errorContainer = document.getElementById("errorContainer");
const errorList = document.getElementById("errorList");

btnSubmit.addEventListener("click", async () => {
    const response = await fetch("controllers/passwordController", {
        method: "POST",
        body: JSON.stringify({
            data: {
                email: email.value
            }
        })
    });

    const content = await response.json();

    if (!content.status) {
        showError(content.details);
    } else {
        hideError();
        alert("Contraseña cambiada!");
    }
});

const showError = (message) => {
    errorContainer.classList.remove("hidden");
    errorList.innerHTML = `<li>${message}</li>`;
};

const hideError = () => {
    errorContainer.classList.add("hidden");
};
