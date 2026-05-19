(async function () {

    const JOKES_API_URL = '/api/jokes';

    const select = document.getElementById('type');
    const list = document.getElementById('list');

    let jokes = [];

    async function load() {
        const res = await fetch(JOKES_API_URL);
        jokes = await res.json();

        render();
    }

    function getLength(j) {
        return j.setup.length + j.punchline.length;
    }

    function render() {
        const type = select.value;

        const filtered = jokes.filter(j => {
            const len = getLength(j);

            if (type === 'short') return len <= 55;
            if (type === 'long') return len > 55;

            return true;
        });

        list.innerHTML = filtered.map(j => `
            <div style="padding:10px;border:1px solid #ccc;margin:5px">
                <b>${j.setup}</b><br>
                ${j.punchline}
            </div>
        `).join('');
    }

    select.addEventListener('change', render);

    await load();
})();
