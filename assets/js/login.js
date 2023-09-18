const email = document.getElementById("email");
const password = document.getElementById("password");
const btnSubmit = document.getElementById("btnSubmit");

const errorContainer = document.getElementById("errorContainer");
const errorList = document.getElementById("errorList");

btnSubmit.addEventListener("click", async () => {
    const response = await fetch("controllers/userController", {
        method: "POST",
        body: JSON.stringify({
            action: "login",
            data: {
                email: email.value,
                password: password.value
            }
        })
    });

    const content = await response.json();

    if (!content.status) {
        showError(content.details);
    } else {
        hideError();
        content.userType === "admin" ? location.href = "/sistema-codigo-azul" : location.href = "/sistema-codigo-azul/lite";
    }
});

const showError = (message) => {
    errorContainer.classList.remove("hidden");
    errorList.innerHTML = `<li>${message}</li>`;
};

const hideError = () => {
    errorContainer.classList.add("hidden");
};
