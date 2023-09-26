import { getCookie, verifyCookie } from "./modules/cookies.js";

const TOKEN = getCookie("token");

(async function () {
    if (TOKEN === undefined) {
        location.href = "/sistema-codigo-azul/ingreso";
        return false;
    }

    const status = await verifyCookie(TOKEN);
    if (!status) {
        location.href = "/sistema-codigo-azul/ingreso";
        return false;
    }
}());