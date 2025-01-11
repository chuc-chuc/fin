<?php
include_once 'view/header.php';
?>
<main class="bg-blue-50">
	<h1 class="font-bold text-xl text-center md:text-xl p-4">Bienvenido <span class="text-red-500">Bóbeda</span></h1>
	<div class="flex justify-center items-center p-6 mx-auto relative dark:bg-gray-900 mb-10">
		<div
			class="justify-center items-center w-full bg-white rounded-lg shadow lg:flex md:mt-0 lg:max-w-screen-md xl:max:max-w-screen-lg xl:p-0 dark:bg-gray-800">
			<div class="hidden w-2/3 lg:flex">
				<img class="rounded-l-lg" src="images/authentication/login.jpg" alt="login image" />
			</div>
			<div class="p-8 space-y-2 w-full">

				<div class="text-center">
					<h1 class="my-3 text-2xl font-semibold text-gray-700">Iniciar Sesión</h1>
				</div>

				<form id="miFormulario">
					<div class="space-y-3">
						<div>
							<label for="email" class="block text-sm text-gray-600">Usuario</label>
							<div class="relative mt-1 hover:-translate-y-0.5">
								<input
									class="w-full text-sm px-4 py-3 pl-10 bg-gray-100 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-400"
									type="email" placeholder="usuario" name="email" id="email" required>
								<div class="absolute left-0 inset-y-0 flex items-center">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-500 p-1"
										viewBox="0 0 20 20" fill="currentColor">
										<path
											d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
										<path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
									</svg>
								</div>
							</div>
						</div>
						<div>
							<label for="clave" class="block text-sm text-gray-600">Clave</label>
							<div class="relative mt-1">
								<input
									class="text-sm text-gray-800 px-4 py-3 pl-10 rounded-lg w-full bg-gray-100 focus:bg-gray-100 border border-gray-200 focus:outline-none focus:border-blue-400"
									type="email" placeholder="usuario" name="email" id="email" required>
								<div class="absolute left-0 inset-y-0 flex items-center">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-500 p-1"
										viewBox="0 0 20 20" fill="currentColor">
										<path
											d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
									</svg>
								</div>
								<div class="absolute right-0 inset-y-0 flex items-center">
									<button type="button" onclick="togglePasswordVisibility()" id="togglePassword">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
											stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3 text-gray-600">
											<path stroke-linecap="round" stroke-linejoin="round"
												d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
											<path stroke-linecap="round" stroke-linejoin="round"
												d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
										</svg>
									</button>
								</div>
							</div>
						</div>
						<div>
							<button type="submit" name="submit" id="submit"
								class="w-full flex justify-center text-white py-2.5 px-4 rounded-lg bg-red-600 hover:bg-indigo-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5 mt-6">
								Iniciar Sesión
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>

<script>

</script>

<?php
include_once 'view/footer.php';
?>