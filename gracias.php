<?php
include 'db.php';

// Obtener la cantidad de votos por candidato
$query = "SELECT candidato, COUNT(*) AS cantidad FROM encuesta GROUP BY candidato";
$result = $conn->query($query);

$candidatos = [];
$cantidades = [];

while ($row = $result->fetch_assoc()) {
    $candidatos[] = $row['candidato'];
    $cantidades[] = $row['cantidad'];
}

// Cerrar la conexión
$conn->close();
include 'header.php';
?>

<div class="max-w-lg mx-auto mt-20 bg-white p-10 rounded-lg shadow-md text-center">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">¡Gracias por completar la encuesta!</h2>
    <p class="text-gray-600">Tus respuestas han sido registradas con éxito.</p>

    <!-- Canvas para el gráfico -->
    <canvas id="votosChart" class="mt-8"></canvas>
</div>

<script>
    const ctx = document.getElementById('votosChart').getContext('2d');
    const votosChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($candidatos); ?>,
            datasets: [{
                label: 'Cantidad de Votos',
                data: <?php echo json_encode($cantidades); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad de Votos'
                    }
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
            }
        }
    });
</script>
<?php include 'footer.php'; ?>