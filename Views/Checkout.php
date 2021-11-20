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
    <?php require_once dirname(__FILE__) . "/../shared/" . 'constants.php'; ?>
    <?php require dirname(__FILE__) . "/../shared/" . 'actionsType.php' ?>
    <?php
    if (count($different) > 0) {
        require_once dirname(__FILE__) . "/Checkout/CheckoutDifferent.php";
    } else if (count($currentCart->getListBook()) === 0) {
        require_once dirname(__FILE__) . "/Checkout/CheckoutNoProduct.php";
    } else
        require_once dirname(__FILE__) . "/Checkout/CheckoutProcess.php";
    ?>
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

        // setInterval(()=>{{}})


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


    $("#checkoutBtn").click(function(event) {
        event.preventDefault();
        // $("#loading").addClass("loadingShow");

        request = $.ajax({
            url: "./ajax/checkout.php",
            type: "post",
            data: {
                submit: $("#checkoutBtn").attr("value"),
                receiverFirstName: $("#receiverFirstName").val(),
                receiverLastName: $("#receiverLastName").val(),
                receiverEmail: $("#receiverEmail").val(),
                receiverCity: $receiverCitySelect[0].selectize.getValue(),
                receiverDistrict: $receiverDistrictSelect[0].selectize.getValue(),
                receiverWard: $receiverWardSelect[0].selectize.getValue(),
                receiverAddressNote: $("#receiverAddressNote").val(),
                receiverPhone: $("#receiverPhone").val(),
                receiverPostcode: $("#receiverPostcode").val(),
                receiverOrderNote: $("#receiverOrderNote").val(),
                receiverOrderType: $("#receiverOrderType").val(),
                receiverPayment: $("#receiverPaymentType").val()
            },
            // processData: false,
            // contentType: false,
        });

        request.done(function(response, textStatus, jqXHR) {

        });


        request.fail(function(jqXHR, textStatus, errorThrown) {
            $("#loading").removeClass("loadingShow");
        });



    })
</script>

<script>
    var list = <?php echo json_encode(array_map(function ($diff) {
                    return array(
                        "id" => $diff['book']->getId_book(),
                        "quantity" => $diff['book']->getQuantity(),
                        "maxQuantity" => $diff['book']->getQuantity(),
                        "currentQuantity" => $diff['bookItem']->getQuantity(),
                        "name" => $diff['book']->getName(),
                        "avatar" => $diff['book']->getListImage()[0]->getUrl()
                    );
                }, $different), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

    function deleteProduct(id) {
        list = list.map((item) => {
            if (item.id == id) {
                return {
                    ...item,
                    quantity: 0
                }
            } else return item;
        });
        reDrawTable()
    }
    const reDrawTable = () => {
        let html = "";
        list.map((item) => {
            html += `<tr class='product'><td><img src='${item.avatar}' alt='' class='productImg' /></td><td><p>${item.name}</p></td><td><p>${item.currentQuantity} -> ${item.quantity}</p></td><td><i class='far fa-times-circle ml-5 cursor-pointer' onclick='deleteProduct(${item.id})'></i></td></tr>`;
            // document.getElementById("tbListDifferentBody").textContent = html;
            $("#tbListDifferentBody").html(html);
        });
    }
    $(document).ready(function() {
        reDrawTable();
    })
</script>
<script>
    $("#saveDifferenceBtn").click(function(event) {
        $("#loading").addClass("loadingShow");
        request = $.ajax({
            url: "./ajax/cart.php",
            type: "post",
            data: {
                submit: $("#saveDifferenceBtn").attr("value"),
                newList: list
            },
        });
        request.done(function(response, textStatus, jqXHR) {
            $("#loading").removeClass("loadingShow");
            $.snackbar({
                content: "Update cart success",
                timeout: 5000,
                style: "customSnackbar snackbar-success"
            });
            window.location.reload();
        });
        request.fail(function(jqXHR, textStatus, errorThrown) {
            $("#loading").removeClass("loadingShow");
            window.location = "./myCart";
        });
    })
</script>

</html>