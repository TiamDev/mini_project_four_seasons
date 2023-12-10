
<?php

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["add"])) {
  
    $meal_image = $_FILES["meal_image"]["name"];
  // if (is_uploaded_file($_FILES['meal_image']['tmp_name'])) {
    $meal_name = $_POST["meal_name"];
    $meal_description = $_POST["meal_description"];
    $meal_price = $_POST["meal_price"];
    $meal_category = $_POST["meal_category"];
    // حفظ الصورة في مجلد التخزين
    $targetDir = BASE_PATH."\\assets\\images\\menu\\";
    if ( ! is_writeable ( $targetDir ) ){
      echo "is writeable";
    }else{
      echo "is not writeable";
    }
    $targetFile = $targetDir . basename($_FILES["meal_image"]["name"]);
    if(move_uploaded_file($_FILES["meal_image"]["tmp_name"], $targetFile)){
  
    // حفظ رابط الصورة في جدول قاعدة البيانات
    $imageURL = $_FILES["meal_image"]["name"];
    $sql = "INSERT INTO menu (image, name, description, price,category_id) VALUES ('$imageURL', '$meal_name', '$meal_description', '$meal_price','$meal_category')";
    if ($conn->query($sql) === TRUE) {
      echo "
      <script src='/four_seasons/node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>

      <script>
      Swal.fire({
        text: 'Add successfully',
        icon: 'success',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'menu';
        }
      });;
      </script>";
        // print_r($_FILES["meal_image"]["name"]);
  
    } else {
        // echo "حدث خطأ أثناء حفظ البيانات: " . $conn->error;
        // print_r($_FILES["meal_image"]["name"]);

    }
    // print_r($_FILES["meal_image"]["name"]);

   }
  
  }

?>

<div class="container">
  <div class="box-meal">
  <h1 class="secondery-font text-center pt-4" >Add New Meal in<span class="text-main"> the Menu</span></h1>
<div class="row add-meal-box">
  <div class="col-lg-5 col-sm-12 d-flex justify-content-center">
    <img class="defult-image" src="/four_seasons/assets/images/empty.jpeg">
  </div>
  <div class="col-lg-7 col-sm-12 px-5 pt-4">
<form action="" method="post" role="form" enctype="multipart/form-data">
<div class="form-group">
<input type="file" class="form-control"  name="meal_image" id="meal_image" required="" onchange="previewImage(event)">
</div>
<div class="form-group">
<input type="text" class="form-control" name="meal_name" placeholder="Meal Name" required="">
</div>
<div class="form-group">
<textarea class="form-control" name="meal_description" rows="3" placeholder="Meal Description" required=""></textarea>
</div>
<div class="form-group">
<input type="number" class="form-control" name="meal_price" step="any" placeholder="Meal Price" required="">
</div>
<select class="form-select" name="meal_category" aria-label="Default select example" data-rule="minlen:4"
data-msg="Please enter at least 4 chars" fdprocessedid="2bhwu7">
<option selected disabled>Category</option>
<?php //get category from database 
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) { 
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      }
    
    }

?>
</select>
<div class="text-center mt-4 mb-3">
<button type="submit" name="add" class="mainbtn">Add</button>
<button class="mainbtn"><a href="menu">Back to Menu</a></button>


</div>
</form>
</div>
</div>

  </div>
</div>
<script>
  var imageSelected = false;

let image = document.getElementsByTagName('img')[0];
function previewImage(event) {
  if (!imageSelected) {
    var reader = new FileReader();
    reader.onload = function() {
      image.src = reader.result;
      imageSelected = true;
      document.getElementById('meal_image').disabled = true;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
}

// Enable file input before form submission
document.querySelector('form').addEventListener('submit', function() {
  document.getElementById('meal_image').disabled = false;
});
</script>