<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // print_r($_POST); exit;
  if (isset($_POST["edit"])) {
      $meal_id = $_POST["edit"];
      $sql = "SELECT * FROM menu WHERE id = $meal_id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $meal_id = $row["id"];
          $meal_image = $row["image"];
          $meal_name = $row["name"];
          $meal_description = $row["description"];
          $meal_price = $row["price"];
          $meal_category = $row["category_id"];
      } else {
          echo "meal is not found !";
      }
  } elseif (isset($_POST["update"])) {
      $meal_image = $_FILES["meal_image"]["name"];
      $meal_name = $_POST["meal_name"];
      $meal_description = $_POST["meal_description"];
      $meal_price = $_POST["meal_price"];
      $meal_category = $_POST["meal_category"];
      $meal_id =$_POST["meal_id"];

      $targetDir = BASE_PATH . "\\assets\\images\\menu\\";
      if (is_writeable($targetDir)) {
          echo "is writeable " .$targetDir;
      } else {
          echo "is not writeable";
      }
      $targetFile = $targetDir . basename($_FILES["meal_image"]["name"]);
      if (move_uploaded_file($_FILES["meal_image"]["tmp_name"], $targetFile)) {
          $imageURL = $_FILES["meal_image"]["name"];
          $sql = "UPDATE menu SET image = '$imageURL', name = '$meal_name', description = '$meal_description', price = '$meal_price', category_id = '$meal_category' WHERE id = '$meal_id'";
          if ($conn->query($sql) === TRUE) {
            echo "<script>
            Swal.fire({
              text: 'Updated successfully',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'menu';
              }
            });
            </script>";
          }
      }
  }
}  
?>
<div class="container">
  <div class="box-meal">
    <h1 class="secondery-font text-center pt-4">Edit Meal <span class="text-main">Description</span></h1>
    <div class="row add-meal-box">
      <div class="col-lg-5 col-sm-12 ">
        <div class="d-flex justify-content-center">
                  <!-- عرض الصورة الحالية للوجبة -->
        <img class="defult-image" src="/four_seasons/assets/images/menu/<?php echo $meal_image; ?>">
        </div>
        <p class="secondery-font text-center"><?php echo $meal_image; ?></p>
      </div>
      <div class="col-lg-7 col-sm-12 px-5 pt-4">
        <form action="" method="post" role="form" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="meal_id" placeholder="Meal Name" required=""
            value="<?php echo $meal_id??""; ?>">
          <div class="form-group">
            <input type="file" class="form-control" name="meal_image" value="<?php echo $meal_image; ?>" onchange="previewImage(event)" id="meal_image" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="meal_name" placeholder="Meal Name" required=""
              value="<?php echo $meal_name??""; ?>">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="meal_description" rows="3" placeholder="Meal Description"
              required=""><?php echo $meal_description??""; ?></textarea>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="meal_price" placeholder="Meal Price" required=""
              value="<?php echo $meal_price??""; ?>">
          </div>
          <select class="form-select" name="meal_category" aria-label="Default select example" data-rule="minlen:4"
            data-msg="Please enter at least 4 chars" fdprocessedid="2bhwu7">
            <option selected disabled>
              <?php echo $_POST["edit"]??""; ?>
            </option>
            <?php
                        $sql = "SELECT * FROM category";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // تحديد الفئة المحددة بواسطة القيمة السابقة
                                $selected = ($row['id'] == $meal_category) ? 'selected' : '';
                                echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                            }
                        }  ?>
          </select>
          <div class="text-center mt-4 mb-3">
            <button type="submit" name="update" class="mainbtn">Update</button>
            <button class="mainbtn"><a href="menu">Back to Menu</a></button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="/four_seasons/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script>
  let image = document.getElementsByTagName('img')[0];
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
      image.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>