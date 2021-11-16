<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link rel="stylesheet" type="text/css" href="./css/header.css">
  <link rel="stylesheet" type="text/css" href="./css/Home.css">
  <link rel="stylesheet" type="text/css" href="./css/tab.css">
  <link rel="stylesheet" type="text/css" href="./css/book.css">
  <link rel="stylesheet" type="text/css" href="./css/base.css">
  <link rel="stylesheet" type="text/css" href="./css/Footer.css">
  <link rel="stylesheet" type="text/css" href="./css/Loading.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.carousel.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>

<body>
  <?php require_once dirname(__FILE__) . "./shared/" . 'Navbar.php'; ?>
  <?php require_once dirname(__FILE__) . "./shared/" . 'Rating.php'; ?>
  <?php require_once dirname(__FILE__) . "./shared/" . 'Loading.php'; ?>
  <?php
  // var_dump($listLatestBook);
  setlocale(LC_MONETARY, 'vi_VN');
  ?>

  <!-- <?php require dirname(__FILE__) . "/../shared/" . 'constants.php' ?>
  <?php require dirname(__FILE__) . "/../shared/" . 'actionsType.php' ?> -->

  <section id="service d-flex" class="col-9 p-4 d-flex m-auto">

    <div class="service col-3">
      <div class="service-icon d-flex align-items-center ">
        <i class="fas fa-truck fa-2x"></i>
        <div class="d-flex flex-column ml-2">
          <div class="serviceHeader">Free shipping item</div>
          <div class="serviceDescription">For all orders over $500</div>
        </div>
      </div>
    </div>

    <div class="service col-3">
      <div class="service-icon d-flex align-items-center ">
        <i class="fas fa-calendar-alt fa-2x"></i>
        <div class="d-flex flex-column ml-2">
          <div class="serviceHeader">Money back guarantee</div>
          <div class="serviceDescription">For all orders over $500</div>
        </div>
      </div>
    </div>

    <div class="service col-3">
      <div class="service-icon d-flex align-items-center ">
        <i class="fas fa-money-bill-wave fa-2x"></i>
        <div class="d-flex flex-column ml-2">
          <div class="serviceHeader">Cash on delivery</div>
          <div class="serviceDescription">Lorem ipsum dolor consecte</div>
        </div>
      </div>
    </div>

    <div class="service col-3">
      <div class="service-icon d-flex align-items-center ">
        <i class="fas fa-phone fa-2x"></i>
        <div class="d-flex flex-column ml-2">
          <div class="serviceHeader">Help & Support</div>
          <div class="serviceDescription">Call us : +0328640767 </div>
        </div>
      </div>
    </div>

  </section>

  <div class="owl-carousel" id="mainSlide">
    <div class="bgSlide1 bgSlide">
      <div class="slideContent">
        <h1 class="slideHeader animate__animated">
          Huge sale
        </h1>
        <h1 class="slideHeader2 animate__animated">Korparion</h1>
        <button class="animate__animated slideBtn">Shop now</button>
      </div>


    </div>
    <div class="bgSlide2 bgSlide">
      <div class="slideContent">
        <h1 class="slideHeader animate__animated">
          Huge sale
        </h1>
        <h1 class="slideHeader2 ">Korparion</h1>
        <button class="animate__animated slideBtn">Shop now</button>
      </div>


    </div>
  </div>

  <section id="top" class="">
    <div class="header text-center">TOP INTERESTING</div>
    <p class="subHeader text-center">Browse the collection of our best selling and top interresting products.
      ll definitely find what you are looking for..</p>

    <div class="d-flex justify-content-center mt-3">
      <div class="tab col-6 d-flex justify-content-around">
        <button class="tablinks active" onclick="openCity(event, 'New Arrival')">New Arrival</button>
        <button class="tablinks" onclick="openCity(event, 'OnSale')">OnSale</button>
        <button class="tablinks" onclick="openCity(event, 'Product')">Product</button>
      </div>

    </div>

    <div id="New Arrival" class="tabcontent container" style="display:flex">

      <section class="newArrivalSlide owl-carousel" id="newArrivalSlide">
        <?php
        foreach ($listLatestBook as $book) {

          $firstImage = isset($book->getListImage()[0]) ? $book->getListImage()[0]->getUrl() : "";
          $actualMoney = number_format($book->getPrice());
          $bookPrice = number_format($book->getPrice() - $book->getPrice()*$book->getSale());
          echo "
<div class='bookWrapper'>
<div class='bookImg'>
  <div class='bookView'>
    <div class='bookIconWrapper'>
      <a href='./product?id_product={$book->getId_book()}'>
        <i class='fas fa-search fa-1x '></i>
      </a>
    </div>

  </div>
  <img src='{$firstImage}' alt='book' />
</div>
<div class='bookDetail'>
  <div class='bookName'>{$book->getName()}</div>
  <div class='d-flex align-items-center'>
    <p class='bookPrice'>{$bookPrice}VND</p>
    <p class='bookPriceActual'>{$actualMoney}VND</p>
  </div>



</div>
<div class='tagContainer d-flex flex-column'>
  <div class='saleTag sale'>5%</div>
  <div class='saleTag new'>NEW</div>
</div>
</div>
";
        }


        ?>




        <!-- <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/2.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/11.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/1.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/7.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/3.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div> -->

      </section>
    </div>

    <div id="OnSale" class="tabcontent container">
      <section class="onSaleSlide owl-carousel" id="onSaleSlide">
        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/5.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <div class="d-flex align-items-center">
              <p class="bookPrice">100$</p>
              <p class="bookPriceActual">100$</p>
            </div>



          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/2.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/11.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/1.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/7.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/3.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

      </section>
    </div>

    <div id="Product" class="tabcontent container">
      <section class="productSlide owl-carousel" id="productSlide">
        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/5.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <div class="d-flex align-items-center">
              <p class="bookPrice">100$</p>
              <p class="bookPriceActual">100$</p>
            </div>



          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/2.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/11.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/1.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/7.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

        <div class="bookWrapper">
          <div class="bookImg">
            <div class="bookView">
              <div class="bookIconWrapper">
                <a href="">
                  <i class="fas fa-search fa-1x "></i>
                </a>
              </div>

            </div>
            <img src="https://template.hasthemes.com/koparion/koparion/img/product/3.jpg" alt="book" />
          </div>
          <div class="bookDetail">
            <div class="bookName">Harry Potter</div>
            <p class="bookPrice">100$</p>
          </div>
          <div class="tagContainer d-flex flex-column">
            <div class="saleTag sale">5%</div>
            <div class="saleTag new">NEW</div>
          </div>
        </div>

      </section>
    </div>

    <div id="banner">
      <div class="container">
        <div class="row">
          <div class="col-12 position-relative">

            <div class="border-box">
              <a href="" class="d-block  overflow-hidden">
                <img src="./img/banner.jpg" alt="">
                <p class="position-absolute banner-text">G.Meyner book & Spiritual Traveler Press</p>
                <p class="position-absolute banner-text-2">Sale up to 30% off</p>

              </a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <section id="bestSelling">
      <h5>Author best selling</h5>
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="authorInfomation mt-2">
                <div class="authorName">JK Rowling</div>
                <div class="authorCategory">CATEGORIES:BOOKS , AUDIOBOOKS</div>

                <div class="authorDescription">
                  Vestibulum porttitor iaculis gravida. Praesent vestibulum varius placerat. Cras tempor congue neque, id aliquam orci finibus sit amet. Fusce at facilisis arcu. Donec aliquet nulla id turpis semper, a bibendum metus vulputate. Suspendisse potenti.
                </div>
              </div>
            </div>
            <div class="col-6 col-md-6 col-sm-12 col-12">
              <div class="authorAvatar">
                <img src="./img/defaultAuthor.jpg" />
              </div>
            </div>
          </div>

        </div>
        <!-- <div class="col-4"></div> -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
          <section id="authorSlide" class="owl-carousel">

            <div class="d-flex flex-column">

              <div class="bookWrapper authorBookWrapper" href="./product?id_product=1">
                <div class="bookImg">
                  <div class="bookView">
                    <div class="bookIconWrapper">
                      <a href="./product?id_product=1">
                        <i class="fas fa-search fa-1x "></i>
                      </a>
                    </div>

                  </div>
                  <img src="https://template.hasthemes.com/koparion/koparion/img/product/5.jpg" alt="book" />
                </div>
                <div class="bookDetail">
                  <div class="bookName">Harry Potter</div>
                  <div class="d-flex align-items-center">
                    <p class="bookPrice">100$</p>
                    <p class="bookPriceActual">100$</p>
                  </div>



                </div>
                <div class="tagContainer d-flex flex-column">
                  <div class="saleTag sale">5%</div>
                  <div class="saleTag new">NEW</div>
                </div>
              </div>

              <div class="bookWrapper authorBookWrapper">
                <div class="bookImg">
                  <div class="bookView">
                    <div class="bookIconWrapper">
                      <a href="">
                        <i class="fas fa-search fa-1x "></i>
                      </a>
                    </div>

                  </div>
                  <img src="https://template.hasthemes.com/koparion/koparion/img/product/1.jpg" alt="book" />
                </div>
                <div class="bookDetail">
                  <div class="bookName">Harry Potter</div>
                  <p class="bookPrice">100$</p>
                </div>
                <div class="tagContainer d-flex flex-column">
                  <div class="saleTag sale">5%</div>
                  <div class="saleTag new">NEW</div>
                </div>
              </div>

            </div>

            <div class="d-flex flex-column">

              <div class="bookWrapper authorBookWrapper">
                <div class="bookImg">
                  <div class="bookView">
                    <div class="bookIconWrapper">
                      <a href="">
                        <i class="fas fa-search fa-1x "></i>
                      </a>
                    </div>

                  </div>
                  <img src="https://template.hasthemes.com/koparion/koparion/img/product/11.jpg" alt="book" />
                </div>
                <div class="bookDetail">
                  <div class="bookName">Harry Potter</div>
                  <div class="d-flex align-items-center">
                    <p class="bookPrice">100$</p>
                    <p class="bookPriceActual">100$</p>
                  </div>



                </div>
                <div class="tagContainer d-flex flex-column">
                  <div class="saleTag sale">5%</div>
                  <div class="saleTag new">NEW</div>
                </div>
              </div>

              <div class="bookWrapper authorBookWrapper">
                <div class="bookImg">
                  <div class="bookView">
                    <div class="bookIconWrapper">
                      <a href="">
                        <i class="fas fa-search fa-1x "></i>
                      </a>
                    </div>

                  </div>
                  <img src="https://template.hasthemes.com/koparion/koparion/img/product/7.jpg" alt="book" />
                </div>
                <div class="bookDetail">
                  <div class="bookName">Harry Potter</div>
                  <p class="bookPrice">100$</p>
                </div>
                <div class="tagContainer d-flex flex-column">
                  <div class="saleTag sale">5%</div>
                  <div class="saleTag new">NEW</div>
                </div>
              </div>

            </div>

            <div class="d-flex flex-column">

              <div class="bookWrapper authorBookWrapper">
                <div class="bookImg">
                  <div class="bookView">
                    <div class="bookIconWrapper">
                      <a href="">
                        <i class="fas fa-search fa-1x "></i>
                      </a>
                    </div>

                  </div>
                  <img src="https://template.hasthemes.com/koparion/koparion/img/product/3.jpg" alt="book" />
                </div>
                <div class="bookDetail">
                  <div class="bookName">Harry Potter</div>
                  <div class="d-flex align-items-center">
                    <p class="bookPrice">100$</p>
                    <p class="bookPriceActual">100$</p>
                  </div>



                </div>
                <div class="tagContainer d-flex flex-column">
                  <div class="saleTag sale">5%</div>
                  <div class="saleTag new">NEW</div>
                </div>
              </div>

              <div class="bookWrapper authorBookWrapper">
                <div class="bookImg">
                  <div class="bookView">
                    <div class="bookIconWrapper">
                      <a href="">
                        <i class="fas fa-search fa-1x "></i>
                      </a>
                    </div>

                  </div>
                  <img src="https://cdn.chanhtuoi.com/uploads/2018/05/w400/nhung-cuon-sach-hay-6.jpg.webp" alt="book" />
                </div>
                <div class="bookDetail">
                  <div class="bookName">Harry Potter</div>
                  <p class="bookPrice">100$</p>
                </div>
                <div class="tagContainer d-flex flex-column">
                  <div class="saleTag sale">5%</div>
                  <div class="saleTag new">NEW</div>
                </div>
              </div>

            </div>


          </section>
        </div>

      </div>
    </section>

  </section>

  <section id="hotDeal">

    <!-- <div class="row"> -->
    <div class="container-fluid pt-5 pb-5 row pl-5">
      <div class="col-6 d-flex justify-content-center banner-shadow-hover" style="background:#95C7E6">
        <a href="#">
          <img src="./img//bgImage1.jpg" />
        </a>
      </div>
      <div class="col-6 banner-shadow-hover justify-content-center d-flex">
        <a href="#">
          <img src="./img//bgImage2.jpg" />
        </a>
      </div>

    </div>
    <!-- </div> -->

  </section>


  <section id="bookByCategory" class="mb-5">

    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12 ml-5 mr-5 pl-0 pr-0">
        <div class="row no-wrap">

          <div class="col-lg-4 col-md-4 col-sm-12 col-12 ml-lg-3 ml-md-2 flex-column row">
            <h4>Book</h4>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <a class="bookCategoryItemName" href="./product?id_product=1">
                  <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/5.jpg" />
                </a>
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <a class="bookCategoryItemName" href="./product?id_product=1">
                    Hello world
                  </a>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/1.jpg" />
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <div class="bookCategoryItemName">
                    Hello world
                  </div>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <img class="bookCategoryItemImg" src="https://salt.tikicdn.com/cache/w1200/ts/product/ee/a9/50/d23e2d4dc76e4870cab66b76d48f8801.jpg" />
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <div class="bookCategoryItemName">
                    Hello world
                  </div>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>

            </div>


          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 col-12 ml-lg-3 ml-md-2 flex-column row">
            <h4>Book</h4>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <img class="bookCategoryItemImg" src="https://salt.tikicdn.com/cache/400x400/ts/product/b7/b1/16/9e6bafeea8f51e96883cbe29ebe8f331.jpg" />
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <div class="bookCategoryItemName">
                    Hello world
                  </div>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <img class="bookCategoryItemImg" src=https://vn-live-05.slatic.net/p/e2e0f0b7b059903dace419667117a03c.jpg_720x720q80.jpg_.webp" />
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <div class="bookCategoryItemName">
                    Hello world
                  </div>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/22.jpg" />
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <div class="bookCategoryItemName">
                    Hello world
                  </div>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 col-12 ml-lg-3 ml-md-2 flex-column  row">
            <h4>Book</h4>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/27.jpg" />
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <div class="bookCategoryItemName">
                    Hello world
                  </div>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/28.jpg" />
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <div class="bookCategoryItemName">
                    Hello world
                  </div>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bookCategoryItem">
              <div class="bookCategoryItemImgWrapper">
                <img class="bookCategoryItemImg" src="https://template.hasthemes.com/koparion/koparion/img/product/29.jpg" />
              </div>
              <div class="d-flex flex-column">
                <?php generateRating(5) ?>

                <div class="bookCategoryItemWrapper">
                  <div class="bookCategoryItemName">
                    Hello world
                  </div>
                  <div class="bookCategoryItemPrice d-flex">
                    <div class="currentPrice ml-1">$30.00</div>
                    <div class="actualPrice">$30.00</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




      <div class="col-lg-2 col-md-12 col-sm-12">
        <form class="blockLetter">
          <h2>Sign up for send letter</h2>
          <p style="color:#fff">You can be always up to date with our company new!</p>
          <input type="text" placeholder="Enter your email address">

          <button class="btn mt-4" type="submit">Send email</button>
        </form>
      </div>
    </div>
    </div>


  </section>



  <section id="lastTweet" class="container-fluid">

    <div class="row">

      <div class="col-6">
        <div class="jumbotron">
          <h4>LATEST TWEETS</h4>
          <div class="row">
            <div class="col-4 row d-flex justify-content-center">
              <div class="avatar">
                <i class="fab fa-twitter" style="color:#fff"></i>
              </div>
            </div>

            <div class="col-8">
              <div class="row">
                Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum notare quam
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="jumbotron">
          <h4>Stay connected</h4>
          <div class="row" id="social">
            <div class="avatar mr-2">
              <a href="">
                <i class="fab fa-twitter" style="color:black"></i>
              </a>
            </div>
            <div class="avatar mr-2">
              <a href="">
                <i class="fab fa-google" style="color:black"></i>
              </a>
            </div>
            <div class="avatar mr-2">
              <a href="">
                <i class="fab fa-facebook" style="color:black"></i>
              </a>
            </div>
            <div class="avatar mr-2">
              <a href="">
                <i class="fab fa-youtube" style="color:black"></i>
              </a>
            </div>
            <div class="avatar mr-2">
              <a href="">
                <i class="fab fa-flickr" style="color:black"></i>
              </a>
            </div>
            <div class="avatar mr-2">
              <a href="">
                <i class="fab fa-vimeo" style="color:black"></i>
              </a>
            </div>
            <div class="avatar mr-2">
              <a href="">
                <i class="fab fa-instagram" style="color:black"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>


  <?php
  require_once dirname(__FILE__) . "./shared/" . 'Footer.php';
  ?>
</body>
<script src="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js" crossorigin="anonymous"></script>

<script>
  let owlCarouselTabOption = {
    loop: false,
    nav: true,
    slideSpeed: 5000,
    // autoplay: true,
    // autoplayTimeout: 2000,
    rewind: true,
    autoplayHoverPause: true,
    mouseDrag: true,
    navText: ["<i class='fa fa-angle-left fa-2x newArrivalNavButton navLeftButton'></i>", "<i class='fa fa-angle-right navRightButton fa-2x newArrivalNavButton'></i>"],
    // margin: 10,
    responsiveClass: true,
    items: 2,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items: 2,
        nav: true
      },
      768: {
        items: 3,
        nav: false
      },
      992: {
        items: 4,
        nav: true,
        loop: false
      },
      1200: {
        items: 4,
        nav: true,
        loop: false
      }
    }
  }
</script>


<script>
  function changeSlideAnimatition(event) {
    var item = event.item.index - 2; // Position of the current item
    // console.log($(".owl-item"));
    let listOwlItem = document.getElementById("mainSlide").getElementsByClassName("owl-item");

    // $(".owl-item")
    for (let i = 0; i < listOwlItem.length; i++) {
      if (listOwlItem[i].classList.length) {
        let element = listOwlItem[i].children[0];
        element.getElementsByClassName("slideHeader")[0].classList.remove("animate__animated", "animate__backInLeft");
        element.getElementsByClassName("slideHeader2")[0].classList.remove("animate__animated", "animate__backInRight");
        element.getElementsByClassName("slideBtn")[0].classList.remove("animate__animated", "animate__backInDown");

        // console.log(element.getElementsByClassName("slideHeader2"));
      }
    }


    $('h1').removeClass('animated bounce');
    $('.owl-item').find('.slideHeader').not('.cloned').eq(item).removeClass('animate__animated animate__backInLeft').addClass('animate__animated animate__backInLeft');
    $('.owl-item').find('.slideHeader2').not('.cloned').eq(item).removeClass('animate__animated animate__backInRight').addClass('animate__animated animate__backInRight');
    $('.owl-item').find('.slideBtn').not('.cloned').eq(item).removeClass('animate__animated animate__backInDown').addClass('animate__animated animate__backInDown');
  }

  $(document).ready(function() {

    // var owl = $('.owl-carousel');/
    var owl = $('#mainSlide');
    owl.on('initialized.owl.carousel', changeSlideAnimatition);
    owl.owlCarousel({
      nav: true,
      autoplay: true,
      autoplayTimeout: 4000,
      slideSpeed: 5000,
      loop: false,
      navText: ["<i class='fa fa-angle-left fa-4x navButton'></i>", "<i class='fa fa-angle-right fa-4x navButton'></i>"],
      items: 1,
      rewind: true
    });
    owl.on('changed.owl.carousel', changeSlideAnimatition);
  });
</script>
<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>

<script>
  $(document).ready(function() {
    $("#newArrivalSlide").owlCarousel({
      ...owlCarouselTabOption,
      pagination: false,
    });
    $("#onSaleSlide").owlCarousel({
      ...owlCarouselTabOption,
      pagination: false,
    });

    $("#productSlide").owlCarousel({
      ...owlCarouselTabOption,
      pagination: false,
    });

  })
</script>

<script>
  $(document).ready(function() {
    $("#authorSlide").owlCarousel({
      ...owlCarouselTabOption,
      navText: ["<i class='fa fa-angle-left fa-2x authorSlideBtn navLeftButton'></i>", "<i class='fa fa-angle-right navRightButton fa-2x authorSlideBtn'></i>"],
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 1,
          nav: true
        },
        768: {
          items: 1,
          nav: false
        },
        992: {
          items: 1,
          nav: true,
          loop: false
        },
        1200: {
          items: 2,
          nav: true,
          loop: false
        }
      }
    })
  })
</script>

</html>