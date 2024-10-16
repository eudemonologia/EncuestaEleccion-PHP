<?php

if (!isset($_GET['nombre']) || !isset($_GET['dni']) || empty($_GET['nombre']) || empty($_GET['dni'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';

$nombre = $_GET['nombre'];
$dni = $_GET['dni'];

$query = "SELECT COUNT(*) AS count FROM usuarios WHERE dni = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $dni);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    header("Location: index.php?error=true");
    exit();
} else {
    include 'header.php'; ?>

    <div class="max-w-lg mx-auto mt-20 bg-white p-10 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Completa la Encuesta</h2>
        <form action="procesar_encuesta.php" method="POST">
            <div class="mb-6">
                <label for="pregunta1" class="block text-lg font-medium text-gray-700 mb-2">¿Cómo describirías en una palabra la actual gestión?</label>
                <input type="text" id="pregunta1" name="pregunta1"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-[var(--color-celeste)] focus:border-[var(--color-celeste)] outline-none"
                    required>
            </div>
            <div class="mb-6">
                <label for="candidato" class="block text-lg font-medium text-gray-700 mb-2">¿A qué partido piensas votar el año que viene?</label>
                <select id="candidato" name="candidato"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-[var(--color-celeste)] focus:border-[var(--color-celeste)] outline-none" required>
                    <option value="">Seleccione un candidato</option>
                    <option value="Partido Libertario">Partido Libertario</option>
                    <option value="Partido Peronista">Partido Peronista</option>
                    <option value="PRO">PRO</option>
                    <option value="Radicalismo">Radicalismo</option>
                    <option value="No sabe /No contesta">No sabe/ No contesta</option>

                </select>
            </div>

            <!-- Campos ocultos para nombre y DNI -->
            <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
            <input type="hidden" name="dni" value="<?php echo htmlspecialchars($dni); ?>">

            <!-- Botón de Envío -->
            <button type="submit"
                class="w-full bg-[var(--color-celeste)] text-white p-3 rounded-lg hover:bg-blue-500 transition-all">
                Enviar Encuesta
            </button>
        </form>
    </div>

<?php include 'footer.php';
}
?>