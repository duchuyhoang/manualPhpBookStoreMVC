<section id="checkoutContainer" class="container mt-5 mb-3">
    <h3>Checkout</h3>

    <div class="row" id="billingContainer">
        <div class="col-lg-6 col-12 pt-4">
            <h3>BILLING DETAILS</h3>

            <form action="" id="billingForm" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="receiverFirstName">Receiver first name<span class="text-danger ml-1">*</span></label>
                            <input type="text" class="baseInput clearBgColor" id="receiverFirstName" placeholder="" autocomplete="nope">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="receiverLastName">Receiver last name<span class="text-danger ml-1">*</span></label>
                            <input type="text" class="baseInput clearBgColor" id="receiverLastName" placeholder="" autocomplete="nope">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="receiverEmail">Receiver email<span class="text-danger ml-1">*</span></label>
                            <input type="email" class="baseInput clearBgColor" id="receiverEmail" placeholder="" autocomplete="nope">
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

<?php
foreach($currentCart->getListBook() as $bookItem){
$price=number_format(($bookItem->getBook()->getPrice())-($bookItem->getBook()->getPrice()*$bookItem->getBook()->getSale()));
echo "<tr>
<th scope='row' class='itemName'>{$bookItem->getBook()->getName()} × {$bookItem->getQuantity()}</th>
<td>{$price} VNĐ</td>
</tr>";

}?>

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
                <button class="checkoutButton" value="<?php echo $CHECKOUT_CART ?>" id="checkoutBtn">Place order</button>
            </section>
        </div>
    </div>
</section>