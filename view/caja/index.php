<?php
include_once 'view/header.php';
?>
<main class="bg-blue-50">
	<h1 class="font-bold text-xl text-center md:text-3xl p-4">Bienvenido <span class="text-red-500">Módulo de
			Caja</span></h1>
	<div class="container mx-auto px-4 sm:px-6 py-4 sm:py-6 lg:px-8 lg:py-8">
		<div class="flex flex-col">
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
				<h2 class="text-2xl font-bold leading-tight text-gray-800">Bienvenido, miguelchuc</h2>
				<p class="text-gray-700">ID: 1</p>
				<p class="text-gray-700">Agencia: Central</p>
			</div>

			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
				<h2 class="text-2xl font-bold leading-tight text-gray-800">Estado de la Caja</h2>
				<?php
				$estado_apertura = 1;
				if ( $estado_apertura == 0 ) {
					?>
					<p class="text-gray-700 font-medium">Estado: <span class="text-red-500">Cerrada</span></p>
					<button id="btnApertura" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
						Apertura
					</button>
					<?php
				} else {
					?>
					<p class="text-gray-700 font-medium">Estado: <span class="text-green-500">Abierta</span></p>
					<button id="btnCierre" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
						Cierre
					</button>
					<?php
				}
				?>
			</div>

			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
				<h2 class="text-2xl font-bold leading-tight text-gray-800 mb-4">Movimientos Cajero</h2>
				<div id="detailed-pricing" class="w-full overflow-x-auto">
					<div class="overflow-hidden min-w-max">
						<div
							class="grid grid-cols-2 p-4 text-sm font-medium text-gray-900 bg-gray-100 border-t border-b border-gray-200 gap-x-16 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
							<div class="flex items-center">Tipo</div>
							<div>Cantidad</div>
						</div>
						<div
							class="grid grid-cols-2 px-4 py-3 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
							<div class="text-gray-500 dark:text-gray-400">Transacciones </div>
							<div>
								0
							</div>
						</div>
						<div
							class="grid grid-cols-2 px-4 py-3 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
							<div class="text-gray-500 dark:text-gray-400">Reversas </div>
							<div>
								0
							</div>
						</div>
						<div
							class="grid grid-cols-2 px-4 py-3 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
							<div class="text-gray-500 dark:text-gray-400">Pedidos de Efectivo </div>
							<div>
								0
							</div>
						</div>
						<div
							class="grid grid-cols-2 px-4 py-3 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
							<div class="text-gray-500 dark:text-gray-400">Envios de Efectivo </div>
							<div>
								0
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="view/caja/index.js"></script>

<?php
include_once 'view/footer.php';
?>