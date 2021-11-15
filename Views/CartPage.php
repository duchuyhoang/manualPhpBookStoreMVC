<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="./css/Loading.css">
  <link rel="stylesheet" type="text/css" href="./css/header.css">
  <link rel="stylesheet" type="text/css" href="./css/cartPage.css">
  <link rel="stylesheet" type="text/css" href="./css/base.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/Footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <title>Document</title>
</head>

<body>
  <?php
  require_once dirname(__FILE__) . "./shared/" . 'Navbar.php';
  ?>
  <?php require_once dirname(__FILE__) . "./shared/" . 'Loading.php'; ?>


  <div class="container mt-5">
    <h2 class="cartPageHeader">Your cart</h2>

    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" width="5%">#</th>
            <th scope="col" width="15%">Product Image</th>
            <th scope="col" width="20%">Product Name</th>
            <th scope="col" width="12%">Price</th>
            <th scope="col" width="10%">Quantity</th>
            <th scope="col" width="12%">Total</th>
            <th scope="col" width="10%">Delete</th>


          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>
              <img src="https://template.hasthemes.com/koparion/koparion/img/banner/8.jpg" />
            </td>
            <td>Harry potter Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, eaque aliquid, harum, facere odio repellendus ex totam et enim exercitationem ab. A voluptatum voluptates culpa cumque. Quidem, voluptate impedit! Sint!</td>
            <td>£165113113131.00</td>
            <td>
              <input type="number" placeholder="0" min="1" max="10" step="1" onkeypress="return event.charCode >= 48" value="100" class="quantityInput">
            </td>
            <td>100</td>
            <td>
              <i class="far fa-trash-alt fa-3x deleteIcon"></i>
            </td>

          </tr>

          <tr>
            <th scope="row">1</th>
            <td>
              <img src="https://template.hasthemes.com/koparion/koparion/img/banner/8.jpg" />
            </td>
            <td>Harry potter Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, eaque aliquid, harum, facere odio repellendus ex totam et enim exercitationem ab. A voluptatum voluptates culpa cumque. Quidem, voluptate impedit! Sint!</td>
            <td>£165113113131.00</td>
            <td>
              <input type="number" placeholder="0" min="1" max="10" step="1" onkeypress="return event.charCode >= 48" value="100" class="quantityInput">
            </td>
            <td>100</td>
            <td>
              <i class="far fa-trash-alt fa-3x deleteIcon"></i>
            </td>

          </tr>

          <tr>
            <th scope="row">1</th>
            <td>
              <img src="https://template.hasthemes.com/koparion/koparion/img/banner/8.jpg" />
            </td>
            <td>Harry potter Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, eaque aliquid, harum, facere odio repellendus ex totam et enim exercitationem ab. A voluptatum voluptates culpa cumque. Quidem, voluptate impedit! Sint!</td>
            <td>£165113113131.00</td>
            <td>
              <input type="number" placeholder="0" min="1" max="10" step="1" onkeypress="return event.charCode >= 48" value="100" class="quantityInput">
            </td>
            <td>100</td>
            <td>
              <i class="far fa-trash-alt fa-3x deleteIcon"></i>
            </td>

          </tr>

          <tr class="lastRow"></tr>


        </tbody>
      </table>
    </div>

    <section class="container mt-4 mb-5">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-12 p-0">
          <div class="d-flex flex-column">
            <div class="btnWrapper">
              <button class="blackButton">Update cart</button>
              <button class="blackButton">Continue shopping</button>
            </div>
            <div class="couponWrapper mt-2">
              <h3>Coupon</h3>
              <p>Enter your coupon code if you have one.</p>
              <div class="d-flex">
                <input type="text" class="baseInput couponInput" placeholder="Coupon code ">
                <div class="blackButton">Apply coupon</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 col-12 p-0">
          <div id="bill">
            <h2>Cart total</h2>

            <div class="billIntoItem">
              <p class="itemName">Real price</p>
              <p class="itemMoney">$127.00</p>

            </div>


            <div class="billIntoItem">
              <p class="itemName">Subtotal</p>
              <p class="itemMoney">$127.00</p>

            </div>
            <div class="billIntoItem">
              <p class="itemName">Shipping</p>
              <p class="itemMoney">$7.00</p>
            </div>

            <div class="billIntoItem itemTotal">
              <p class="itemName">Total</p>
              <p class="itemMoney">$215.00</p>
            </div>
            <button class="buttonMain">
              <a href="./checkout">Proceed to checkout</a>
            </button>
          </div>
        </div>

      </div>
    </section>




  </div>






  <?php require_once dirname(__FILE__) . "./shared/" . 'Footer.php'; ?>

</body>

</html>