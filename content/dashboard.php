<?php
    $queryUser = mysqli_query($conn, "SELECT * FROM user");
    $countUser = mysqli_num_rows($queryUser);
?>

<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
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