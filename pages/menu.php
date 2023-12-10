<?php
function print_categories_menu($categoryid)
{
  global $conn;
  // require_once('db.php');
  $sql = "SELECT * FROM menu Where category_id=" . $categoryid;
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

<section id="menu" class="menu ">
  <div class="container" data-aos="fade-up">

    <div class="section-title pt-5">
      <p class="secondery-font fs-2 pt-5 mt-5">Check Our four<span class="text-main">Sea</span>sons Menu</p>
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
          <h3 class="secondery-font">Salad</h3>
        </div>
        <!-- Salad -->

        <div class="row gy-5">
          <?php print_categories_menu(4); ?>
        </div>
      </div><!-- End Starter Menu Content -->

      <div class="tab-pane fade" id="menu-breakfast" role="tabpanel">

        <div class="tab-header text-center">
          <h3 class="secondery-font">Breakfast</h3>
        </div>
        <!-- Breakfast -->

        <div class="row gy-5">

          <?php print_categories_menu(3); ?>


        </div>
      </div><!-- End Breakfast Menu Content -->

      <div class="tab-pane fade" id="menu-lunch" role="tabpanel">

        <div class="tab-header text-center">
          <h3 class="secondery-font">Lunch</h3>
        </div>
        <!-- Lunch -->
        <div class="row gy-5">

          <?php print_categories_menu(2); ?>


        </div>
      </div><!-- End Lunch Menu Content -->

      <div class="tab-pane fade active show" id="menu-dinner" role="tabpanel">

        <div class="tab-header text-center">
          <h3 class="secondery-font">Dinner</h3>
        </div>

        <!-- Dinner -->
        <div class="row gy-5">
          <?php print_categories_menu(1); ?>

        </div>
      </div><!-- End Dinner Menu Content -->

    </div>

  </div>
</section>