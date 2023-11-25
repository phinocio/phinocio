import Editor from '@toast-ui/editor';
import '@toast-ui/editor/dist/toastui-editor.css';

const editor = new Editor({
    el: document.querySelector('#editor'),
    height: '500px',
    initialEditType: 'markdown',
    placeholder: 'Write something cool!',
    usageStatistics: false,
});

const content = document.querySelector('#content');

if (content.value !== '') {
    editor.setMarkdown(content.value);
}

document.querySelector('#markdownForm').addEventListener('submit', (e) => {
    e.preventDefault();
    document.querySelector('#content').value = editor.getMarkdown();
    e.target.submit();
});
