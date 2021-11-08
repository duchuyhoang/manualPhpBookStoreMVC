<?php require dirname(__FILE__) . "/../../shared/" . 'constants.php' ?>
<?php require dirname(__FILE__) . "/../../shared/" . 'actionsType.php' ?>

<div id="accountZone">

    <div class="account d-flex ">

        <div>Check out</div>
        <?php
        echo isset($_SESSION[$CURRENT_USER_INFO]) ?
            "<div class='userInfoMenu'>
        <ul class='menu'>
        <li>
        <i class='fas fa-user fa-lg'></i>
        <a href='./user?id_user={$_SESSION[$CURRENT_USER_INFO]->getId()}'>Profile</a>
        </li>
        <li id='signOutBtn' value={$SIGN_OUT}>

        <i class='fas fa-sign-out-alt fa-lg'></i>
        <span>Sign out</span>
        </li>
        <li>Home3</li>

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
        <img src="https://template.hasthemes.com/koparion/koparion/img/logo/logo.png" alt="Logo" />
    </div>
    <div class="col-4 d-flex justify-content-center align-items-center">
        <div class="cartContainer position-relative">
            <i class="fas fa-shopping-cart cart fa-2x"></i>
            <div class="productCount">0</div>
            <div>
                <div class="productMenu">
                    <div class="d-flex justify-content-center">My cart</div>

                </div>
            </div>

        </div>

    </div>


</div>

<section class="w-100 pt-1 d-flex justify-content-center mt-3" id="navbar">
    <ul>
        <li class="cate">
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
        <li class="cate">
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
        <li class="cate">
            <a href="">
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
                <form method="post" action="auth" id="loginForm">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
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
                <form method="post" action="auth" id="loginForm">
                    <div class="d-flex flex-column w-75 m-auto">

                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" name=<?php echo $SIGN_UP_EMAIL ?> class="form-control mb-2" id=<?php echo $SIGN_UP_EMAIL ?> placeholder="Email..." />
                        </div>

                        <div class="form-group">
                            <label for=<?php echo $SIGN_UP_PASSWORD ?>>Password</label>
                            <input type="password" name=<?php echo $SIGN_UP_PASSWORD ?> class="form-control mb-2" id=<?php echo $SIGN_UP_PASSWORD ?> placeholder="Password..." />
                        </div>
                        <div class="form-group">
                            <p class="text-danger m-0" id="signupError"></p>
                        </div>
                        <div class="form-group d-flex justify-content-center w-100">
                            <button type='submit' class="btn btn-primary" name="submit" value=<?php echo $ACTION_SIGN_UP ?> id="btnLog">Sign up</button>
                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



<div class="position-fixed scrollToTop cursor-pointer" id="scrollToTop" onclick="scrollToTop()">
    <i class="fa fa-angle-up"></i>

</div>

<script>
function scrollToTop(){
    let topElement=document.getElementById("accountZone");
    topElement.scrollIntoView({
  behavior: "smooth",
  block: "start",
  inline: "nearest"
});
}

</script>



<script>
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
            window.location.reload();
        });
        request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            $("#loading").removeClass("loadingShow");
            const error = JSON.parse(jqXHR.responseText);
            $("#loginError").html(error.message || "Login failed");
        });
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

        });

    })

    if (
        "IntersectionObserver" in window &&
        "IntersectionObserverEntry" in window &&
        "intersectionRatio" in window.IntersectionObserverEntry.prototype) {
        let observer = new IntersectionObserver((entries, observer) => {
            if (entries[0].boundingClientRect.y > 0) {
                document.getElementById("navbar").classList.remove("header-not-at-top")
                document.getElementById("scrollToTop").classList.remove("d-flex")

            } else {
                document.getElementById("navbar").classList.add("header-not-at-top")
                document.getElementById("scrollToTop").classList.add("d-flex")

                // observer.unobserve(entry.target);
            }

        }, );
        observer.observe(document.getElementById('headerAnchor'));
    }
</script>