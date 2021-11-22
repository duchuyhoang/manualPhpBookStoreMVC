<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.5.4/sifter.min.js">
    </script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js">
    </script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js">
    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.css"
        crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <!-- <link rel="stylesheet" type="text/css" href="./css/header.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/adminStatistical.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">
    </script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"
        integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"
        integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Document</title>
</head>
<?php
require dirname(__FILE__) . "/../../shared/constants.php";
require dirname(__FILE__) . "/../../shared/actionsType.php";
require dirname(__FILE__) . "/../shared/Loading.php";

$tab = isset($_GET["tab"]) ? $_GET["tab"] : "";
?>



<body>

    <!-- <?php
    // require_once dirname(__FILE__) . "./../shared/" . 'Navbar.php';
?> -->


    <section class="sidebar" id="sidebar">
        <div
            class="sidebarItem <?php echo $tab == "" || $tab == $LIST_PRODUCT ? "sidebarItemActive" : "" ?>">
            <!-- onclick="openTab(event,'<?php echo $LIST_PRODUCT ?>')" -->

            <a
                href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$LIST_PRODUCT}" ?>'>
                <i class="fas fa-list"></i>
            </a>
        </div>
        <div
            class="sidebarItem <?php echo $tab == $ADD_PRODUCT ? "sidebarItemActive" : "" ?>">
            <!-- onclick="openTab(event,'<?php echo $ADD_PRODUCT ?>')" -->

            <a
                href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$ADD_PRODUCT}" ?>'>
                <i class="fas fa-plus fa-lg"></i>
            </a>
        </div>

        <div
            class="sidebarItem <?php echo $tab == $LIST_ODER ? "sidebarItemActive" : "" ?>">
            <!-- onClick="openTab(event,'<?php echo $LIST_ODER ?>')" -->
            <a
                href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$LIST_ODER}" ?>'>
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
        <div
            class="sidebarItem <?php echo $tab == $ADD_USER ? "sidebarItemActive" : "" ?>">
            <!-- onClick="openTab(event,'<?php echo $ADD_USER ?>')" -->

            <a
                href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$ADD_USER}" ?>'>
                <i class="fas fa-users fa-lg"></i>
            </a>
        </div>
        <div
            class="sidebarItem <?php echo $tab == $EDIT_USER ? "sidebarItemActive" : "" ?>">
            <!-- onClick="openTab(event,'<?php echo $EDIT_USER ?>')" -->
            <a
                href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$EDIT_USER}" ?>'>
                <i class="fas fa-user-edit fa-lg"></i>
            </a>
        </div>
        <div
            class="sidebarItem <?php echo $tab == $STATISTICAL ? "sidebarItemActive" : "" ?>">
            <a
                href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$STATISTICAL}" ?>'>
                <i class="fas fa-chart-bar fa-lg"></i>
            </a>
        </div>

        <!-- <div class="sidebarItem">
            <a href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$STATISTICAL}" ?>'>
            <i class="fas fa-chart-bar fa-lg"></i>
            </a>
        </div> -->

        <!-- <div class="sidebarItem" onClick="openTab(event,'orders')">
            <i class="fas fa-file-invoice-dollar fa-lg"></i>
        </div> -->


    </section>



    <section id="adminContent">

        <div id=<?php echo $LIST_PRODUCT ?>
            class="<?php echo  $tab== '' || $tab == $LIST_PRODUCT ? "active" : "" ?>">
            <?php
                $tab== '' || $tab == $LIST_PRODUCT ? require dirname(__FILE__) . "/AdminListProduct.php" : "";
            ?>
        </div>

        <div id=<?php echo $LIST_ODER ?>
            class="<?php echo $tab == $LIST_ODER ? "active" : "" ?>">
            <?php
            $tab == $LIST_ODER ? require dirname(__FILE__) . "/AdminListOrder.php" : "";
            ?>
        </div>
        <div id=<?php echo $ADD_PRODUCT ?>
            class="<?php echo $tab == $ADD_PRODUCT ? "active" : "" ?>">
            <?php
            $tab == $ADD_PRODUCT ? require dirname(__FILE__) . "/AdminAddProduct.php" : "";
            ?>
        </div>
        <div id=<?php echo $ADD_USER ?>
            class="<?php echo $tab == $ADD_USER ? "active" : "" ?>"></div>
        <div id=<?php echo $EDIT_USER ?>
            class="<?php echo $tab == $EDIT_USER ? "active" : "" ?>"></div>
        <div id="manufacture"></div>
        <div id="orders"></div>
        <div id=<?php echo $STATISTICAL ?>
            class="<?php echo $tab == $STATISTICAL ? "active" : "" ?>">
            <?php
            $tab == $STATISTICAL ? require dirname(__FILE__) . "/AdminStatistical.php" : "";
            ?>
        </div>



        <!-- <div id="statistical"></div> -->

    </section>


</body>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.min.js">
</script>
<script>
// function reset() {
//     console.log("hello");
//     $("#addBookForm").trigger('reset');
//     $select.clear();
//     $newBookManufactureSelect.clear();
//     $newBookCategorySelect.clear();
// }
</script>

</html>