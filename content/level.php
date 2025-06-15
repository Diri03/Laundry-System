<?php
    $query = mysqli_query($conn, "SELECT * FROM level ORDER BY id DESC");
    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id_level = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM level WHERE id = '$id_level'");
        header("location:?page=level&remove=success");
    }
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Level</h5>
                <div class="table-responsive">
                    <div class="mb-3" align="right">
                        <a href="?page=add-level" class="btn btn-primary">Add</a>
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Level</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $key => $data) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $data['level_name']; ?></td>
                                    <td>
                                        <a href="?page=add-level&edit=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>
                                        <a onclick="return alert('Are you sure?');" href="?page=level&delete=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
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


