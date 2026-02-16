document.addEventListener('DOMContentLoaded', () => {
    const createDonForm = document.getElementById('createDonForm');

    createDonForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(createDonForm);
        fetch('api/dons/create', {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
        })
        .then(res => res.json())
        .then(data => {
            if (data.status == 'ok') {
                // todo
            }
            else if (data.status == 'error') {
                // todo
            }
        });
    });
});
