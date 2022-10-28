<?php include 'header.php' ?>
<h1 style="margin-left: 26%; margin-top: 1%; margin-bottom: 1%">Login</h1>
<div class="container mb-5">
    <form id="loginForm" action="actions/login.php" method="post" style="margin-inline: 20%">
        <input class="form-control mb-2 pt-2" type="email" name="email" id="email" placeholder="Enter Your Email"
               required autocomplete="off">
        <input class="form-control mb-2 pt-2" type="password" name="password" id="password"
               placeholder="Enter Your Password" required autocomplete="off">
        <button id="login" class="btn btn-primary px-5 form-control">Login</button>
    </form>
</div>
<?php include 'footer.php' ?>
