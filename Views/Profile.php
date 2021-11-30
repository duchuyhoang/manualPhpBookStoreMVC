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
    <?php require_once dirname(__FILE__) . "./shared/" . 'Navbar.php'; ?>

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
                    <h2>Account detail</h2>
                    <div class="d-flex">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="receiverFirstName">First name<span class="text-danger ml-1">*</span></label>
                                <input type="text" class="baseInput" id="receiverFirstName" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="receiverLastName">Last name<span class="text-danger ml-1">*</span></label>
                                <input type="text" class="baseInput" id="receiverLastName" placeholder="">
                            </div>
                        </div>




                    </div>
                    <div class="d-flex">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="receiverLastName">Phone<span class="text-danger ml-1">*</span></label>
                                <input type="text" class="baseInput" id="receiverLastName" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="receiverLastName">Self describe</label>

                                <textarea class="form-control" id="selfDecribe"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="row"> -->
                    <button class="blackButton ml-3">Save changes</button>

                    <!-- </div> -->
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
                    <h2>Password</h2>

                    <div class="d-flex">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currentPassword">Current password<span class="text-danger ml-1">*</span></label>
                                <input type="password" class="baseInput" id="currentPassword" placeholder="Current password">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="newPassword">New password<span class="text-danger ml-1">*</span></label>
                                <input type="password" class="baseInput" id="newPassword" placeholder="New password">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="confirmPassword">Confirm password<span class="text-danger ml-1">*</span></label>
                                <input type="password" class="baseInput" id="confirmPassword" placeholder="Confirm password">
                            </div>

                        </div>

                    </div>

                    <button class="blackButton ml-3">Save changes</button>
                </div>

                <div class="tab-pane fade" id="user_address" role="tabpanel" aria-labelledby="nav-user_address-tab">
                    <h2>Your address</h2>

                    <div class="d-flex mt-5 flex-wrap">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="userCity">Your city<span class="text-danger ml-1">*</span></label>
                                <select class="select p-0" id="userCity">
                                    <option value="-1">Select a city</option>
                                    <?php
                                    foreach ($listCity as $city) {
                                        echo " <option value={$city->getId_city()}>{$city->getCity_name()}</option>";
                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="userDistrict">Your district<span class="text-danger ml-1">*</span></label>
                            <select class="select p-0" id="userDistrict">
                                <option value="-1">Select a district</option>
                                <select>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="userWard">Your ward<span class="text-danger ml-1">*</span></label>
                                <select class="select p-0" id="userWard">
                                    <option value="-1">Select a ward</option>
                                    <select>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>

        </div>


    </div>
</body>

<script>
    let listCity = JSON.parse(JSON.stringify(<?php echo $listCityJson; ?>));
    let listDistrict = JSON.parse(JSON.stringify(<?php echo $listDistrict; ?>));
    let listWard = JSON.parse(JSON.stringify(<?php echo $listWard; ?>));
    const selectizeSetting = {
        create: true,
        sortField: "text",
        showAddOptionOnCreate: false
    };
    let $userCitySelect, $userDistrictSelect, $userWardSelect = null;
</script>
<script>
    $(document).ready(function() {
        $userCitySelect = $("#userCity").selectize({
            selectizeSetting,
            onChange: (value) => {
                $userDistrictSelect[0].selectize.clear();
                $userDistrictSelect[0].selectize.clearOptions();


                if (value != -1 && value != "") {
                    $userDistrictSelect[0].selectize.addOption({
                        text: "Select a district",
                        value: -1
                    })
                    $userDistrictSelect[0].selectize.setValue(-1, 0);
                    listDistrict.filter((district) => district.province_id == value).map((district) => {
                        $userDistrictSelect[0].selectize.addOption({
                            text: district.district_name,
                            value: district.id_district
                        })
                    })
                }

            }
        });

        $userDistrictSelect = $("#userDistrict").selectize({
            selectizeSetting,
            onChange: (value) => {

                $userWardSelect[0].selectize.clear();
                $userWardSelect[0].selectize.clearOptions();

                // $userWardSelect[0].selectize.addOption({
                //     text: "Select a ward",
                //     value: -1
                // })
                // $userWardSelect[0].selectize.seValue(-1, 0);

                if (value != -1 && value != "") {

                    listWard.map((ward) => {
                        if (ward.id_district == value)
                            $userWardSelect[0].selectize.addOption({
                                text: ward.ward_name,
                                value: ward.id_ward
                            })
                    })
                }
            }
        })

        $userWardSelect = $("#userWard").selectize({
            ...selectizeSetting
        })


    })
</script>




<script>
    $("a.myAccountTabItem ").click(function($this) {
        $("a.myAccountTabItem ").removeClass('active');
        $("a.myAccountTabItem ").attr('aria-selected', false);
        $this.currentTarget.classList.add('active');
        $this.currentTarget.setAttribute('aria-selected', true);

        //   .addClass('active');
    });
</script>

</html>