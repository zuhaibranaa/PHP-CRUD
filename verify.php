<?php include 'header.php'; ?>
    <h1 class="mx-3 mt-2">Kindly Verify Your Identity</h1>
    <form id="verificationForm" class="m-3">
        <input class="form-control mb-2" type="email" name="email" id="email" placeholder="Enter Your Email" required>
        <input class="form-control mb-2" type="number" name="token" id="token"
               placeholder="Enter Your Verification Token" required>
        <button id="verify" class="btn btn-primary">Verify</button>
    </form>
    <script src="scripts/verify.js"></script>
<?php include 'footer.php'; ?>