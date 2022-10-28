<?php
include 'header.php';
$item_id = isset($_GET['id']) ? $_GET['id'] : "";
$data = array();
if ($item_id != "") {
    include('actions/connection.php');
    $q = 'SELECT * FROM DATA WHERE(ID=' . $item_id . ')';
    $data = $con->query($q)->fetch_assoc();
}
?>
    <div id="body">
        <div class="card-body">
            <h5 class="card-title m-10" style="text-align: center; font-size: 23pt;">
                <?php echo(($item_id != '') ? 'Edit User' : 'User Registration') ?>
                Form</h5>
            <div class="container mt-2">
                <form id="form" data-smk-icon="glyphicon-remove-sign">

                    <input type="hidden" name="user_id" value="<?php echo $item_id ?>">
                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input type="text" value="<?php
                        echo(isset($data['FIRST_NAME']) ? $data['FIRST_NAME'] : '');
                        ?>" name="firstName"
                               class="form-control" data-smk-pattern="^[a-zA-Z\s]{3,}$" data-smk-msg="Required field"
                               placeholder="First Name" id="firstName" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="lastName" class="control-label">Last Name</label>
                        <input type="text" value="<?php
                        echo(isset($data['LAST_NAME']) ? $data['LAST_NAME'] : '');
                        ?>" name="lastName" placeholder="Last Name" class="form-control" id="lastName" minlength="4"
                               maxlength="16" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="control-label">Email address</label>
                        <input type="email" value="<?php
                        echo(isset($data['EMAIL']) ? $data['EMAIL'] : '');
                        ?>" placeholder="anyone@example.com" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" value="<?php
                        echo(isset($data['PASSWORD']) ? $data['PASSWORD'] : '');
                        ?>" name="password" placeholder="Password" class="form-control" id="password"
                               data-smk-strongPass="medium" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirm_password" class="control-label">Confirm Password</label>
                        <input type="password" value="<?php
                        echo(isset($data['PASSWORD']) ? $data['PASSWORD'] : '');
                        ?>" name="confirm_password" placeholder="Confirm Password" class="form-control"
                               id="confirm_password"
                               data-smk-strongPass="medium" required>
                    </div>
                    <div class="row" id="images_container">

                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="control-label">Image</label>
                        <input class="form-control" type="file" name="image[]" id="image" multiple/>
                    </div>
                    <input type="submit" value="Submit" id="submitbtn" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>