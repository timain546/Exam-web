document.addEventListener('DOMContentLoaded', () => {
    const createBesoinForm = document.getElementById('createBesoinForm');

    createBesoinForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(createBesoinForm);
        fetch('api/besoins/create', {
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
