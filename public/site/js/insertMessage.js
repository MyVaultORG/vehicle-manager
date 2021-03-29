function insertMessage(type, message) {
    let div = `<div class="message ${type}" role="alert">${message}</div>`;
    return div;
}
