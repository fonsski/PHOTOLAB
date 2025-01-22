<?php
$title = "Админ панель";
require_once "admin_header.php";
isAdmin();
?>
<!-- Main Content -->
<main>
    <h1>Аналитика</h1>
    <div class="analyse">
        <div class="visits">
            <div class="status">
                <div class="info">
                    <h3>Посещаемость сайта</h3>
                    <h1><?php echo $totalVisits; ?></h1>
                </div>
                <div class="progresss">
                    <canvas id="visitsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- График посещаемости -->
    <div class="visits-trend">
        <canvas id="visitsTrendChart"></canvas>
    </div>

    <!-- Recent Orders Table -->
    <div class="recent-orders">
        <h2>Недавно изменено</h2>
        <table>
            <thead>
                <tr>
                    <th>Название товара</th>
                    <th>Цена товара</th>
                    <th>Время изменения</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Содержимое таблицы -->
            </tbody>
        </table>
    </div>
</main>
<?php require_once "right_section.php"; ?>
</div>
</body>
<script>
// График в круге
const ctx = document.getElementById('visitsChart').getContext('2d');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [<?php echo $totalVisits; ?>, 100 - <?php echo $totalVisits; ?>],
            backgroundColor: ['#7380ec', '#dce1eb']
        }]
    },
    options: {
        cutout: '70%',
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

// График тренда посещаемости
const trendCtx = document.getElementById('visitsTrendChart').getContext('2d');
new Chart(trendCtx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($visitsData["dates"]); ?>,
        datasets: [{
            label: 'Посещения',
            data: <?php echo json_encode($visitsData["visits"]); ?>,
            borderColor: '#7380ec',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgba(115, 128, 236, 0.1)'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Посещаемость за последние 7 дней'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</html>
