<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h2>Visits by Hour</h2>
<canvas id="hours"></canvas>

<h2>Visits by City</h2>
<canvas id="cities"></canvas>

<script>
    const hours = @json($byHour);
    const cities = @json($byCity);

    new Chart(document.getElementById('hours'), {
        type: 'bar',
        data: {
            labels: hours.map(i => i.hour + ':00'),
            datasets: [{
                label: 'visits',
                data: hours.map(i => i.total)
            }]
        }
    });

    new Chart(document.getElementById('cities'), {
        type: 'pie',
        data: {
            labels: cities.map(i => i.city ?? 'Unknown'),
            datasets: [{
                data: cities.map(i => i.total)
            }]
        }
    });
</script>
