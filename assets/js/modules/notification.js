const linkElement = document.createElement("link");
linkElement.rel = "stylesheet";
linkElement.href = "/sistema-codigo-azul/assets/css/notification.css";
document.head.appendChild(linkElement);


const NOTIFICATION_CLASS = {
    SUCCESS: "notification--success",
    ERROR: "notification--error",
    INFO: "notification--info",
};

const NOTIFICATION_ICON = {
    SUCCESS: "check",
    ERROR: "ban",
    INFO: "info",
};

export const NOTIFICATION_TYPE = Object.freeze({
    ERROR: "ERROR",
    SUCCESS: "SUCCESS",
    INFO: "INFO"
});

export class Notification {
    static show(message, type, seconds) {
        const element = this.createElement(message, type);

        setTimeout(() => element.remove(), 1000 * seconds);
    }

    static createElement(message, type) {
        if (document.getElementById("notification")) {
            document.getElementById("notification").remove();
        }

        const containerElement = document.createElement("div");
        containerElement.id = "notification";
        containerElement.classList.add("notification");
        containerElement.classList.add(NOTIFICATION_CLASS[type]);

        const iconType = NOTIFICATION_ICON[type];

        containerElement.innerHTML = `
            <div class="notification__icon">
                <i class="fa fa-${iconType}"></i>
            </div>
            <div class="notification__text">
                <span>${message}</span>
            </div>
            <div id="btnNotification" class="notification__btnClose">
                <i class="fa fa-close"></i>
            </divZ>
        `;
        document.body.appendChild(containerElement);

        const btnNotification = document.getElementById("btnNotification");
        btnNotification.addEventListener("click", () => {
            containerElement.remove();
        });

        return containerElement;
    }
}