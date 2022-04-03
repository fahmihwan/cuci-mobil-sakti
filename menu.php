<?php
if (!empty($_SESSION['id_user'])) {
    include "koneksi.php";
?>


    <!-- <div class="page-wrapper"> -->
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="./admin.php">
                <img src="images/icon/logojn.png" alt="Juwita Nusantara" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="  has-sub">
                        <a href="./admin.php">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="./admin.php?hlm=transaksi">
                            <i class="fas fa-chart-bar"></i>Transaksi</a>
                    </li>
                    <li>
                        <a href="?hlm=laporan">
                            <i class="far fa-calendar-alt"></i>Laporan</a>
                    </li>

                    <?php
                    if ($_SESSION['level'] == 1) {
                    ?>

                        <li>
                            <a href="./admin.php?hlm=biaya">
                                <i class="fas fa-table"></i>Biaya</a>
                        </li>

                        <li>
                            <a href="./admin.php?hlm=user">
                                <i class="fas fa-desktop"></i>User</a>
                        </li>

                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Data</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="./admin.php?hlm=biaya">Biaya</a>
                                </li>
                                <li>
                                    <a href="./admin.php?hlm=user">User</a>
								</li>
                            </ul>
                        </li> -->
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form></form>
                        <div class="dropdown ">
                            <button style="background-color:#f5f5f5;  " class="dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- <img src="images/icon/person.png" alt="John Doe" class="rounded rounded-pill" style="width:50px;" /> -->
                                <img src="./images/users/personal.jpg" class="rounded rounded-pill" width="50px" style="height: 50px;" alt="">

                                <span class="text-dark"> <?php echo $_SESSION['nama']; ?></span>
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1" style="width: 100%;">
                                <li><a class="dropdown-item" href="./logout.php">
                                        <i class="zmdi zmdi-power"></i> &nbsp; Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->
    </div>

    <!-- </div> -->

<?php
} else {
    header("Location: ./");
    die();
}
?>