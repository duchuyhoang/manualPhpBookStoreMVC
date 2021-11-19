<section class="checkoutDifferentContainer d-flex flex-column ">
    <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" stroke="#ccc" stroke-width="2" class="section__hanging-icon mb-1 ml-5" >
        <path d="M25 49c13.255 0 24-10.745 24-24S38.255 1 25 1 1 11.745 1 25s10.745 24 24 24z" fill="none"></path>
        <path d="M25 12v18"></path>
        <circle fill="#ccc" cx="25" cy="37" r="2" stroke="none"></circle>
    </svg>

    <h2 class="title ml-5">Attention</h2>
    <p class="text ml-5">
        Some of the products in the cart are no longer available to order. We apologize for this inconvenience.
    </p>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th style="width:1%"></th>
                </tr>
            </thead>
            <tbody id="tbListDifferentBody">



               
            </tbody>
        </table>
    </div>

<div class="d-flex justify-content-center mb-3">
    <button class="blackButton" id="saveDifferenceBtn" value=<?php echo $RESOVE_CONFLICT_CART; ?>>Checkout</button>
</div>

</section>
