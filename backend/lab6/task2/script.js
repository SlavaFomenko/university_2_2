const notesContainer = document.getElementById('notes')
const fetchAndDisplayNotes = async () => {
	notesContainer.innerHTML = ''

	const response = await fetch('fetch.php')
	const notes = await response.json()

	notes.forEach(note => {
		const noteElement = document.createElement('div')
		noteElement.setAttribute('class', 'note')
		noteElement.innerHTML = `
						<h3>${note.title}</h3>
						<p>${note.text}</p>
						<button onclick="updateNote(${note.id})">Update</button>
						<button onclick="deleteNote(${note.id})">Delete</button>
				`
		notesContainer.appendChild(noteElement)
	})
}

document.addEventListener('DOMContentLoaded', () => {
	const addNoteForm = document.getElementById('addNoteForm')
	// const notesContainer = document.getElementById('notes')
	// const fetchAndDisplayNotes = async () => {
	// 	notesContainer.innerHTML = ''

	// 	const response = await fetch('fetch.php')
	// 	const notes = await response.json()

	// 	notes.forEach(note => {
	// 		const noteElement = document.createElement('div')
	// 		noteElement.setAttribute('class', 'note')
	// 		noteElement.innerHTML = `
	// 						<h3>${note.title}</h3>
	// 						<p>${note.text}</p>
	// 						<button onclick="updateNote(${note.id})">Update</button>
	// 						<button onclick="deleteNote(${note.id})">Delete</button>
	// 				`
	// 		notesContainer.appendChild(noteElement)
	// 	})
	// }

	const addNote = async (title, text) => {
		try {
			const formData = new FormData()
			formData.append('title', title)
			formData.append('text', text)

			const response = await fetch('add_note.php', {
				method: 'POST',
				body: formData,
			})

			if (response.ok) {
				console.log('Note added successfully')
				fetchAndDisplayNotes()
			} else {
				console.error('Failed to add note')
			}
		} catch (error) {
			console.error('Error adding note:', error)
		}
	}

	addNoteForm.addEventListener('submit', event => {
		event.preventDefault()
		const title = document.getElementById('title').value
		const text = document.getElementById('text').value

		addNote(title, text)
		addNoteForm.reset()
	})

	fetchAndDisplayNotes()
})

const updateNote = async id => {
	const newTitle = prompt('Enter new title:')
	const newText = prompt('Enter new text:')

	if (newTitle !== null && newText !== null) {
		const response = await fetch(`update_note.php?id=${id}`, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
			},
			body: JSON.stringify({ title: newTitle, text: newText }),
		})

		if (response.ok) {
			fetchAndDisplayNotes()
		} else {
			console.error('Failed to update note')
		}
	}
}

const deleteNote = async id => {
	const response = await fetch(`delete_note.php?id=${id}`, {
		method: 'DELETE',
	})

	if (response.ok) {
		fetchAndDisplayNotes()
	} else {
		console.error('Failed to delete note')
	}
}
