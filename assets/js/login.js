const username = document.getElementById("username");
const password = document.getElementById("password");
const btnSubmit = document.getElementById("btnSubmit");

btnSubmit.addEventListener("click", async () => {
    const response = await fetch("controllers/userController", {
        method: "POST",
        body: JSON.stringify({
            action: "login",
            data: {
                username: username.value,
                password: password.value
            }
        })
    });

    const content = await response.json();
    console.log(content);
});