document.addEventListener('DOMContentLoaded', () => {
    const reinitButton = document.getElementById('reinitButton');

    reinitButton.addEventListener('click', () => {
        fetch('api/reinit', {
            method: "POST",
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
