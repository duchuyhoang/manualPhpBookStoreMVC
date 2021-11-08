<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.5.4/sifter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.css" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" type="text/css" href="./css/base.css">

    <title>Document</title>
</head>
<?php
require dirname(__FILE__) . "/../../shared/constants.php";
require dirname(__FILE__) . "/../../shared/actionsType.php";
$tab = isset($_GET["tab"]) ? $_GET["tab"] : "";
?>

<!-- <?php var_dump($ListCategory) ?> -->

<body>

    <section class="sidebar" id="sidebar">
        <div class="sidebarItem <?php echo $tab == "" || $tab == $ADD_PRODUCT ? "sidebarItemActive" : "" ?>">
            <!-- onclick="openTab(event,'<?php echo $ADD_PRODUCT ?>')" -->

            <a href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$ADD_PRODUCT}" ?>'>
                <i class="fas fa-plus fa-lg"></i>
            </a>
        </div>
        <div class="sidebarItem <?php echo $tab == $EDIT_PRODUCT ? "sidebarItemActive" : "" ?>">
            <!-- onClick="openTab(event,'<?php echo $EDIT_PRODUCT ?>')" -->
            <a href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$EDIT_PRODUCT}" ?>'>
                <i class="fas fa-edit fa-lg"></i>
            </a>
        </div>
        <div class="sidebarItem <?php echo $tab == $ADD_USER ? "sidebarItemActive" : "" ?>">
            <!-- onClick="openTab(event,'<?php echo $ADD_USER ?>')" -->

            <a href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$ADD_USER}" ?>'>
                <i class="fas fa-users fa-lg"></i>
            </a>
        </div>
        <div class="sidebarItem <?php echo $tab == $EDIT_USER ? "sidebarItemActive" : "" ?>">
            <!-- onClick="openTab(event,'<?php echo $EDIT_USER ?>')" -->
            <a href='<?php echo getCurrentUrl($_SERVER['REQUEST_URI']) . "?tab={$EDIT_USER}" ?>'>
                <i class="fas fa-user-edit fa-lg"></i>
            </a>
        </div>
        <div class="sidebarItem" onClick="openTab(event,'manufacture')">
            <i class="fas fa-industry fa-lg"></i>
        </div>

        <div class="sidebarItem" onClick="openTab(event,'orders')">
            <i class="fas fa-file-invoice-dollar fa-lg"></i>
        </div>


    </section>



    <section id="adminContent">

        <?php require dirname(__FILE__) . "/AdminAddProduct.php" ?>
        </div>


        <div id=<?php echo $EDIT_PRODUCT ?> class="<?php echo $tab == $EDIT_PRODUCT ? "active" : "" ?>">
            edit product
        </div>
        <div id=<?php echo $ADD_USER ?> class="<?php echo $tab == $ADD_USER ? "active" : "" ?>"></div>
        <div id=<?php echo $EDIT_USER ?> class="<?php echo $tab == $EDIT_USER ? "active" : "" ?>"></div>
        <div id="manufacture"></div>
        <div id="orders"></div>

    </section>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.min.js"></script>

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