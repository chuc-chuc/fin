<?php
class App {
	public function acceso( $acceso ) {
		$db = db();
		//consulta
		$idUsuario = 1;
		try {
			$query = "CALL VerificarAccesoUsuario(?, ?, @tieneAcceso)";
			$stmt = $db->prepare( $query );
			// Vincular parámetros
			$stmt->bind_param( 'is', $idUsuario, $acceso );
			// Ejecutar la consulta
			$stmt->execute();
			// Obtener el resultado del parámetro OUT
			$result = $db->query( "SELECT @tieneAcceso AS tieneAcceso" );
			$row = $result->fetch_assoc();
			// Cerrar sentencia y conexión
			$stmt->close();
			$db->close();
			return (bool) $row['tieneAcceso'];
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function nav() {
		?>
		<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
			<div class="py-3 px-3 lg:px-5 lg:pl-3">
				<div class="flex justify-between items-center">
					<div class="flex justify-start items-center">
						<button id="toggleSidebar" aria-expanded="true" aria-controls="sidebar"
							class="hidden p-2 mr-3 text-gray-600 rounded cursor-pointer lg:inline hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
							<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
									clip-rule="evenodd"></path>
							</svg>
						</button>
						<button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
							class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
							<svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
									clip-rule="evenodd"></path>
							</svg>
							<svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
									clip-rule="evenodd"></path>
							</svg>
						</button>
						<a class="flex mr-14">
							<svg id="Layer_2" class=" w-7 h-7 mt-1 " height="512" viewBox="0 0 512 512" width="512"
								xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								data-name="Layer 2">
								<linearGradient id="linear-gradient" gradientUnits="userSpaceOnUse" x1="43.93" x2="468.07"
									y1="43.93" y2="468.07">
									<stop offset="0" stop-color="#ff386a" />
									<stop offset="1" stop-color="#ab2343" />
								</linearGradient>
								<g id="Icon">
									<g id="F">
										<rect id="Background" fill="url(#linear-gradient)" height="512" rx="150" width="512" />
										<path id="F-2"
											d="m203.51 431.05h-70.07v-350.1h245.12v70.07h-175.05v70.07h104.98v70.07h-104.98z"
											fill="#fff" data-name="F" />
									</g>
								</g>
							</svg>
							<span
								class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white ml-2">INCOOP</span>
						</a>
					</div>
					<div class="flex items-center">

						<p class="text-sm font-medium text-gray-900 dark:text-white" role="none">
							<?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?>
						</p>
						<div class="flex items-center ml-3">
							<div>
								<button type="button"
									class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
									id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
									<span class="sr-only">Open user menu</span>
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2200 2200"
										style="enable-background:new 0 0 2200 2200;" xml:space="preserve" class="w-10 h-10">
										<g id="Objects">
											<g>
												<radialGradient id="SVGID_1_" cx="742.4818" cy="737.5518" r="1257.2716"
													gradientUnits="userSpaceOnUse">
													<stop offset="0" style="stop-color:#63DFFC" />
													<stop offset="1" style="stop-color:#3F7CD1" />
												</radialGradient>
												<path style="fill:url(#SVGID_1_);"
													d="M1903,1100c0,215.52-84.91,411.21-223.1,555.44C1533.74,1808.01,1327.96,1903,1100,1903	s-433.74-94.99-579.9-247.56C381.91,1511.21,297,1315.52,297,1100c0-443.48,359.52-803,803-803S1903,656.52,1903,1100z" />

												<radialGradient id="SVGID_00000104698309287865493900000001749800286949306755_"
													cx="1024.0569" cy="699.494" r="480.5576" gradientUnits="userSpaceOnUse">
													<stop offset="0" style="stop-color:#FFFFFF" />
													<stop offset="0.9989" style="stop-color:#D1D1D1" />
												</radialGradient>
												<circle
													style="fill:url(#SVGID_00000104698309287865493900000001749800286949306755_);"
													cx="1100" cy="815.047" r="328.046" />

												<radialGradient id="SVGID_00000123438996930488595010000002696201408001185471_"
													cx="965.7524" cy="1455.6234" r="674.9591" gradientUnits="userSpaceOnUse">
													<stop offset="0" style="stop-color:#FFFFFF" />
													<stop offset="0.9989" style="stop-color:#D1D1D1" />
												</radialGradient>
												<path
													style="fill:url(#SVGID_00000123438996930488595010000002696201408001185471_);"
													d="M1679.9,1655.44 C1533.74,1808.01,1327.96,1903,1100,1903s-433.74-94.99-579.9-247.56c82.54-240.93,311-414.12,579.9-414.12 S1597.36,1414.51,1679.9,1655.44z" />
											</g>
										</g>
									</svg>
								</button>
							</div>

							<div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
								id="dropdown-2">
								<div class="py-3 px-4" role="none">
									<p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
										Usuario: miguechuc
									</p>
								</div>
								<ul class="py-1" role="none">
									<li>
										<a href="#"
											class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
											role="menuitem">Cambio de contraseña</a>
									</li>
									<li>
										<a href="#"
											class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
											role="menuitem">Cerrar Sesion</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<?php
	}

	public function asideInicio() {
		// Aside content
		?>
		<aside id="sidebar"
			class="flex hidden fixed top-0 left-0 z-20 flex-col flex-shrink-0 pt-16 w-64 h-full duration-300 lg:flex transition-width">
			<div
				class="flex relative flex-col flex-1 pt-0 min-h-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
				<div class="flex overflow-y-auto flex-col flex-1 pt-5 pb-4 overflow-hidden">
					<div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
						<ul class="pb-2 space-y-2">
							<li>
								<a href="vista.php?ruta=menu"
									class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
									<svg class="flex-shrink-0 w-6 h-6 text-red-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
										fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
										</path>
									</svg>
									<span
										class="sidebar-text ml-3 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
										sidebar-toggle-item>INICIO</span>
								</a>
							</li>
							<?php
	}
	public function asideFinal() {
		// Aside content
		?>
						</ul>
						<div class="pt-2 space-y-2">
							<a href="https://flowbite.com/docs/getting-started/introduction/" target="_blank"
								class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
								<svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
									fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
									<path fill-rule="evenodd"
										d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
										clip-rule="evenodd"></path>
								</svg>
								<span class="sidebar-text ml-3" sidebar-toggle-item>Docs</span>
							</a>
						</div>
					</div>
				</div>
				<div class="hidden relative bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex" sidebar-bottom-menu>
					<a href="../../users/settings/" data-tooltip-target="tooltip-settings"
						class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
								clip-rule="evenodd"></path>
						</svg>
					</a>
					<div id="tooltip-settings" role="tooltip"
						class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
						Settings page
						<div class="tooltip-arrow" data-popper-arrow></div>
					</div>
				</div>
			</div>
		</aside>
		<script>
			$(document).ready(function () {
				// Recuperar estado del sidebar del localStorage
				const isSidebarCollapsed = localStorage.getItem('sidebarState') === 'true';

				// Función para aplicar clases según el tamaño de pantalla
				function updateSidebarClasses() {
					const sidebar = $('#sidebar');
					const mainContent = $('#main-content');
					const sidebarTexts = $('.sidebar-text');
					const isLargeScreen = window.matchMedia('(min-width: 1024px)').matches;

					if (isLargeScreen) {
						// En pantallas lg o mayores
						if (isSidebarCollapsed) {
							sidebar.addClass('lg:w-16').removeClass('lg:w-64');
							mainContent.addClass('lg:ml-16').removeClass('lg:ml-64');
							sidebarTexts.addClass('lg:opacity-0');
						} else {
							sidebar.addClass('lg:w-64').removeClass('lg:w-16');
							mainContent.addClass('lg:ml-64').removeClass('lg:ml-16');
							sidebarTexts.removeClass('lg:opacity-0');
						}
					}

					// Asegurar que siempre tenga w-64 en pantallas pequeñas
					sidebar.addClass('w-64');
				}

				// Aplicar estado inicial
				updateSidebarClasses();

				// Toggle para desktop (lg y mayor)
				$('#toggleSidebar').on('click', function () {
					const sidebar = $('#sidebar');
					const mainContent = $('#main-content');
					const sidebarTexts = $('.sidebar-text');

					if (sidebar.hasClass('lg:w-64')) {
						// Colapsar sidebar
						sidebar.addClass('lg:w-16').removeClass('lg:w-64');
						mainContent.addClass('lg:ml-16').removeClass('lg:ml-64');
						sidebarTexts.addClass('lg:opacity-0');
						localStorage.setItem('sidebarState', 'true');
					} else {
						// Expandir sidebar
						sidebar.addClass('lg:w-64').removeClass('lg:w-16');
						mainContent.addClass('lg:ml-64').removeClass('lg:ml-16');
						sidebarTexts.removeClass('lg:opacity-0');
						localStorage.setItem('sidebarState', 'false');
					}
				});

				// Toggle para mobile
				$('#toggleSidebarMobile').on('click', function () {
					const sidebar = $('#sidebar');
					const backdrop = $('#sidebarBackdrop');
					const hamburgerIcon = $('#toggleSidebarMobileHamburger');
					const closeIcon = $('#toggleSidebarMobileClose');

					sidebar.toggleClass('hidden');
					backdrop.toggleClass('hidden');
					hamburgerIcon.toggleClass('hidden');
					closeIcon.toggleClass('hidden');
				});

				// Cerrar al hacer clic en el backdrop
				$('#sidebarBackdrop').on('click', function () {
					const sidebar = $('#sidebar');
					const backdrop = $('#sidebarBackdrop');
					const hamburgerIcon = $('#toggleSidebarMobileHamburger');
					const closeIcon = $('#toggleSidebarMobileClose');

					sidebar.addClass('hidden');
					backdrop.addClass('hidden');
					hamburgerIcon.removeClass('hidden');
					closeIcon.addClass('hidden');
				});

				// Hover effect para desktop
				if (window.matchMedia('(min-width: 1024px)').matches) {
					$('#sidebar').hover(
						function () {
							if ($(this).hasClass('lg:w-16')) {
								$(this).addClass('lg:w-64').removeClass('lg:w-16');
								$('.sidebar-text').removeClass('lg:opacity-0');
							}
						},
						function () {
							if (localStorage.getItem('sidebarState') === 'true') {
								$(this).addClass('lg:w-16').removeClass('lg:w-64');
								$('.sidebar-text').addClass('lg:opacity-0');
							}
						}
					);
				}

				// Actualizar clases cuando cambie el tamaño de la ventana
				$(window).on('resize', function () {
					updateSidebarClasses();
				});
			});
		</script>

		<?php
	}
	public function menuCaja() {
		?>
		<li>
			<button type="button"
				class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
				aria-controls="dropdown_caja" data-collapse-toggle="dropdown_caja">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
					class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
					<path
						d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
					<path fill-rule="evenodd"
						d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z"
						clip-rule="evenodd" />
				</svg>

				<span class="sidebar-text ml-3 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
					:class="{ 'opacity-0': isSidebarCollapsed, 'opacity-100': !isSidebarCollapsed }"
					sidebar-toggle-item>Caja</span>
				<svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
			<ul id="dropdown_caja" class="hidden">
                <hr>
                <li>
					<a href="vista.php?ruta=caja_index"
						class="sidebar-text flex items-center p-1 pl-4 text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class="transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Inicio</span>
					</a>
				</li>
				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4 text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class="transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Efetivo enviado a cajero</span>
					</a>
				</li>
				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4  text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class=" transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Pago de Préstamo Efectivo</span>
					</a>
				</li>
				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4 text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class=" transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Pago de Préstamo Transferencia</span>
					</a>
				</li>

				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4 text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class="transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Deposito</span>
					</a>
				</li>

				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4 text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class="transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Retiro</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
	}
	public function menuCajaGeneral() {
		?>
		<li>
			<button type="button"
				class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
				aria-controls="dropdown_CajaGeneral" data-collapse-toggle="dropdown_CajaGeneral">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
					class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
					<path fill-rule="evenodd"
						d="M3.75 3.375c0-1.036.84-1.875 1.875-1.875H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375Zm10.5 1.875a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25ZM12 10.5a.75.75 0 0 1 .75.75v.028a9.727 9.727 0 0 1 1.687.28.75.75 0 1 1-.374 1.452 8.207 8.207 0 0 0-1.313-.226v1.68l.969.332c.67.23 1.281.85 1.281 1.704 0 .158-.007.314-.02.468-.083.931-.83 1.582-1.669 1.695a9.776 9.776 0 0 1-.561.059v.028a.75.75 0 0 1-1.5 0v-.029a9.724 9.724 0 0 1-1.687-.278.75.75 0 0 1 .374-1.453c.425.11.864.186 1.313.226v-1.68l-.968-.332C9.612 14.974 9 14.354 9 13.5c0-.158.007-.314.02-.468.083-.931.831-1.582 1.67-1.694.185-.025.372-.045.56-.06v-.028a.75.75 0 0 1 .75-.75Zm-1.11 2.324c.119-.016.239-.03.36-.04v1.166l-.482-.165c-.208-.072-.268-.211-.268-.285 0-.113.005-.225.015-.336.013-.146.14-.309.374-.34Zm1.86 4.392V16.05l.482.165c.208.072.268.211.268.285 0 .113-.005.225-.015.336-.012.146-.14.309-.374.34-.12.016-.24.03-.361.04Z"
						clip-rule="evenodd" />
				</svg>
				<span class="sidebar-text ml-3 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
					:class="{ 'opacity-0': isSidebarCollapsed, 'opacity-100': !isSidebarCollapsed }" sidebar-toggle-item>Caja
					General</span>

				<svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
			<ul id="dropdown_CajaGeneral" class="hidden">
                <hr>
				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4 text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class="transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Efetivo enviado a cajero</span>
					</a>
				</li>
				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4 text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class="transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Products</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
	}
	public function menuCreditos() {
		?>
		<li>
			<button type="button"
				class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
				aria-controls="dropdown_Creditos" data-collapse-toggle="dropdown_Creditos">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
					class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
					<path fill-rule="evenodd"
						d="M19.5 21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3h-5.379a.75.75 0 0 1-.53-.22L11.47 3.66A2.25 2.25 0 0 0 9.879 3H4.5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h15ZM9 12.75a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 0-1.5H9Z"
						clip-rule="evenodd" />
				</svg>

				<span class="sidebar-text ml-3 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
					:class="{ 'opacity-0': isSidebarCollapsed, 'opacity-100': !isSidebarCollapsed }"
					sidebar-toggle-item>Creditos</span>
				<svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
			<ul id="dropdown_Creditos" class="hidden">
                <hr>
				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4  text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class=" transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Carga Archivo</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
	}

	public function menuClientes() {
		?>
		<li>
			<button type="button"
				class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
				aria-controls="dropdown_Clientes" data-collapse-toggle="dropdown_Clientes">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
					class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
					<path fill-rule="evenodd"
						d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
						clip-rule="evenodd" />
					<path
						d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
				</svg>

				<span class="sidebar-text ml-3 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
					:class="{ 'opacity-0': isSidebarCollapsed, 'opacity-100': !isSidebarCollapsed }"
					sidebar-toggle-item>Clientes</span>
				<svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
			<ul id="dropdown_Clientes" class="hidden">
                <hr>
				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4  text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class=" transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>-Carga Archivo</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
	}

	public function menuUsuarios() {
		?>
		<li>
			<button type="button"
				class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
				aria-controls="dropdown_Usuarios" data-collapse-toggle="dropdown_Usuarios">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
					class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
					<path
						d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
				</svg>

				<span class="sidebar-text ml-3 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
					:class="{ 'opacity-0': isSidebarCollapsed, 'opacity-100': !isSidebarCollapsed }"
					sidebar-toggle-item>Usuarios</span>
				<svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
			<ul id="dropdown_Usuarios" class="hidden">
                <hr>
				<li>
					<a href="./e-commerce/products.html"
						class="sidebar-text flex items-center p-1 pl-4  text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
						sidebar-toggle-item><span
							class=" transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
							sidebar-toggle-item>- Mantenimiento</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
	}

	public function menus() {
		$this->asideInicio();
		if ( $this->acceso( 'caja' ) ) {
			$this->menuCaja(); //mostrar menu caja
		}
		if ( $this->acceso( 'caja' ) ) {
			$this->menuCajaGeneral(); //mostrar menu caja
		}
		if ( $this->acceso( 'caja' ) ) {
			$this->menuCreditos(); //mostrar menu caja
		}
		if ( $this->acceso( 'caja' ) ) {
			$this->menuClientes(); //mostrar menu caja
		}
		if ( $this->acceso( 'caja' ) ) {
			$this->menuUsuarios(); //mostrar menu caja
		}
		$this->asideFinal();
	}
}
