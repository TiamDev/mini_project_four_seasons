<?php
function print_categories_menu($categoryid)
{
  global $conn;
  // require_once('db.php');
  $sql = "SELECT * FROM menu Where category_id=" . $categoryid . " LIMIT 6";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      $getCategory = "SELECT name FROM category WHERE id='" . $row["category_id"] . "'";
      $categoryResult = $conn->query($getCategory);
      $categoryRow = $categoryResult->fetch_assoc();
      $categoryName = @$categoryRow["name"];
      echo $meal = '
        <div class="col-lg-4 menu-item">
                <a href="../' . $row['image'] . '" class="glightbox"><img
                    src="' . ROOT_PATH . 'assets/images/menu/' . $row['image'] . '" class="menu-img img-fluid" alt=""></a>
                    <h4>' . $row['name'] . '</h4>
                    <p class="text-center">
                    ' . $row['description'] . '
                </p>
                <p class="price">
                  $' . $row['price'] . '
                </p>
              </div>';
    }
  } else {
    echo "0 results";
  }
}
?>

<!-- Hero -->
<section>
  <div class="hero">
    <div class="container position-relative text-center text-lg-start">
      <div class=" row ">
        <div class="col-lg-8">
          <h1 class="secondery-font">Welcome to <span>four<span class="text-main">Sea</span>sons</span></h1>
          <p class="sub-title secondery-font">Delivering great food for more than 18 years!</p>
          <div class="btns mt-5 ">
            <a href="menu" class=" btn-hero  m-1 ">Our Menue</a>
            <a href="bookingtable" class=" btn-hero m-1 ">Book a Table</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- about As -->
<section class="about-us" id="About">
  <div class="container">
    <div class="row section-title mt-5">
      <h5>About Us</h5>
      <p class="secondery-font fs-2">Learn More <span class="text-main">About Us</span></p>
    </div>
    <div class="row">
      <div class="col-lg-6 col-sm-12">
        <div class="img-box position-relative">
          <div class="position-absolute play-box">
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class=" play-btn"></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-sm-12 ">
        <div class="detail-box">
          <p>
            We are a passionate team dedicated to providing a memorable dining experience.</p>
          <ul>
            <li class="about-us-li">Delicious and High-Quality Dishes.</li>
            <li class="about-us-li">Fresh, Locally Sourced Ingredients</li>
            <li class="about-us-li">Attentive and Friendly Service.</li>
            <li class="about-us-li">Inviting and Stylish Ambiance.</li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="whyAs-counter">
  <div class="container ">
    <div class="section-title ">
      <h5 class="text-center my-4 text-white">Why Us</h5>
    </div>
    <div class="row row-cols-3 row-cols-md-3 g-4">
      <div class="col">
        <div class="card text-center">
          <i class="fa-solid fa-gauge-simple-high fs-1 text-main"></i>
          <div class="card-body">
            <h5 class="card-title text-white secondery-font">Fast Order</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center ">
          <i class="fas fa-certificate fs-1 text-main"></i>
          <div class="card-body">
            <h5 class="card-title text-white secondery-font">High Quality</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <i class="fas fa-star  fs-1 text-main"></i>
          <div class="card-body">
            <h5 class="card-title text-white secondery-font">4 Star</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- menu -->
<section id="menu" class="menu menu-home">
  <div class="container" data-aos="fade-up">

    <div class="section-title my-5">
      <h5>Menu</h5>
      <p class="secondery-font fs-2">Check Our four<span class="text-main">Sea</span>sons Menu</p>
    </div>

    <ul class="nav nav-tabs d-flex justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" role="tablist">

      <li class="nav-item" role="presentation">
        <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#menu-starters" aria-selected="false" role="tab" tabindex="-1">
          <h4>Salad</h4>
        </a>
      </li><!-- End tab nav item -->

      <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast" aria-selected="false" role="tab" tabindex="-1">
          <h4>Breakfast</h4>
        </a><!-- End tab nav item -->

      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch" aria-selected="false" role="tab" tabindex="-1">
          <h4>Lunch</h4>
        </a>
      </li><!-- End tab nav item -->

      <li class="nav-item" role="presentation">
        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#menu-dinner" aria-selected="true" role="tab">
          <h4>Dinner</h4>
        </a>
      </li><!-- End tab nav item -->

    </ul>

    <!-- <div class="tab-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="300"> -->
    <div class="tab-content ">
      <div class="tab-pane fade" id="menu-starters" role="tabpanel">
        <div class="tab-header text-center">
          <!-- <p>Menu</p> -->
          <h3 class="secondery-font">Salad</h3>
        </div>
        <div class="row gy-5">
          <?php print_categories_menu(4); ?>
        </div>
      </div><!-- End Starter Menu Content -->
      <div class="tab-pane fade" id="menu-breakfast" role="tabpanel">

        <div class="tab-header text-center">
          <!-- <p>Menu</p> -->
          <h3 class="secondery-font">Breakfast</h3>
        </div>

        <div class="row gy-5">

          <?php print_categories_menu(3); ?>

        </div>
      </div><!-- End Breakfast Menu Content -->

      <div class="tab-pane fade" id="menu-lunch" role="tabpanel">

        <div class="tab-header text-center">
          <!-- <p>Menu</p> -->
          <h3 class="secondery-font">Lunch</h3>
        </div>
        <div class="row gy-5">

          <?php print_categories_menu(2); ?>

        </div>
      </div><!-- End Lunch Menu Content -->

      <div class="tab-pane fade active show" id="menu-dinner" role="tabpanel">

        <div class="tab-header text-center">
          <!-- <p>Menu</p> -->
          <h3 class="secondery-font">Dinner</h3>
        </div>

        <div class="row gy-5">
          <?php print_categories_menu(1); ?>
        </div>
      </div><!-- End Dinner Menu Content -->

    </div>

  </div>
</section>
<!-- chefs -->

<section id="chefs" class="chefs mt-5">
  <div class="container aos-init aos-animate" data-aos="fade-up">

    <div class="section-title my-5">
      <h5>CHEFS</h5>
      <p class="secondery-font fs-2">Our <span class="text-main">Proffesional</span> Chefs</p>
    </div>

    <div class="row">

      <div class="col-lg-4 col-md-4 col-sm-12 col-md-6">
        <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
          <img src="./assets/images/chefs/chefs-1.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Walter White</h4>
              <span>Master Chef</span>
            </div>
            <div class="social">
              <a href=""><i class="fa-brands fa-twitter"></i></a>
              <a href=""><i class="fa-brands fa-facebook"></i></a>
              <a href=""><i class="fa-brands fa-instagram"></i></a>
              <a href=""><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 col-md-6">
        <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
          <img src="./assets/images/chefs/chefs-2.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Sarah Jhonson</h4>
              <span>Patissier</span>
            </div>
            <div class="social">
              <a href=""><i class="fa-brands fa-twitter"></i></a>
              <a href=""><i class="fa-brands fa-facebook"></i></a>
              <a href=""><i class="fa-brands fa-instagram"></i></a>
              <a href=""><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 col-md-6">
        <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
          <img src="./assets/images/chefs/chefs-3.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>William Anderson</h4>
              <span>Cook</span>
            </div>
            <div class="social">
              <a href=""><i class="fa-brands fa-twitter"></i></a>
              <a href=""><i class="fa-brands fa-facebook"></i></a>
              <a href=""><i class="fa-brands fa-instagram"></i></a>
              <a href=""><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>