<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ??'Mi sitio web' ?></title>
     <link rel="shortcut icon" href="ruta/a/tu/favicon.ico" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
  <div class="mb-8">
   <?php require resource_path('partials/navbar.php'); ?>
  </div>

    <div class="container mx-auto p-4">
