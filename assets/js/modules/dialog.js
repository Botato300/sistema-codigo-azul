export class Dialog {
    constructor(element) {
        this.element = element;
    }

    open() {
        this.element.open = true;
    }

    close() {
        this.element.open = false;
    }
}