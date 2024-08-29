var showstatue = document.getElementById('displaymode');
var career = document.getElementById('tables');
var ranks = document.getElementById('ranks');

showstatue.addEventListener('change', (event) => {
    if (career.classList.contains('d-none')) {
        career.classList.remove('d-none');
    }else {
        career.classList.add('d-none');
    }

    if (ranks.classList.contains('d-none')) {
        ranks.classList.remove('d-none');
    }else {
        ranks.classList.add('d-none');
    }
})