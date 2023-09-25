import { getCookie, verifyCookie } from "./modules/cookies.js";

const TOKEN = getCookie("token");

(async function () {
    const status = await verifyCookie(TOKEN);

    if (TOKEN === undefined) {
        location.href = "/sistema-codigo-azul/ingreso";
        return false;
    }

    if (!status) {
        location.href = "/sistema-codigo-azul/ingreso";
        return false;
    }
}());