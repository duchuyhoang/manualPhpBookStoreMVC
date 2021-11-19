<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/header.css">

    <link rel="stylesheet" type="text/css" href="./css/Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/Loading.css">
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <link rel="stylesheet" type="text/css" href="./css/productInfo.css">


</head>

<body>
    <?php
    require_once dirname(__FILE__) . "./shared/" . 'Navbar.php';
    require_once dirname(__FILE__) . "./shared/" . 'Loading.php';
    require_once dirname(__FILE__) . "./shared/" . 'Rating.php';
    require_once dirname(__FILE__) . "./../shared/" . 'functions.php';
    
    ?>
    <div class="container mt-5 mb-3 d-flex" id="productInfo">
        <div class="col-lg-9 col-12">
            <div class="row flex-wrap">

                <div id="productSlide" class="carousel slide col-lg-5 col-md-6 col-12 mr-3" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        foreach ($bookInfo->getListImage() as $key => $bookImage) {
                            $class = className($key === 0, "active", "");
                            echo "
                            <div class='carousel-item {$class}'>
<img class='d-block w-100' src='{$bookImage->getUrl()}' alt='First slide'>
</div>
                            ";
                        }
                        ?>

                        <a class="carousel-control-prev" href="#productSlide" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon slideIcon" aria-hidden="true">
                                <i class="fa fa-chevron-left fa-3x"></i>
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#productSlide" role="button" data-slide="next">
                            <span class="carousel-control-next-icon slideIcon" aria-hidden="true">
                                <i class="fa fa-chevron-right fa-3x"></i>
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <ol class="carousel-indicators">


                        <?php
                        foreach ($bookInfo->getListImage() as $key => $bookImage) {
                            $class = className($key === 0, "active", "");
                            echo "
<li data-target='#productSlide' data-slide-to='{$key}' class='{$class} indicatorWrapper'>
                            <img src='{$bookImage->getUrl()}' class='indicatorImg' />
                        </li>
";
                        }

                        ?>

                        <!-- 
                        <li data-target="#productSlide" data-slide-to="0" class="active indicatorWrapper">
                            <img src="https://template.hasthemes.com/koparion/koparion/img/flex/5.jpg" class="indicatorImg" />
                        </li>
                        <li data-target="#productSlide" data-slide-to="1" class="indicatorWrapper">
                            <img src="https://template.hasthemes.com/koparion/koparion/img/flex/1.jpg" class="indicatorImg" />

                        </li>
                        <li data-target="#productSlide" data-slide-to="2" class="indicatorWrapper">
                            <img src="https://template.hasthemes.com/koparion/koparion/img/flex/2.jpg" class="indicatorImg" />
                        </li>
                        <li data-target="#productSlide" data-slide-to="2" class="indicatorWrapper">
                            <img src="https://template.hasthemes.com/koparion/koparion/img/flex/5.jpg" class="indicatorImg" />
                        </li> -->
                    </ol>
                </div>

                <div id="bookInfo" class="col-lg-7 col-md-6 col-12">
                    <div class="d-flex flex-column">
                        <h1 class="bookName">
                            <?php echo $bookInfo->getName() ?>
                            <!-- Savvy Shoulder Tote -->
                        </h1>
                        <div class="bookStatusInfo d-flex pb-3">
                            <span>In Stock</span>
                            <span class="orangeColor"><?php echo $bookInfo->getQuantity() ?> remaining</span>
                            <span>SKU</span>
                            <span>24-WB05</span>
                        </div>

                        <div class="bookReview d-flex">
                            <span><?php echo generateRating(5) ?></span>
                            <span class="reviewCount">3 Reviews</span>
                            <span class="ml-1 cursor-pointer">Add your review</span>

                        </div>

                        <div class="bookPriceContainer d-flex">
                            <div class="bookPriceExpected">
                                <?php
                                 echo
                                // $bookInfo->getSale()!=0
                                // ?
                                number_format($bookInfo->getPrice() - $bookInfo->getPrice() * $bookInfo->getSale())."VNĐ"   
                                // :""
                                ?>
                                
                            </div>
                            <div class="bookPriceActual ml-2">
                                <!-- $40.00 -->
                                <?php
                               echo $bookInfo->getSale()!=0 ?
                                 number_format($bookInfo->getPrice())."VNĐ" :"" ?> 
                            </div>
                        </div>
                        <div class="productAction">
                            <div class="d-flex">
                                <input type="number" id="productQuantity" class="mr-2" placeholder="0" min="1" max="<?php echo $bookInfo->getQuantity() ?>" step="1" onkeypress="return event.charCode >= 48">
                                <button id="addToCartBtn" value="CART_ADD_PRODUCT">ADD TO CART</button>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="iconButton">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="iconButton">
                                    <i class="fa fa-chart-pie"></i>
                                </div>
                                <div class="iconButton">
                                    <i class="fa fa-envelope"></i>
                                </div>

                            </div>
                        </div>
                        <p class="productDescription mt-lg-3">
                            <?php
                            $bookInfo->getDescription()
                            ?>
                            <!-- Powerwalking to the gym or strolling to the local coffeehouse, the Savvy Shoulder Tote lets you stash your essentials in sporty style! A top-loading compartment provides quick and easy access to larger items, while zippered pockets on the front and side hold cash, credit cards and phone. -->
                        </p>
                    </div>
                </div>


                <section id="productInfoTab" class="container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="home" aria-selected="true">Review</button>
                        </li>
                        <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> -->
                    </ul>
                    <div class="tab-content mb-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p>
                                The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it's ideal for athletes with places to go.

                                Dual top handles.
                                Adjustable shoulder strap.
                                Full-length zipper.
                                L 29" x W 13" x H 11".
                            </p>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <section class="reviewContainer">
                                <h3>CUSTOMER REVIEWS</h3>
                                <div class="d-flex flex-column reviewContentList">
                                    <div class="review">
                                        <img src="https://scontent-xsp1-3.xx.fbcdn.net/v/t31.18172-1/c0.60.240.240a/p240x240/27788301_747405972119527_849243654152381069_o.jpg?_nc_cat=107&ccb=1-5&_nc_sid=7206a8&_nc_ohc=JQjn5nHGeA0AX_RzCoR&_nc_ht=scontent-xsp1-3.xx&oh=ec13e31278a2c74c4b2da4c161120696&oe=61A78CD2" alt="" class="avatar">
                                        <div class="commentInfo">
                                            <div class="name">
                                                Đức Huy Hoàng
                                            </div>
                                            <div class="date">
                                                10/03/2000
                                            </div>
                                        </div>
                                        <div class="content">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo in voluptatem ea ad magnam voluptas odio quibusdam odit necessitatibus, ipsum neque perspiciatis dolorem architecto cupiditate blanditiis dolorum delectus? Possimus, illum.
                                        </div>
                                    </div>

                                    <div class="review">
                                        <img src="https://scontent-xsp1-3.xx.fbcdn.net/v/t31.18172-1/c0.60.240.240a/p240x240/27788301_747405972119527_849243654152381069_o.jpg?_nc_cat=107&ccb=1-5&_nc_sid=7206a8&_nc_ohc=JQjn5nHGeA0AX_RzCoR&_nc_ht=scontent-xsp1-3.xx&oh=ec13e31278a2c74c4b2da4c161120696&oe=61A78CD2" alt="" class="avatar">
                                        <div class="commentInfo">
                                            <div class="name">
                                                Đức Huy Hoàng
                                            </div>
                                            <div class="date">
                                                10/03/2000
                                            </div>
                                        </div>
                                        <div class="content">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo in voluptatem ea ad magnam voluptas odio quibusdam odit necessitatibus, ipsum neque perspiciatis dolorem architecto cupiditate blanditiis dolorum delectus? Possimus, illum.
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-5 w-50">
                                    <div class="input-group">
                                        <div class="input-group-prepend mr-3">
                                            <span class="input-group-text" id="">Your review
                                                <span class="text-danger ml-1">*</span>
                                            </span>
                                        </div>
                                        <textarea class="form-control" id="yourReview"></textarea>
                                    </div>
                                </div>

                                <button class="btn submitPreviewBtn mt-5 ml-3">Submit your review</button>
                            </section>
                        </div>

                    </div>


                </section>


            </div>

        </div>

        <div class="col-lg-3 col-12 mt-2" id="relatedProduct">
            <h4>Related Products</h4>
            <div class="relatedProductSlide mt-2">

                <div class="bookCategoryItem">
                    <div class="bookCategoryItemImgWrapper">
                        <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/5.jpg" />
                    </div>
                    <div class="d-flex flex-column">
                        <?php generateRating(5) ?>

                        <div class="bookCategoryItemWrapper">
                            <div class="bookCategoryItemName">
                                Hello world
                            </div>
                            <div class="bookCategoryItemPrice d-flex">
                                <div class="currentPrice ml-1">$30.00</div>
                                <div class="actualPrice">$30.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bookCategoryItem">
                    <div class="bookCategoryItemImgWrapper">
                        <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/21.jpg" />
                    </div>
                    <div class="d-flex flex-column">
                        <?php generateRating(5) ?>

                        <div class="bookCategoryItemWrapper">
                            <div class="bookCategoryItemName">
                                Hello world
                            </div>
                            <div class="bookCategoryItemPrice d-flex">
                                <div class="currentPrice ml-1">$30.00</div>
                                <div class="actualPrice">$30.00</div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="bookCategoryItem">
                    <div class="bookCategoryItemImgWrapper">
                        <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/1.jpg" />
                    </div>
                    <div class="d-flex flex-column">
                        <?php generateRating(5) ?>

                        <div class="bookCategoryItemWrapper">
                            <div class="bookCategoryItemName">
                                Hello world
                            </div>
                            <div class="bookCategoryItemPrice d-flex">
                                <div class="currentPrice ml-1">$30.00</div>
                                <div class="actualPrice">$30.00</div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="saleImageWrapper">
                <a href="">
                    <img src="./img/sale.jpg" alt="">
                </a>
            </div>



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
            window.location="./myCart";
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