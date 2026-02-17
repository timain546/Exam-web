document.addEventListener('DOMContentLoaded', () => {
    const achatForm= document.getElementById('achatForm');
    const nomProduitSpan = document.getElementById('nomProduitSpan');
    const uniteProduitSpan = document.getElementById('uniteProduitSpan');
    const achatErrorDiv = document.getElementById('achatErrorDiv');
    const achatErrorSpan = achatErrorDiv.querySelector('.message');

    let idBesoin = 0;


    document.querySelectorAll('.besoin button').forEach((button) => {
        button.addEventListener('click', () => {
            const tr = button.closest('.besoin');
            idBesoin = tr.dataset.idBesoin;
            const nomProduit = tr.dataset.quantiteProduit + " " + tr.dataset.nomProduit;
            const uniteProduit = tr.dataset.uniteProduit;

            nomProduitSpan.textContent = nomProduit;
            uniteProduitSpan.textContent = uniteProduit;
            achatErrorDiv.classList.add('d-none');
        });
    });


    achatForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(achatForm);

        fetch('api/achat/create/' + idBesoin, {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
        })
        .then(res => res.json())
        .then(data => {
            if (data.status == 'ok') {
                window.location.reload();
            }
            else if (data.status == 'error') {
                achatErrorDiv.classList.remove('d-none');
                achatErrorSpan.textContent = data.message;
            }
        });
    });
});
