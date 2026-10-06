const addBookBtn = document.getElementById('add-book');
const addBookModal = document.getElementById('add-book-modal');
const closeModalBtn = document.getElementById('close-modal-button');

addBookBtn.addEventListener('click', function () {
    addBookModal.style.display = 'flex';
});

closeModalBtn.addEventListener('click', function () {
    addBookModal.style.display = 'none';
});