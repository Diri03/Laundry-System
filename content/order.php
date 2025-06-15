<?php
    $query = mysqli_query($conn, "SELECT o.* FROM trans_order o LEFT JOIN customer c ON o.id_customer = c.id WHERE o.deleted_at is NULL ORDER BY o.id DESC");
    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id_order = $_GET['delete'];
        $now = date('Y-m-d H:i:s');
        mysqli_query($conn, "UPDATE order SET deleted_at = '$now' WHERE id = '$id_order'");
        // mysqli_query($conn, "DELETE FROM order WHERE id = '$id_order'");
        header("location:?page=order&remove=success");
    }
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Order</h5>
                <div class="table-responsive">
                    <div class="mb-3" align="right">
                        <a href="?page=add-order" class="btn btn-primary">Add</a>
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Order</th>
                                <th>End Order</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $key => $data) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $data['order_code']; ?></td>
                                    <td><?php echo $data['customer_name']; ?></td>
                                    <td><?php echo $data['order_date']; ?></td>
                                    <td><?php echo $data['order_end_date']; ?></td>
                                    <td><?php echo $data['order_status']; ?></td>
                                    <td>
                                        <a href="?page=add-order&edit=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>
                                        <a onclick="return alert('Are you sure?')" href="?page=order&delete=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>


