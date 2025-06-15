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
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ri ri-home-smile-line"></i>
                <div data-i18n="Dashboards">Dashboards</div>
                <!-- <div class="badge text-bg-danger rounded-pill ms-auto">5</div> -->
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
                        <div data-i18n="Analytics">Analytics</div>
                    </a>
                </li>
            </ul>
        </li>

    <!-- Layouts -->
    <li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon icon-base ri ri-database-2-fill"></i>
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
        </ul>
    </li>

    <!-- Transaction -->
    <li class="menu-header mt-7">
        <span class="menu-header-text">Transaction</span>
    </li>
    <li class="menu-item">
        <a href="?page=order" class="menu-link">
            <i class="menu-icon icon-base ri ri-mail-open-line"></i>
            <div data-i18n="Order">Order</div>
            <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
        </a>
    </li>
    <li class="menu-item">
        <a
        href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/html/vertical-menu-template/app-chat.html"
        class="menu-link">
            <i class="menu-icon icon-base ri ri-wechat-line"></i>
            <div data-i18n="Chat">Chat</div>
            <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
        </a>
    </li>
    </ul>
</aside>