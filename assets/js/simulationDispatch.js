document.addEventListener('DOMContentLoaded', () => {
    const dispatchForm = document.getElementById('dispatchForm');
    const simulateButton = document.getElementById('simulateButton');
    const modeSelect = document.getElementById('modeSelect');

    function updateBesoins(besoins) {
        besoins.forEach((b) => {
            const td = document.getElementById('besoin-' + b.id_besoin);
            const quantite = td.dataset.quantite;
            const unite = td.dataset.unite;
            const quantiteApresDispatch = td.querySelector('.quantiteApresDispatch');
            const quantiteDiff = td.querySelector('.quantiteDiff');

            quantiteApresDispatch.textContent = b.quantite_restante;
            quantiteDiff.textContent = (b.quantite_restante - quantite) + ' ' + unite;
        });
    }

    simulateButton.addEventListener('click', () => {
        const mode = modeSelect.value;
        fetch('api/dispatch/simulation/' + mode, {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
        })
        .then(res => res.json())
        .then(data => {
            if (data.status == 'ok') {
                updateBesoins(data.besoins);
            }
            else if (data.status == 'error') {
                // todo
            }
        });
    });

    dispatchForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(dispatchForm);
        fetch('api/dispatch/execute', {
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
                // todo
            }
        });
    });
});
