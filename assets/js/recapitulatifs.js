document.addEventListener('DOMContentLoaded', () => {
    const refreshButton = document.getElementById('refreshButton');
    const besoinTotalSpan = document.getElementById('besoinTotalSpan');
    const besoinSatisfaitSpan = document.getElementById('besoinSatisfaitSpan');
    const besoinRestantSpan = document.getElementById('besoinRestantSpan');

    function refresh() {
        fetch('api/recapitulatifs/besoins', {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
        })
        .then(res => res.json())
        .then(data => {
            if (data.status == 'ok') {
                besoinTotalSpan.textContent = data.besoin_total;
                besoinSatisfaitSpan.textContent = data.besoin_total - data.besoin_restant;
                besoinRestantSpan.textContent = data.besoin_restant;
            }
            else if (data.status == 'error') {
                // todo
            }
        });
    }

    refreshButton.addEventListener('click', () => {
        refresh();
    });

    refresh();
});
