<?php
    if (isset($_GET['edit'])) {
        $id_level = $_GET['edit'];
        $title = "Edit";
        $query = mysqli_query($conn, "SELECT * FROM level WHERE id = '$id_level'");
        $row = mysqli_fetch_assoc($query);
        $level_form = $row['level_name'];

        if (isset($_POST['level_name'])) {
            $level = $_POST['level_name'];
            mysqli_query($conn, "UPDATE level SET level_name = '$level' WHERE id = '$id_level'");
            header("location:?page=level&change=success");
        }
    } else {
        $title = "Add";
        $level_form = "";
        
        if (isset($_POST['level_name'])) {
            $level = $_POST['level_name'];
            mysqli_query($conn, "INSERT INTO level (level_name) VALUES ('$level')");
            header("location:?page=level&add=success");
        }

    }
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $title; ?> Level</h5>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Level Name</label>
                        <input type="text" name="level_name" id="" class="form-control" placeholder="Enter your level name" value="<?php echo $level_form; ?>" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>