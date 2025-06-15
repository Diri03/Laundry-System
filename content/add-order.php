<?php
    $queryC = mysqli_query($conn, "SELECT * FROM customer WHERE deleted_at is NULL ORDER BY id DESC");
    $rowsC = mysqli_fetch_all($queryC, MYSQLI_ASSOC);

    if (isset($_GET['edit'])) {
        $id_order = $_GET['edit'];
        $title = "Edit";
        $query = mysqli_query($conn, "SELECT * FROM trans_order  WHERE id = '$id_order'");
        $row = mysqli_fetch_assoc($query);
        $code_form = $row['order_code'];
        $customer_form = $row['id_customer'];
        $date_form = $row['order_date'];
        $end_date_form = $row['order_end_date'];

        if (isset($_POST['customer_name'])) {
            $id_level = $_POST['id_level'];
            $name = $_POST['customer_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            mysqli_query($conn, "UPDATE customer SET customer_name = '$name', phone = '$phone', address = '$address' WHERE id = '$id_customer'");
            header("location:?page=customer&change=success");
        }
    } else {
        $title = "Add";
        $customer_form = "";
        $date_form = "";
        $end_date_form = "";

        $queryO = mysqli_query($conn, "SELECT * FROM trans_order");
        if (mysqli_num_rows($queryO) == 0) {
            $code_form = "#" . "1";
        } else {
            $rowO = mysqli_fetch_assoc($queryO);
            $code_form = "#" . $rowO['id'] + 1;
        }
        
        if (isset($_POST['customer_name'])) {
            $id_level = $_POST['id_level'];
            $name = $_POST['customer_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            mysqli_query($conn, "INSERT INTO customer (customer_name, phone, address) VALUES ('$name', '$phone', '$address')");
            header("location:?page=customer&add=success");
        }

    }
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $title; ?> Order</h5>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input readonly type="text" name="order_code" id="code" class="form-control" value="<?php echo $code_form; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="order_date" id="date" class="form-control" value="<?php echo $date_form; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <select name="id_customer" id="name" class="form-control" required>
                                    <option value="">Choose Customer</option>
                                    <?php foreach ($rowsC as $key => $data) { ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['customer_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" name="order_end_date" id="end_date" class="form-control" value="<?php echo $end_date_form; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>