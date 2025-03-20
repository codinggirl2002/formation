document.getElementById('openModal').addEventListener('click', function () {
    document.getElementById('modalContent').classList.remove('hidden')
});

//fermer la modale
document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('modalContent').classList.add('hidden')
});

//fermer la modale si on clique en dehors du contanu
document.getElementById('modalContent').addEventListener('click', function (e) {
    if (e.target === this) {
        this.classList.add('hidden')
    }
});
