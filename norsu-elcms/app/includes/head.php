<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metadata -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- end of metadata -->

    <!-- favico -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo (BASE_URL . '/assets/images/favicon/apple-touch-icon.png') ?>" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo (BASE_URL . '/assets/images/favicon/favicon-32x32.png') ?>" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo (BASE_URL . '/assets/images/favicon/favicon-16x16.png') ?>" />
    <link rel="manifest" href="<?php echo (BASE_URL . '/assets/images/favicon/site.webmanifest') ?>" />
    <link rel="mask-icon" href="<?php echo (BASE_URL . '/assets/images/favicon/safari-pinned-tab.svg') ?>"
        color="#1266f1" />
    <link rel="shortcut icon" href="<?php echo (BASE_URL . '/assets/images/favicon/favicon.ico') ?>" />
    <meta name="msapplication-TileColor" content="#1266f1" />
    <meta name="msapplication-config" content="<?php echo (BASE_URL . '/assets/images/favicon/browserconfig.xml') ?>" />
    <meta name="theme-color" content="#1266f1" />
    <!-- end of favico -->


    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- ROBOTO -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- LORA -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Montserrat -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- end of FONTS -->

    <!-- STYLESHEETS / CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?php echo (BASE_URL . '/assets/vendor/selectize/selectize.bootstrap5.css') ?>" />


    <?php if(in_array('datatables', $pagehas)):  ?>
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />
    <?php endif; ?>

    <!-- croppie -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css"
        integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <?php if(in_array('croppie', $pagehas)):  ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <?php endif; ?>

    <!-- Bootstrap 5.1.3 -->
    <link rel="stylesheet" href="<?php echo (BASE_URL . '/assets/vendor/bootstrap/bootstrap.css') ?>" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->


    <!-- Font-Awesome-Pro 6 -->
    <link rel="stylesheet" href="<?php echo (BASE_URL . '/assets/vendor/font_awesome-6pro/font-awesome.min.css') ?>" />

    <!-- Fonts used -->
    <link rel="stylesheet" href="<?php echo (BASE_URL . '/assets/styles/css/fonts.css') ?>" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo (BASE_URL . '/assets/styles/css/main.css') ?>" />


    <title><?php echo $title ?></title>
</head>
