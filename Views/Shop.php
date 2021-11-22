<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/Home.css">
    <link rel="stylesheet" type="text/css" href="./css/tab.css">
    <link rel="stylesheet" type="text/css" href="./css/book.css">
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <link rel="stylesheet" type="text/css" href="./css/Footer.css">
    <link rel="stylesheet" type="text/css" href="./css/Loading.css">


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.carousel.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
    <title>Document</title>


</head>

<body>
    <?php
    require_once dirname(__FILE__) . "./shared/" . 'Navbar.php';
    require_once dirname(__FILE__) . "./shared/" . 'Loading.php';
    require_once dirname(__FILE__) . "./shared/" . 'Rating.php';
    require_once dirname(__FILE__) . "./../shared/" . 'functions.php';
    ?>

    <?php
// echo '<pre>';
// print_r($data['listBook']);
// echo '</pre>';
?>

    <div class="container">
        <div class="row">
            <?php
        foreach ($data['listBook'] as $book) {
            // echo print_r($book->getListImage());
          $firstImage = isset($book->getListImage()[0]) ? $book->getListImage()[0]->getUrl() : "";;
          $actualMoney = number_format($book->getPrice());
          $bookPrice = number_format($book->getPrice() - $book->getPrice() * $book->getSale());
          $isSale = $book->getSale() !== "0";
          echo "
          <div class='col-3'>
          
            <div class='bookWrapper'>
            <div class='bookImg'>
            <div class='bookView'>
                <div class='bookIconWrapper'>
                <a href='./product?id_product={$book->getId_book()}'>
                    <i class='fas fa-search fa-1x '></i>
                </a>
                </div>

            </div>
            <img src='{$firstImage}' alt='book' />
            </div>
            <div class='bookDetail'>
            <div class='bookName'>{$book->getName()}</div>
            <div class='d-flex align-items-center'>
                <p class='bookPrice'>{$bookPrice}VND</p>".
                ($isSale ? "<p class='bookPriceActual'>{$actualMoney}VND</p>" : "").
            "</div>
            </div>
            <div class='tagContainer d-flex flex-column'>" .

                        ($isSale ?  "<div class='saleTag sale'>" . $book['sale'] * 100  . "%</div>" : "") .
                        "<div class='saleTag new'>NEW</div>
            </div>
            </div>
            </div>
            ";
        }


        ?>
        </div>
    </div>



    <?php require_once dirname(__FILE__) . "./shared/" . 'Footer.php'; ?>
</body>


<script>
let currentProduct = <?php echo $_GET["id_product"] ?>;
$("#addToCartBtn").click(() => {
    $("#loading").addClass("loadingShow");
    request = $.ajax({
        url: "./ajax/cart.php",
        type: "post",
        data: {
            submit: $("#addToCartBtn").attr("value"),
            quantity: $("#productQuantity").val(),
            id_product: currentProduct
        },
        // processData: false,
        // contentType: false,
    });

    request.done(function(response, textStatus, jqXHR) {
        $("#loading").removeClass("loadingShow");
        $.snackbar({
            content: "Add product success . Wait page reload and login",
            timeout: 5000,
            style: "customSnackbar snackbar-success"
        });
        window.location = "./myCart";
        // window.location.reload();
    });

    request.fail(function(jqXHR, textStatus, errorThrown) {
        $.snackbar({
            content: "Add Add fail!!!",
            timeout: 5000,
            style: "customSnackbar snackbar-error"
        });
        $("#loading").removeClass("loadingShow");
    });


})
</script>


</html>