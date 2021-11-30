<?php require dirname(__FILE__) . "/../../shared/" . 'constants.php' ?>
<?php require dirname(__FILE__) . "/../../shared/" . 'actionsType.php' ?>
<?php require_once dirname(__FILE__) . "/../../Model/" . 'Cart.php' ?>
<?php require_once dirname(__FILE__) . "/../../Model/" . 'BookItem.php' ?>
<?php session_start() ?>

<?php $url = isset($_GET["url"]) ? $_GET["url"] : "";
// $_SESSION[$CURRENT_USER_INFO]=null;

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.css" crossorigin="anonymous">


<div id="accountZone">

    <div class="account d-flex ">

        <a href="./checkout" class="checkout">Check out</a>
        <?php
        $permission = isset($_SESSION[$CURRENT_USER_INFO]) ? $_SESSION[$CURRENT_USER_INFO]->getPermission() : 0;


        echo isset($_SESSION[$CURRENT_USER_INFO]) ?
            "<div class='userInfoMenu'>
        <ul class='menu'>" .
            ($permission == $PERMISSION_ADMIN ? "
        <li>
        <i class='fas fa-user fa-lg'></i>
        <a href='./admin'>Admin</a>
        </li>
        " : "") .
            "<li>
        <i class='fas fa-user fa-lg'></i>
        <a href='./myProfile'>Profile</a>
        </li>
        
        <li id='signOutBtn' value={$SIGN_OUT}>

        <i class='fas fa-sign-out-alt fa-lg'></i>
        <span>Sign out</span>
        </li>
        </ul>
        {$_SESSION[$CURRENT_USER_INFO]->getName()}
         </div>" :
            '
            <div data-toggle="modal" data-target="#signupModal">Sign up</div>
            <div data-toggle="modal" data-target="#loginModal">Sign in</div>
            '
        ?>

    </div>

</div>

<div id="header" class="d-flex pt-4 pb-4">
    <div class="col-4 d-flex justify-content-center align-items-center">
        <form action="" class="w-100">
            <div class="searchWrapper position-relative d-flex justify-content-center">
                <input type="text" placeholder="Search entire store here" height="50%" />
                <button><i class="fas fa-search"></i></button>
            </div>

        </form>

    </div>
    <div class="col-4 d-flex justify-content-center align-items-center">
        <a href="./home">
            <img src="https://template.hasthemes.com/koparion/koparion/img/logo/logo.png" alt="Logo" />
        </a>
    </div>
    <div class="col-4 d-flex justify-content-center align-items-center">
        <div class="cartContainer position-relative">
            <i class="fas fa-shopping-cart cart fa-2x"></i>
            <div class="productCount">
                <?php
                echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]->getListBook()) : "0";
                ?></div>
            <div>
                <div class="productMenu">
                    <div class="d-flex justify-content-center flex-column align-items-center" id="myCart">My cart
                        <section class='cartItemContainer'>

                            <?php

                            $currentCart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : null;

                            if ($currentCart) {
                                foreach ($currentCart->getListBook() as $bookItem) {
                                    $avatar = count($bookItem->getBook()->getListImage()) > 0 ? $bookItem->getBook()->getListImage()[0]->getUrl() : "";
                                    echo "
                                    <div class='cartItem'>
        <a href='./product?id_product={$bookItem->getBook()->getId_book()}' class='cartItemImg'>
            <img src='{$avatar}' alt='' width='100%' height='100%'>
        </a>
        <div class='cartItemContent'>
            <p>
                <a href='./product?id_product={$bookItem->getBook()->getId_book()}'>
                    {$bookItem->getBook()->getName()}
                </a>

            </p>
            <p>{$bookItem->getQuantity()}x {$bookItem->getPrice()}VNĐ</p>
        </div>
        <div class='cartItemDelete'>
            <i class='fas fa-times'></i>
        </div>
    </div>
                                    ";
                                }
                            } else {
                            }



                            ?>
                        </section>




                        <a href="./myCart" class="cartBtn">
                            View cart
                        </a>
                        <a href="./checkout" class="cartBtn mt-2">
                            Checkout
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>


</div>

<section class="w-100 pt-1 d-flex justify-content-center mt-3" id="navbar">
    <ul>
        <li class="cate <?php echo $url === "" || $url === "home" ? "active" : "" ?>">
            <a href="./home">
                Home
                <i class="fa fa-angle-down mt-1 ml-2"></i>
            </a>
            <div class="submenu">
                <ul>
                    <li>HOME 1</li>
                    <li>HOME 2</li>
                    <li>HOME 3</li>
                    <li>HOME 4</li>
                </ul>

            </div>
        </li>
        <li class="cate <?php echo $url === "list" ? "active" : "" ?>">
            <a href="">
                Book
                <i class="fa fa-angle-down mt-1 ml-2"></i>
            </a>
            <div class="submenu">
                <ul>
                    <li>adad</li>
                    <li>dadada</li>
                    <li>vvv</li>
                    <li>daad</li>
                </ul>

            </div>

        </li>
        <li class="cate">
            <a href="">
                Author
                <i class="fa fa-angle-down mt-1 ml-2"></i>
            </a>
            <div class="megaMenu">
                <ul>
                    <li>adad</li>
                    <li>dadada</li>
                    <li>vvv</li>
                    <li>daad</li>
                </ul>
                <ul>
                    <li>adad</li>
                    <li>dadada</li>
                    <li>vvv</li>
                    <li>daad</li>
                </ul>
                <ul>
                    <li>adad</li>
                    <li>dadada</li>
                    <li>vvv</li>
                    <li>daad</li>
                </ul>
            </div>
        </li>
        <li class="cate">
            <a href="">
                Sale off
                <i class="fa fa-angle-down mt-1 ml-2"></i>
            </a>
        </li>
        <li class="cate <?php echo $url === "contact" ? "active" : "" ?>">
            <a href="./contact">
                About us
                <!-- <i class="fa fa-angle-down mt-1 ml-2"></i> -->
            </a>
        </li>

    </ul>

</section>

<div id="headerAnchor"></div>

<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="loginForm">
                    <div class="d-flex flex-column w-75 m-auto">

                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" name=<?php echo $LOGIN_EMAIL ?> class="form-control mb-2" id="email" placeholder="Email..." />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name=<?php echo $LOGIN_PASSWORD ?> class="form-control mb-2" id="password" placeholder="Password..." />
                        </div>
                        <div class="form-group">
                            <p class="text-danger m-0" id="loginError"></p>
                        </div>
                        <div class="form-group d-flex justify-content-center w-100">
                            <button type='submit' class="btn btn-primary" name="submit" value=<?php echo $ACTION_LOGIN ?> id="btnLog">Login</button>
                        </div>

                    </div>

                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>

    </div>
</div>


<div class="modal fade" id="signupModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="signUpForm">
                    <div class="d-flex flex-column w-75 m-auto">

                        <div class="form-group">
                            <label for="sgName">Name:</label>
                            <input type="text" name="sgName" class="form-control mb-2" id="sgName" placeholder="Name..." autocomplete="nope" />
                        </div>


                        <div class="form-group">
                            <label for="sgEmail">Email address:</label>
                            <input type="email" name="email" class="form-control mb-2" id="sgEmail" placeholder="Email..." />
                        </div>

                        <div class="form-group">
                            <label for="sgPassword">Password:</label>
                            <input type="password" name="sgPassword" class="form-control mb-2" id="sgPassword" placeholder="Password..." />
                        </div>

                        <div class="form-group">
                            <label for="sgPhone">Phone:</label>
                            <input type="tel" class="form-control mb-2" id="sgPhone" placeholder="Phone..." onkeypress="return event.charCode >= 48&&event.charCode<57" maxlength="10" autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label for="sgBirthday">Birthday:</label>
                            <input type="date" class="form-control mb-2" id="sgBirthday" placeholder="Birthday..." />
                        </div>

                        <div class="form-group">
                            <label for="sgAvatar">Avatar:</label>
                            <input type="file" class="form-control mb-2" id="sgAvatar" accept="image/png, image/jpeg" />
                        </div>


                        <div class="form-group">
                            <p class="text-danger m-0" id="signupError"></p>
                        </div>
                        <div class="form-group d-flex justify-content-center w-100">
                            <button type='submit' class="btn btn-primary" name="submit" value=<?php echo $ACTION_SIGN_UP ?> id="signUpBtn">Sign up</button>
                        </div>

                    </div>

                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>

    </div>
</div>



<div class="position-fixed scrollToTop cursor-pointer" id="scrollToTop" onclick="scrollToTop()">
    <i class="fa fa-angle-up"></i>

</div>
<div id="snackbar-container">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.min.js">
</script>


<script>
    function scrollToTop() {
        let topElement = document.getElementById("accountZone");
        topElement.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
    }
</script>


<script>
    setTimeout(() => {

    }, 1000)



    $("#loginForm").submit(function(event) {
        event.preventDefault();
        $("#loading").addClass("loadingShow");
        request = $.ajax({
            url: "./ajax/authentication.php",
            type: "post",
            data: {
                email: $("#email").val(),
                password: $("#password").val(),
                submit: $("#btnLog").val()
            },
            // statusCode: {
            //     401: function(res) {
            //         console.log(res);
            //     }
            // }
        });
        request.done(function(response, textStatus, jqXHR) {
            // console.log(response);
            window.location.reload();
        });
        request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            $("#loading").removeClass("loadingShow");
            const error = JSON.parse(jqXHR.responseText);
            $("#loginError").html(error.message || "Login failed");
        });
    })

    $("#signUpForm").submit(function(event) {
        event.preventDefault();
        const data = new FormData();
        $("#loading").addClass("loadingShow");

        data.append("submit", $("#signUpBtn").attr('value'));
        data.append("email", $("#sgEmail").val());
        data.append("password", $("#sgPassword").val());
        data.append("phone", $("#sgPhone").val());
        data.append("birthday", $("#sgBirthday").val())
        data.append("name", $("#sgName").val())

        const fileList = $("#sgAvatar")[0].files;
        data.append("avatar", fileList.length > 0 ? fileList[0] : null);


        request = $.ajax({
            url: "./ajax/authentication.php",
            type: "post",
            data: data,
            processData: false,
            contentType: false,
        });

        request.done(function(response, textStatus, jqXHR) {
            $("#loading").removeClass("loadingShow");
            $.snackbar({
                content: "Sign up success.Wait page reload and login",
                timeout: 5000,
                style: "customSnackbar snackbar-success"
            });

        })

        request.fail(function(jqXHR, textStatus, errorThrown) {
            $.snackbar({
                content: "Sign up fail!!!",
                timeout: 5000,
                style: "customSnackbar snackbar-error"
            });
            $("#loading").removeClass("loadingShow");
            $("#signupModal").modal('hide');
        });


        // $("#signOutBtn").click(function(event) {
        //     $("#loading").addClass("loadingShow");
        //     $("#backDrop").addClass("loadingShow");
        //     request = $.ajax({
        //         url: "./ajax/authentication.php",
        //         type: "post",
        //         data: {
        //             submit: $("#signOutBtn").attr('value')
        //         },
        //     });
        //     $("#loading").removeClass("loadingShow");
        //     $("#signupModal").modal('hide');
        // });

    })


    $("#signOutBtn").click(function(event) {
        $("#loading").addClass("loadingShow");
        $("#backDrop").addClass("loadingShow");
        request = $.ajax({
            url: "./ajax/authentication.php",
            type: "post",
            data: {
                submit: $("#signOutBtn").attr('value')
            },
        });

        request.done(function(response, textStatus, jqXHR) {
            $("#loading").removeClass("loadingShow");
            window.location.reload();
        });
        request.fail(function(jqXHR, textStatus, errorThrown) {
            $("#loading").removeClass("loadingShow");
            $("#signupModal").modal('hide');
        });

    })

    $("#")

    if (
        "IntersectionObserver" in window &&
        "IntersectionObserverEntry" in window &&
        "intersectionRatio" in window.IntersectionObserverEntry.prototype) {
        let observer = new IntersectionObserver((entries, observer) => {
            if (entries[0].boundingClientRect.y > 0) {
                document.getElementById("navbar").classList.remove(
                    "header-not-at-top")
                document.getElementById("scrollToTop").classList.remove(
                    "d-flex")

            } else {
                document.getElementById("navbar").classList.add(
                    "header-not-at-top")
                document.getElementById("scrollToTop").classList.add(
                    "d-flex")

                // observer.unobserve(entry.target);
            }

        }, );
        observer.observe(document.getElementById('headerAnchor'));
    }
</script>