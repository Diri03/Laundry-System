<?php
    $queryC = mysqli_query($conn, "SELECT * FROM customer WHERE deleted_at is NULL ORDER BY id DESC");
    $rowsC = mysqli_fetch_all($queryC, MYSQLI_ASSOC);

    $queryS = mysqli_query($conn, "SELECT * FROM type_of_service WHERE deleted_at is NULL ORDER BY id DESC");
    $rowsS = mysqli_fetch_all($queryS, MYSQLI_ASSOC);

    if (isset($_GET['detail'])) {
        $id_order = $_GET['detail'];
        $queryOrder = mysqli_query($conn, "SELECT o.*, c.customer_name FROM trans_order o LEFT JOIN customer c ON o.id_customer = c.id WHERE o.id = '$id_order'");
        $rowOrder = mysqli_fetch_assoc($queryOrder);

        $queryD = mysqli_query($conn, "SELECT od.*, s.* FROM trans_order_detail od LEFT JOIN type_of_service s ON od.id_service = s.id WHERE id_order = '$id_order' ORDER BY od.id DESC");
        $rowD = mysqli_fetch_all($queryD, MYSQLI_ASSOC);
    }

    if (isset($_POST["save"])) {
        $id_customer = $_POST['id_customer'];
        $order_code = $_POST['order_code'];
        $order_date = $_POST['order_date'];
        // $order_end_date = $_POST['order_end_date'];
        $order_status = $_POST['order_status'];

        $insert = mysqli_query($conn, "INSERT INTO trans_order (id_customer, order_code, order_date, order_status) VALUES ('$id_customer', '$order_code', '$order_date', '$order_status')");
        if ($insert) {
            $id_order = mysqli_insert_id($conn);
            for ($i=0; $i < count($_POST['id_service']); $i++) { 
                $id_service = $_POST['id_service'][$i];
                $qty = $_POST['qty'][$i] * 1000;
                $queryService = mysqli_query($conn, "SELECT * FROM type_of_service WHERE id = '$id_service'");
                $rowsService = mysqli_fetch_assoc($queryService);
                $subtotal = $_POST['qty'][$i] * $rowsService['price'];
                mysqli_query($conn, "INSERT INTO trans_order_detail (id_order, id_service, qty, subtotal) VALUES ('$id_order', '$id_service', '$qty', '$subtotal')");
            }
            header("location:?page=order&addition=success");
        }

    }

    if (isset($_POST['save2'])) {
        $order_pay = $_POST['order_pay'];
        $total = $_POST['total'];
        $change = $order_pay - $total;
        $now = date('Y-m-d H:i:s');
        $order_end_date = $now;
        $order_status = 1;
    }

    if (isset($_GET['edit'])) {
        $id_order = $_GET['edit'];
        $title = "Edit";
        $query = mysqli_query($conn, "SELECT * FROM trans_order  WHERE id = '$id_order'");
        $row = mysqli_fetch_assoc($query);
        $code_form = $row['order_code'];
        $customer_form = $row['id_customer'];
        $date_form = $row['order_date'];

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

        $queryO = mysqli_query($conn, "SELECT * FROM trans_order ORDER BY id DESC");
        if (mysqli_num_rows($queryO) == 0) {
            $code_form = "TR" . "1";
        } else {
            $rowO = mysqli_fetch_assoc($queryO);
            $code_form = "TR" . $rowO['id'] + 1;
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
                <?php if (isset($_GET['detail'])): ?>
                    <h5 class="card-title">Detail Order</h5>
                    <div class="table-responsive mb-3">
                        <table class="table table-stripped">
                            <tr>
                                <th>Code</th>
                                <td>:</td>
                                <td><?php echo $rowOrder['order_code']; ?></td>
                                <th>Date</th>
                                <td>:</td>
                                <td><?php echo $rowOrder['order_date']; ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>:</td>
                                <td><?php echo $rowOrder['customer_name']; ?></td>
                                <th>Status</th>
                                <td>:</td>
                                <td><?php echo $rowOrder['order_status'] == 0 ? 'Process' : 'Picked'; ?></td>
                            </tr>
                        </table>
                        <br><br>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Type of Service</th>
                                    <th>qty</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php foreach ($rowD as $key => $data) { ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $data['service_name']; ?></td>
                                        <td><?php echo $data['qty']/1000; ?></td>
                                        <td><?php echo $data['price']; ?></td>
                                        <td><?php echo $data['qty']/1000 * $data['price']; $total += $data['qty']/1000 * $data['price']; ?></td>

                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td><?php echo $total; ?></td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>

                    <div class="mb-3" align="center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Buy
                        </button>
                    </div>

                <?php else: ?>
                    <h5 class="card-title">Add Order</h5>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <input readonly type="text" id="code" class="form-control" value="<?php echo $code_form; ?>" required>
                                    <input type="hidden" name="order_code" value="<?php echo $code_form; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="date_end" class="form-label">Date End</label>
                                    <input type="date" name="order_end_date" id="date_end" class="form-control" value="<?php echo $date_form; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Code</label>
                                    <select name="order_status" id="status" class="form-control" required>
                                        <option value="">Choose Status</option>
                                        <option value="0">Process</option>
                                        <option value="1">Picked</option>
                                    </select>
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
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" name="order_date" id="date" class="form-control" value="<?php echo $date_form; ?>" required>
                                </div>     
                            </div>
    
                            <div class="mb-3" align="right">
                                <button type="button" id="addRow" class="btn btn-primary">Add Row</button>
                            </div>
                            <div class="table-responsive mb-3">
                                <table class="table table-stripped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Type of Service</th>
                                            <th>Qty</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="save">Save</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pay Order Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input readonly type="number" step="any" id="total" class="form-control" value="<?php echo $total; ?>" required>
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pay" class="form-label">Pay</label>
                        <input type="number" step="any" min="<?php echo $total; ?>" name="order_pay" id="pay" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="save2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const button = document.querySelector('#addRow');
    const tbody = document.querySelector('#myTable tbody');
    let count = 0;

    button.addEventListener("click", function(){
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <td>
            <select name="id_service[]" class="form-control" required>
                <option value="">Choose Service</option>
                <?php foreach ($rowsS as $key => $data) { ?>
                    <option value="<?php echo $data['id']; ?>"><?php echo $data['service_name']; ?></option>
                <?php } ?>
            </select>
        </td>
        <td><input type="number" step="any" class="form-control" name="qty[]"></td>
        <td><button type="button" class="btn btn-danger delRow">Delete</button></td>
        `;
        tbody.appendChild(tr);

    });

    // Delegasi event ke tbody
    tbody.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('delRow')) {
            const tr = e.target.closest('tr');
            if (tr) {
                tr.remove(); // Hapus baris
            }
        }
    });

    function name(params) {
        
    }

</script>