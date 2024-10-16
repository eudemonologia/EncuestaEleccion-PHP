<?php include 'header.php'; ?>

<div class="max-w-lg mx-auto mt-20 bg-white p-10 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Acceso a la Encuesta</h2>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'true'): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            Ya has realizado esta encuesta.
        </div>
    <?php endif; ?>

    <p class="mb-4 text-gray-600 leading-relaxed">
        Antes de comenzar la encuesta, por favor ingresa tu nombre y DNI.
        Estos datos no quedarán vinculados con las respuestas que brindes en la encuesta.
    </p>

    <form action="encuesta.php" method="GET">
        <!-- Nombre -->
        <div class="mb-6">
            <label for="nombre" class="block text-lg font-medium text-gray-700 mb-2">Nombre</label>
            <input type="text" id="nombre" name="nombre"
                class="w-full p-3 rounded-lg border border-gray-300 focus:ring-[var(--color-celeste)] focus:border-[var(--color-celeste)] outline-none"
                required>
        </div>

        <!-- DNI -->
        <div class="mb-6">
            <label for="dni" class="block text-lg font-medium text-gray-700 mb-2">DNI</label>
            <input type="text" id="dni" name="dni"
                class="w-full p-3 rounded-lg border border-gray-300 focus:ring-[var(--color-celeste)] focus:border-[var(--color-celeste)] outline-none"
                required>
        </div>

        <button type="submit"
            class="w-full bg-[var(--color-celeste)] text-white p-3 rounded-lg hover:bg-blue-500 transition-all">
            Iniciar Encuesta
        </button>
    </form>
</div>

<?php include 'footer.php'; ?>