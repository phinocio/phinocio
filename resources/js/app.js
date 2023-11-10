// I really don't like adding to the window object but eh.
window.toggleMenu = function toggleMenu(id) {
    const elem = document.getElementById(id);
    elem.classList.toggle('hidden');
    if (elem.ariaHidden === 'true') {
        elem.ariaHidden = 'false';
    } else {
        elem.ariaHidden = 'true';
    }
};
