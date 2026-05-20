(async function () {

    await fetch('/api/track', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    });
})();
