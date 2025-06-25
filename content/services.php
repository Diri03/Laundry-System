<?php
    if (strtolower($rowLevel['level_name']) == 'leader') {
        header("location:home.php?access=denied");
        exit;
    }

    $query = mysqli_query($conn, "SELECT * FROM type_of_service WHERE deleted_at is NULL ORDER BY id DESC");
    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id_services = $_GET['delete'];
        mysqli_query($conn, "UPDATE type_of_service SET deleted_at = NOW() WHERE id = '$id_services'");
        header("location:?page=services&remove=success");
    }
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Type of Service</h5>
                <div class="table-responsive">
                    <?php if (strtolower($rowLevel['level_name']) == 'administrator') { ?>
                    <div class="mb-3" align="right">
                        <a href="?page=add-services" class="btn btn-primary">Add</a>
                    </div>
                    <?php } ?>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <?php if (strtolower($rowLevel['level_name']) == 'administrator') { ?>
                                <th></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $key => $data) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $data['service_name']; ?></td>
                                    <td><?php echo rupiah($data['price']); ?></td>
                                    <td><?php echo $data['description']; ?></td>
                                    <?php if (strtolower($rowLevel['level_name']) == 'administrator') { ?>
                                    <td>
                                        <a href="?page=add-services&edit=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Are you sure?')" href="?page=services&delete=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>


