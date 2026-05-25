(async function () {
    const API_URL = 'http://155.212.218.147:8080/api/track';

    await fetch(API_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    });
})();
