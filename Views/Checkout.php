<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/Loading.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/checkout.css">
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <link rel="stylesheet" type="text/css" href="./css/Footer.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.5.4/sifter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" crossorigin="anonymous">



    <title>Document</title>
</head>

<body>
    <?php
    require_once dirname(__FILE__) . "./shared/" . 'Navbar.php';
    ?>
    <?php require_once dirname(__FILE__) . "./shared/" . 'Loading.php'; ?>

    <section id="checkoutContainer" class="container mt-5 mb-3">
        <h3>Checkout</h3>

        <div class="row" id="billingContainer">
            <div class="col-lg-6 col-12 pt-4">
                <h3>BILLING DETAILS</h3>

                <form action="" id="billingForm">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="receiverFirstName">Receiver first name<span class="text-danger ml-1">*</span></label>
                                <input type="text" class="baseInput clearBgColor" id="receiverFirstName" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="receiverLastName">Receiver last name<span class="text-danger ml-1">*</span></label>
                                <input type="text" class="baseInput clearBgColor" id="receiverLastName" placeholder="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="receiverEmail">Receiver email<span class="text-danger ml-1">*</span></label>
                                <input type="email" class="baseInput clearBgColor" id="receiverEmail" placeholder="">
                            </div>
                        </div>

                        <div class="row col-12 pr-0">
                            <div class="col-12 pr-0">
                                <div class="form-group">
                                    <label for="receiverCity">Receiver city<span class="text-danger ml-1">*</span></label>
                                    <select class="select p-0" id="receiverCity">
                                        <option value="-1">Select a city</option>
                                        <?php
                                        foreach ($listCity as $city) {
                                            echo " <option value={$city->getId_city()}>{$city->getCity_name()}</option>";
                                        }

                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="receiverDistrict">Receiver district<span class="text-danger ml-1">*</span></label>
                                    <select class="select p-0" id="receiverDistrict">
                                        <option value="-1">Select a district</option>
                                        <select>
                                </div>
                            </div>

                            <div class="col-6 pr-0">
                                <div class="form-group">
                                    <label for="receiverWard">Receiver ward<span class="text-danger ml-1">*</span></label>
                                    <select class="select p-0" id="receiverWard">
                                        <option value="-1">Select a ward</option>
                                        <select>
                                </div>
                            </div>

                            <div class="col-12 pr-0">
                                <div class="form-group">
                                    <label for="receiverAddressNote">Receiver address note</label>
                                    <textarea name="" id="receiverAddressNote" class="w-100"></textarea>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="receiverPhone">Receiver phone<span class="text-danger ml-1">*</span></label>
                                    <input type="text" class="baseInput clearBgColor" id="receiverPhone" placeholder="">
                                </div>
                            </div>

                            <div class="col-6 pr-0">
                                <div class="form-group">
                                    <label for="receiverPostcode">Postcode/zip*<span class="text-danger ml-1">*</span></label>
                                    <input type="text" class="baseInput clearBgColor" id="receiverPostcode" placeholder="">
                                </div>
                            </div>

                            <div class="col-12 pr-0">
                                <div class="form-group">
                                    <label for="receiverOrderNote">Receiver order note</label>
                                    <textarea name="" id="receiverOrderNote" class="w-100"></textarea>
                                </div>
                            </div>

                        </div>


                    </div>



                </form>


            </div>
            <div class="col-lg-6 col-12 pt-4 d-flex flex-column" id="orderDetail">
                <h3>YOUR ORDER</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="tableHeader border-top-0">Product</th>
                            <th scope="col" class="tableHeader border-top-0">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="itemName">Vestibulum suscipit × 1</th>
                            <td>£165.00</td>
                        </tr>
                        <tr>
                            <th scope="row" class="itemName">Vestibulum suscipit × 1</th>
                            <td>£165.00</td>
                        </tr>
                        <tr>
                            <th scope="row" class="itemName">Vestibulum suscipit × 1</th>
                            <td>£165.00</td>
                        </tr>
                        <tr>
                            <th scope="col" class="tableHeader">CART SUBTOTAL</th>
                            <th scope="col" class="tableHeader">£215.00</th>
                        </tr>
                        <tr>
                            <th scope="col" class="orderName">Order total</th>
                            <th scope="col" class="orderValue">£215.00</th>
                        </tr>
                    </tbody>
                </table>
                <section class="checkoutButtonContainer">
                    <button class="checkoutButton">Place order</button>
                </section>
            </div>
        </div>






    </section>


    <?php require_once dirname(__FILE__) . "./shared/" . 'Footer.php'; ?>


</body>





<script>
    let listCity = JSON.parse(JSON.stringify(<?php echo $listCityJson; ?>));
    let listDistrict = JSON.parse(JSON.stringify(<?php echo $listDistrict; ?>));
    let listWard = JSON.parse(JSON.stringify(<?php echo $listWard; ?>));
</script>
<script>
    const selectizeSetting = {
        create: true,
        sortField: "text",
        showAddOptionOnCreate: false
    }
    let $receiverCitySelect, $receiverDistrictSelect, $receiverWardSelect = null;
    $(document).ready(function() {
        $receiverCitySelect = $("#receiverCity").selectize({
            selectizeSetting,
            onChange: (value) => {
                $receiverDistrictSelect[0].selectize.clear();
                $receiverDistrictSelect[0].selectize.clearOptions();


                if (value != -1 && value != "") {
                    //     $receiverDistrictSelect[0].selectize.addOption({
                    //     text: "Select a district",
                    //     value: -1
                    // })
                    // $receiverDistrictSelect[0].selectize.setValue(-1, 0);
                    listDistrict.filter((district) => district.province_id == value).map((district) => {
                        $receiverDistrictSelect[0].selectize.addOption({
                            text: district.district_name,
                            value: district.id_district
                        })
                    })
                }

            }
        })

        $receiverDistrictSelect = $("#receiverDistrict").selectize({
            selectizeSetting,
            onChange: (value) => {

                $receiverWardSelect[0].selectize.clear();
                $receiverWardSelect[0].selectize.clearOptions();

                // $receiverWardSelect[0].selectize.addOption({
                //     text: "Select a ward",
                //     value: -1
                // })
                // $receiverWardSelect[0].selectize.seValue(-1, 0);

                if (value != -1 && value != "") {

                    listWard.map((ward) => {
                        if (ward.id_district == value)
                            $receiverWardSelect[0].selectize.addOption({
                                text: ward.ward_name,
                                value: ward.id_ward
                            })
                    })



                }
            }
        })


        $receiverWardSelect = $("#receiverWard").selectize({
            selectizeSetting,
        })


    })
</script>

</html>