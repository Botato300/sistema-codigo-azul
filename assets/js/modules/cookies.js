export function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

export function createCookie(name, value) {
    let expCookie = new Date();
    expCookie.setMonth(expCookie.getMonth() + 3);

    document.cookie = `${name}=${value}; expires=${expCookie.toUTCString()};  path=/`;
}

export function removeCookie(name) {
    document.cookie = `${name}=; path=/`;
}

export async function verifyCookie(token) {
    const response = await fetch("controllers/userController", {
        method: "POST",
        body: JSON.stringify({
            action: "verify",
            data: {
                token: token
            }
        })
    });

    const content = await response.json();

    return content.status;
}