<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <title> Basic Form ||
        <?php
        $activePage = basename($_SERVER['PHP_SELF'], ".php");
        echo $activePage;
        ?>
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/smoke.min.js"></script>
    <link rel="stylesheet" href="./css/smoke.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          integrity="sha512-fXnjLwoVZ01NUqS/7G5kAnhXNXat6v7e3M9PhoMHOTARUMCaf5qNO84r5x9AFf5HDzm3rEZD8sb/n6dZ19SzFA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<header class="d-flex justify-content-center">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?= ($activePage == 'index') ? 'active' : ''; ?>" aria-current="page">Home</a>
        </li>
        <li class="nav-item">

            <a href="records.php" class="nav-link <?= ($activePage == 'records') ? "active" : ""; ?>">All Records</a>
        </li>
        <li class="nav-item">
            <a href="verify.php" class="nav-link <?= ($activePage == 'verify') ? "active" : ""; ?>">Verify</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo(isset($_SESSION['FIRST_NAME']) ? 'logout' : 'login') ?>.php"
               class="nav-link <?php ($activePage == (isset($_SESSION['FIRST_NAME']) ? 'logout' : 'login')) ? 'active' : ''; ?>"><?php echo(isset($_SESSION['FIRST_NAME']) ? 'Logout' : 'Login') ?></a>
        </li>
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <?php if (isset($_SESSION['FIRST_NAME'])) { ?>
            <li class="nav-item">Currently Logged in
                As <?php echo($_SESSION['FIRST_NAME'] . ' ' . $_SESSION['LAST_NAME']) ?></li>
        <?php } ?>
    </ul>
</header>