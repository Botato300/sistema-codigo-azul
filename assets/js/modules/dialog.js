export class Dialog {
	constructor(element) {
		this.element = element;
	}

	open() {
		this.element.showModal();
		document.getElementsByTagName("body")[0].style.overflow = "hidden";
	}

	close() {
		this.element.close();
		document.getElementsByTagName("body")[0].style.overflow = "auto";
	}
}