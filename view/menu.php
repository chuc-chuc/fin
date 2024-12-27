<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php
    include_once 'app/app.php';
    ?>
</head>

<body class="bg-gray-50 dark:bg-gray-800">
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
                        <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="./" class="flex mr-14">
                        <img src="images/logo.svg" class="mr-3 h-8" alt="FlowBite Logo" />
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="
                                images/users/neil-sims.png"
                                    alt="user photo" />
                            </button>
                        </div>

                        <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-2">
                            <div class="py-3 px-4" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    Neil Sims
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    neil.sims@flowbite.com
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex overflow-hidden pt-16 bg-gray-50 dark:bg-gray-900">
        <aside id="sidebar"
            class="flex hidden fixed top-0 left-0 z-20 flex-col flex-shrink-0 pt-16 w-64 h-full duration-300 lg:flex transition-width">
            <div
                class="flex relative flex-col flex-1 pt-0 min-h-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex overflow-y-auto flex-col flex-1 pt-5 pb-4 overflow-hidden">
                    <div
                        class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        <ul class="pb-2 space-y-2">
                            <li>
                                <a href="./kanban.html"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                        </path>
                                    </svg>
                                    <span
                                        class="sidebar-text ml-3 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
                                        sidebar-toggle-item>Kanban</span>
                                </a>
                            </li>
                            <li>
                                <button type="button"
                                    class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                    aria-controls="dropdown-ecommerce" data-collapse-toggle="dropdown-ecommerce">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span
                                        class="sidebar-text ml-3 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
                                        :class="{ 'opacity-0': isSidebarCollapsed, 'opacity-100': !isSidebarCollapsed }"
                                        sidebar-toggle-item>E-commerce</span>
                                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <ul id="dropdown-ecommerce" class="hidden py-2 space-y-2">
                                    <li>
                                        <a href="./e-commerce/products.html"
                                            class="sidebar-text flex items-center p-2 pl-11 text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                            sidebar-toggle-item><span
                                                class="pl-10 transition-opacity duration-300 whitespace-nowrap group-hover:opacity-100"
                                                sidebar-toggle-item>Products</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
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
                <div class="hidden relative bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex"
                    sidebar-bottom-menu>
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

        <div class="hidden fixed inset-0 z-10 bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
        <div id="main-content" class="overflow-y-auto relative w-full h-full bg-gray-50 lg:ml-64 transition-all duration-300 dark:bg-gray-900">
            <main>

                <div class="px-4 pt-6">
                    hola
                </div>
            </main>
            <p class="my-10 text-sm text-center text-gray-500">
                &copy; 2019-2022
                <a href="https://flowbite.com/" class="hover:underline" target="_blank">Flowbite.com</a>. All rights
                reserved.
            </p>
        </div>
    </div>
    <script>
        $(document).ready(function() {
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
            $('#toggleSidebar').on('click', function() {
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
            $('#toggleSidebarMobile').on('click', function() {
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
            $('#sidebarBackdrop').on('click', function() {
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
                    function() {
                        if ($(this).hasClass('lg:w-16')) {
                            $(this).addClass('lg:w-64').removeClass('lg:w-16');
                            $('.sidebar-text').removeClass('lg:opacity-0');
                        }
                    },
                    function() {
                        if (localStorage.getItem('sidebarState') === 'true') {
                            $(this).addClass('lg:w-16').removeClass('lg:w-64');
                            $('.sidebar-text').addClass('lg:opacity-0');
                        }
                    }
                );
            }

            // Actualizar clases cuando cambie el tamaño de la ventana
            $(window).on('resize', function() {
                updateSidebarClasses();
            });
        });
    </script>
</body>

</html>