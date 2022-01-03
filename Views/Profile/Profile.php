<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <link rel="stylesheet" type="text/css" href="./css/myAccount.css">
    <link rel="stylesheet" type="text/css" href="./css/loading.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.5.4/sifter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once dirname(__FILE__) . "./../shared/" . 'Navbar.php'; ?>
    <?php require_once dirname(__FILE__) . "./../shared/" . 'Loading.php'; ?>


    <div class="container mt-5">
        <h2 class="myAccountHeader">My Account</h2>

        <div class="row">
            <div class="col-lg-3 col-md-4 nav nav-tabs d-block" role="tablist">
                <div class="myAccountTab nav-item" role="presentation">
                    <a href="#accountDetail" class="myAccountTabItem nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#accountDetail" aria-controls="accountDetail" id="nav-accountDetail-tab" aria-selected="true">
                        <i class="fa fa-user"></i>
                        Account detail</a>
                </div>
                <div class="myAccountTab nav-item" role="presentation">
                    <a href="#order" class="myAccountTabItem nav-link" data-bs-toggle="tab" role="tab" data-bs-target="#order" aria-controls="order" id="nav-order-tab" aria-selected="false">
                        <i class="fa fa-cart-arrow-down"></i>
                        Orders</a>
                </div>
                <div class="myAccountTab nav-item" role="presentation">
                    <a href="#user_password" class="myAccountTabItem nav-link" data-bs-toggle="tab" role="tab" data-bs-target="#user_password" aria-controls="user_password" id="nav-user_password-tab" aria-selected="false">
                        <i class="fas fa-lock"></i>
                        Password</a>
                </div>
                <div class="myAccountTab">
                    <a href="#user_address" class="myAccountTabItem nav-link" data-bs-toggle="tab" role="tab" data-bs-target="#user_address" aria-controls="user_address" id="nav-user_address-tab" aria-selected="false">
                        <i class="fa fa-map-marker"></i>
                        Address</a>
                </div>
                <div class="myAccountTab">
                    <a href="" class="myAccountTabItem">
                        <i class="fas fa-sign-out-alt"></i>
                        Sign out
                    </a>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 tab-content myAccountContainer">
                <div class="tab-pane fade show active" id="accountDetail" role="tabpanel" aria-labelledby="nav-accountDetail-tab">
                <?php require_once dirname(__FILE__) . "./ProfileEdit.php"; ?>
                </div>
                <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="nav-order-tab">
                    <div class="row justify-content-around">
                        <div class="card col-3">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                        <div class="card col-3">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                        <div class="card col-3">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>

                    {listOrderLabel}

                    <div></div>


                </div>
                <div class="tab-pane fade" id="user_password" role="tabpanel" aria-labelledby="nav-user_password-tab">
                <?php require_once dirname(__FILE__) . "./ProfileEditPassword.php"; ?>
                    
                </div>

                <div class="tab-pane fade" id="user_address" role="tabpanel" aria-labelledby="nav-user_address-tab">
                <?php require_once dirname(__FILE__) . "./ProfileEditAddress.php"; ?>
                    
                </div>



                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>

        </div>


    </div>
</body>






<script>
    $("a.myAccountTabItem ").click(function($this) {
        $("a.myAccountTabItem ").removeClass('active');
        $("a.myAccountTabItem ").attr('aria-selected', false);
        $this.currentTarget.classList.add('active');
        $this.currentTarget.setAttribute('aria-selected', true);
    });
</script>

</html>