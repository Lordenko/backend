const form = document.getElementById('noteForm');
const titleInput = document.getElementById('title');
const contentInput = document.getElementById('content');
const notesContainer = document.getElementById('notesContainer');

form.addEventListener('submit', e => {
    e.preventDefault();
    const title = titleInput.value.trim();
    const content = contentInput.value.trim();
    if (title && content) {
        fetch('notes.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title, content })
        }).then(loadNotes);
        form.reset();
    }
});

function loadNotes() {
    fetch('notes.php')
        .then(res => res.json())
        .then(notes => {
            notesContainer.innerHTML = '';
            notes.forEach(note => {
                const div = document.createElement('div');
                div.className = 'note';
                div.innerHTML = `
              <h3 contenteditable="true" onblur="updateNote(${note.id}, this.innerText, null)">${note.title}</h3>
              <p contenteditable="true" onblur="updateNote(${note.id}, null, this.innerText)">${note.content}</p>
              <div class="actions">
                <button onclick="deleteNote(${note.id})">Видалити</button>
              </div>
            `;
                notesContainer.appendChild(div);
            });
        });
}

function updateNote(id, newTitle, newContent) {
    const noteDiv = Array.from(notesContainer.children).find(div =>
        div.querySelector('h3').innerText === newTitle || div.querySelector('p').innerText === newContent
    );
    const title = newTitle !== null ? newTitle : noteDiv.querySelector('h3').innerText;
    const content = newContent !== null ? newContent : noteDiv.querySelector('p').innerText;

    fetch('notes.php', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, title, content })
    });
}

function deleteNote(id) {
    fetch('notes.php', {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
    }).then(loadNotes);
}

loadNotes();