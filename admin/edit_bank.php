<?php
include('../includes/connection.php');
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM bank where user_id='$id'");
$num_row = mysqli_num_rows($sql);
if ($num_row == 1) {
    $row = mysqli_fetch_assoc($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Bootstrap Core CSS -->

</head>

<body>
    <form action="#" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
            <?php if ($num_row == 1) { ?>
                <div class="row">

                    <div class="form-group">

                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $id;  ?>" readonly="true" />
                        <input type="hidden" class="form-control" name="num_row" value="<?php echo $num_row;  ?>" readonly="true" />
                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">Bank Name </label>

                        <input class="form-control" required name="bank_name" value="<?php echo $row['bank_name'] ?>" type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">Account Holder Name </label>

                        <input class="form-control" required name="account_holder_name" value="<?php echo $row['account_holder_name'] ?>" type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">Account Number</label>

                        <input class="form-control" required name="account_number" value="<?php echo $row['account_number'] ?>" type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">IFSC</label>

                        <input class="form-control" required name="ifsc" value="<?php echo $row['ifsc'] ?>" type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">Branch Name </label>

                        <input class="form-control" name="branch_name" required value="<?php echo $row['branch_name'] ?>" type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">USDT </label>

                        <input class="form-control" name="usdt" value="<?php echo $row['usdt'] ?>" type="text">

                    </div>
                </div>
            <?php } else {  ?>

                <div class="row">

                    <div class="form-group">

                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $id;  ?>" readonly="true" />
                        <input type="hidden" class="form-control" name="num_row" value="<?php echo $num_row;  ?>" readonly="true" />

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">Bank Name </label>

                        <input class="form-control" required name="bank_name"  type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">Account Holder Name </label>

                        <input class="form-control" required name="account_holder_name"  type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">Account Number</label>

                        <input class="form-control" required name="account_number"  type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">IFSC</label>

                        <input class="form-control" required name="ifsc" type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">Branch Name </label>

                        <input class="form-control" name="branch_name" required  type="text">

                    </div>
                    <div class="col-md-12">

                        <label class="col-form-label">USDT </label>

                        <input class="form-control" name="usdt"  type="text">

                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="modal-footer">


            <button type="submit" class="btn btn-success" name="submit">Submit</button>

        </div>
    </form>
</body>

</html>