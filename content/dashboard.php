<?php
    $queryUser = mysqli_query($conn, "SELECT * FROM user");
    $countUser = mysqli_num_rows($queryUser);

    $id = $_SESSION['ID_USER'];
    $queryLogin = mysqli_query($conn, "SELECT user.*, level.level_name FROM user LEFT JOIN level ON user.id_level = level.id WHERE user.id = '$id'");
    $rowLogin = mysqli_fetch_assoc($queryLogin);
?>

<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" align="center">Dashboard</h3>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" align="center">Account Login</h5>
                                    <div style="text-align: justify">
                                        Name : <?php echo $rowLogin['name']; ?><br>
                                        Level : <?php echo $rowLogin['level_name']; ?><br>
                                        Email : <?php echo $rowLogin['email']; ?><br>
                                        Login Date : <?php echo date('d F Y'); ?><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" align="center">Data User</h5>
                                    <h1 align="center"><?php echo $countUser; ?></h1>
                                    <div class="mb-3" align="center">
                                        <a href="?page=user" class="btn btn-primary">More Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>