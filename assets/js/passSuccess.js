const urlParams = new URLSearchParams(document.location.search);
const emailParam = urlParams.get("email");

const email = document.getElementById("email");
email.textContent = emailParam;