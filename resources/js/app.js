import hljs from 'highlight.js/lib/core';
import javascript from 'highlight.js/lib/languages/javascript';
import php from 'highlight.js/lib/languages/php';

hljs.registerLanguage('php', php);
hljs.registerLanguage('js', javascript);

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('code').forEach((el) => {
        hljs.highlightElement(el);
    });
});

// I really don't like adding to the window object but eh.
window.toggleMenu = function toggleMenu(id) {
    const elem = document.getElementById(id);
    elem.classList.toggle('hidden');
    elem.classList.toggle('flex');
    if (elem.ariaHidden === 'true') {
        elem.ariaHidden = 'false';
    } else {
        elem.ariaHidden = 'true';
    }
};

// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (
    localStorage.theme === 'dark' ||
    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

// Whenever the user explicitly chooses light mode
localStorage.theme = 'light';

// Whenever the user explicitly chooses dark mode
localStorage.theme = 'dark';

// Whenever the user explicitly chooses to respect the OS preference
localStorage.removeItem('theme');
