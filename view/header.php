<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINCOOP</title>
    <?php
    include_once 'app/app.php';
    include_once 'view/app.php';
    $app = new App();
    ?>
</head>

<body class="bg-gray-50 dark:bg-gray-800">
    <?php
    $app->nav();
    ?>
    <div class="flex overflow-hidden pt-16 bg-gray-50 dark:bg-gray-900">
        <?php
        $app->menus();
        ?>
        <div class="hidden fixed inset-0 z-10 bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
        <div id="main-content" class="overflow-y-auto relative w-full h-full bg-gray-50 lg:ml-64 transition-all duration-300 dark:bg-gray-900">
