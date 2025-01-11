<?php
include_once 'view/header.php';
?>
<main class="bg-blue-50">
	<h1 class="font-bold text-xl text-center md:text-xl p-4">Bienvenido <span class="text-red-500">Bóbeda</span></h1>

	<div id="miModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 p-2">
		<div class="rounded shadow-md mb-4 px-2 w-11/12 sm:w-8/12 md:w-6/12 lg:w-5/12">
			<div class="flex justify-between items-center border-b border-gray-200 bg-blue-700 p-4 rounded-t">
				<div class="flex items-center justify-center">
					<p class="text-xl font-bold text-gray-100">Nuevo</p>
				</div>
				<button id="cerrarModal" type="button"
					class="end-2.5 text-gray-100 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
					data-modal-hide="authentication-modal">
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
						viewBox="0 0 14 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
					</svg>
					<span class="sr-only">Close modal</span>
				</button>
			</div>
			<!-- Contenido del formulario -->
			<form id="bodega" class="p-4 bg-white">
				<!-- Nuevo campo: Selección de tipo -->
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="tipo">
						Tipo Transaccion
					</label>
					<select required
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/2 p-2"
						id="metodo" name="metodo">
						<option value="">Seleccionar...</option>
						<option value="pedido">Pedido</option>
						<option value="envio">Envío</option>
					</select>
				</div>
				<!-- Campos del formulario -->
				<div class="sm:flex w-full">
					<div class="mb-4 w-full">
						<label class="block text-gray-700 text-sm font-bold mb-2" for="efectivo">
							Efectivo
						</label>
						<input required
							class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2"
							id="efectivoDisplay" type="text" placeholder="Efectivo">
						<input name="efectivo" id="efectivo" type="hidden">
					</div>
					<div class="mb-4 sm:ml-2 w-full">
						<label class="block text-gray-700 text-sm font-bold mb-2" for="numeroBoleta">
							Número de boleta
						</label>
						<input required
							class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2"
							id="numeroBoleta" type="text" name="boleta" placeholder="Número de boleta">
					</div>
				</div>
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="comentario">
						Comentario
					</label>
					<textarea
						class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
						id="comentario" name="comentario" placeholder="Comentario"></textarea>
				</div>

				<!-- Botón de envío dentro del formulario -->
				<div class="flex items-center justify-center">
					<button
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
						type="submit" id="enviar">
						Solicitar
					</button>
				</div>
			</form>

		</div>
	</div>
	<div class="p-4 rounded-md w-full">
		<div class="p-2">
			<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white">
				<div class="flex justify-between w-full py-4 ">
					<h2 class="text-xl font-bold leading-tight text-gray-800 mb-4">Pedidos Realizados</h2>
					<button id="abrirModal"
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">
						Nuevo
					</button>
				</div>
				<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md"
					id="tablaTransacciones">
					<thead class="text-xs text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
						<tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
							<th class="px-4 py-2">Transacion</th>
							<th class="px-4 py-2">Monto</th>
							<th class="px-4 py-2">Boleta</th>
							<th class="px-4 py-2">Fecha hora</th>
							<th class="px-4 py-2">Estado</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<script src="view/caja/bobeda.js"></script>

<?php
include_once 'view/footer.php';
?>