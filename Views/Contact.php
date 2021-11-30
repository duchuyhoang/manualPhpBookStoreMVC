<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W3XV2QS');
    </script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/Footer.css">
    <link rel="stylesheet" type="text/css" href="./css/Contact.css">
    <link rel="stylesheet" type="text/css" href="./css/Loading.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>

<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3XV2QS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <?php
    require_once dirname(__FILE__) . "./shared/" . 'Navbar.php';
    ?>
    <?php require_once dirname(__FILE__) . "./shared/" . 'Loading.php'; ?>

    <div class="container text-center mt-5 mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6514813864273!2d105.78995061476363!3d21.04662668598874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab306caa83a7%3A0xbfe4b316823e38f7!2zSOG7jWMgVmnhu4duIEPDtG5nIE5naOG7hyBCxrB1IENow61uaCBWaeG7hW4gVGjDtG5n!5e0!3m2!1svi!2s!4v1636041413825!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="container">
        <div class="d-flex">
            <div class="col-lg-6 col-md-6 col-12">
                <h3 class="contactActionHeader">Contact Info</h3>
                <div class="contactInfoItem">
                    <i class="fa fa-map-marker"></i>
                    <b>Address:</b>Học viện công nghệ bưu chính viễn thông
                </div>
                <div class="contactInfoItem">
                    <i class="fa fa-envelope"></i>
                    <b>Email:</b>huyhoang10032000@gmail.com
                </div>
                <div class="contactInfoItem">
                    <i class="fa fa-mobile"></i>
                    <b>Phone:</b>0328640767
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <h3 class="contactActionHeader">LEAVE A MESSAGE</h3>

            </div>


        </div>



    </div>

    </div>


    <?php require_once dirname(__FILE__) . "./shared/" . 'Footer.php'; ?>



</body>
<script></script>

</html>