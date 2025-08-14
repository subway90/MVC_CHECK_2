<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/file/system/favicon.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title><?= $title ? $title : WEB_NAME ?></title>
</head>

<?= toast_show() // Hiện thị toast nếu có ?>

<body>


<div class="container d-flex justify-content-center gap-2 gap-lg-3 mt-4 mt-lg-2">
    <div class="col-3 col-lg-1 my-auto text-end">
        <img class="w-75" src="<?= URL_STORAGE ?>system/favicon.png" alt="">
    </div>
    <div class="col-3 col-lg-2 my-auto">
        <img class="w-100" src="<?= URL_STORAGE ?>system/quananngon.png" alt="">
    </div>
    <div class="col-3 col-lg-1 my-auto">
        <img class="w-75" src="<?= URL_STORAGE ?>system/saigonngon.jpg" alt="">
    </div>
    <div class="col-3 col-lg-1 my-auto text-start">
        <img class="w-75" src="<?= URL_STORAGE ?>system/ngongarden.png" alt="">
    </div>
</div>