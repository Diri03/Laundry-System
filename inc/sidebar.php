<?php
    $id_level = $_SESSION['ID_LEVEL'];
    $queryLevel = mysqli_query($conn, "SELECT * FROM level WHERE id = '$id_level'");
    $rowLevel = mysqli_fetch_assoc($queryLevel);
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text menu-text fw-semibold ms-2">Laundry System</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-inline-block align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
    <!-- Dashboards -->
        <li class="menu-item">
            <a href="?page=dashboard" class="menu-link">
                <i class="menu-icon icon-base ri ri-home-smile-line"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        
        <!-- Layouts -->
        <?php if (strtolower($rowLevel['level_name']) == 'administrator' || strtolower($rowLevel['level_name']) == 'operator') { ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ri ri-database-2-line"></i>
                    <div data-i18n="Master Data">Master Data</div>
                </a>
                
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="?page=customer" class="menu-link">
                            <div data-i18n="Customer">Customer</div>
                        </a>
                    </li>
                <li class="menu-item">
                    <a href="?page=services" class="menu-link">
                        <div data-i18n="Services">Services</div>
                    </a>
                </li>
                <?php if (strtolower($rowLevel['level_name']) == 'administrator') { ?>
                <li class="menu-item">
                    <a href="?page=level" class="menu-link">
                        <div data-i18n="Level">Level</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?page=user" class="menu-link">
                        <div data-i18n="User">User</div>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>

        <!-- Report -->
        <?php if (strtolower($rowLevel['level_name']) == 'leader' || strtolower($rowLevel['level_name']) == 'administrator') { ?>
            <li class="menu-item">
                <a href="?page=report" class="menu-link">
                    <i class="menu-icon icon-base ri ri-newspaper-line"></i>
                    <div data-i18n="Report">Report</div>
                </a>
            </li>
        <?php } ?>

        <?php if (strtolower($rowLevel['level_name']) == 'administrator' || strtolower($rowLevel['level_name']) == 'operator') { ?>
            <!-- Transaction -->
            <li class="menu-header mt-7">
                <span class="menu-header-text">Transaction</span>
            </li>
            <li class="menu-item">
                <a href="?page=order" class="menu-link">
                    <i class="menu-icon icon-base ri ri-receipt-line"></i>
                    <div data-i18n="Order">Order</div>
                </a>
            </li>
        <?php } ?>
    </ul>
</aside>