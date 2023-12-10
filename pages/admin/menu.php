<?php
// 
if(isset($_POST['delete'])){
  $meal_delete=$_POST['delete'];
  $deleteMeal = "DELETE FROM menu WHERE id=".$meal_delete;
  if ($conn->query($deleteMeal) === TRUE) {
    echo "<script>
    Swal.fire({
      title: 'Deleted successfully',
      icon: 'success',
      confirmButtonText: 'OK'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'menu';
      }
    });;
    </script>";
  
  } else {
    echo "An error occurred while deleting the meal: " . $conn->error;
  }

}
//
function categoryType($categoryName){
  if($categoryName=='Dinner'){
    return '<span class="badge rounded-pill bg-info">'.$categoryName.'</span>';
  }else if($categoryName=='Lunch'){
    return '<span class="badge rounded-pill bg-danger">'.$categoryName.'</span>';

  }else if($categoryName=='Breakfast'){
    return '<span class="badge rounded-pill bg-warning">'.$categoryName.'</span>';

  }else{
    return '<span class="badge rounded-pill bg-success">'.$categoryName.'</span>';

  }
}

function printMenu(){
  global $conn;
  // require_once('db.php');
  $sql = "SELECT * FROM menu";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      $getCategory = "SELECT name FROM category WHERE id='" . $row["category_id"] . "'";
      $categoryResult = $conn->query($getCategory);
      $categoryRow = $categoryResult->fetch_assoc();
            $categoryName = @$categoryRow["name"];

        echo $meal='<tr class="menu-item" data-category="'. $row["category_id"] .'">
        <th scope="row">
          <a href="'.$row["image"].'" class="glightbox">
          <img src="'.ROOT_PATH.'assets/images/menu/'.$row["image"].'" alt="" width="110px"></a>
        </th>
        <td class="pt-5 fs-5 secondery-font"><a href="#" class="fw-bold">'.$row["name"] .'</a></td>
        <td class="pt-5 fs-6 secondery-font"><a href="#" class="fw-bold">'.$row["description"] .'</a></td>

        <td class="pt-5 fs-5"><span class="fs-6">$</span>'.$row["price"] .'</td>
        <td class="pt-5">'.categoryType($categoryName).'</td>
        <td class="pt-5 manage-btn">  
        <form action="edit" method="post">
        <button type="submit" name="edit" value="'.$row["id"].'" class="btn btn-outline-secondary add-meal-btn"><i class="fa fa-pen-to-square"></i></button>
        </form>       
        <form action="menu" method="post">
          <button type="submit" name="delete" value="'.$row["id"].'" class="btn btn-outline-danger add-meal-btn"><i class="fa-solid fa-trash-can"></i></button>
        </form>       

        </td>
        
      </tr>';
    }
    } else {
        echo "0 results";
    }
  
}


?>

  <main class="menu">
    <div class="container ">
      <div class="row justify-content-end">
      <!-- <a href="add" class=" add-btn">+ Add</a> -->

      </div>

      <div class="row ">
        <div class="col-12">
          <div class="card top-selling overflow-auto">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-lg-10 col-md-8 col-sm-8">
                  <div class="d-flex">
                  <a href="add" class=" btn btn-warning fs-5">+</a>

<h5 class="card-title secondery-font fs-2 pt-2 d-inline-block m-0">Menu </h5>

                  </div>
                
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 box-add-meal-btn">
                <select name="category" id="category" class="form-select" onchange="filterMenu()">
                    <option value="all">All</option>
                    <?php //get categorys from database 
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

                </div>
              </div>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col ">Preview</th>
                    <th scope="col">Meal</th>
                    <th scope="col">Ingredients</th>

                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <hr>
                <tbody>
                  <?php

                 printMenu();
                 
                   ?>
                </tbody>
              </table>

            </div>

          </div>
        </div>
      </div>
    </div>
  </main>
<script>
  
  function filterMenu() {
      var categoryId = document.getElementById('category').value;
      var menuItems = document.getElementsByClassName('menu-item');

      for (var i = 0; i < menuItems.length; i++) {
        var item = menuItems[i];
        var itemCategory = item.getAttribute('data-category');

        if (itemCategory == categoryId || categoryId == 'all') {
          item.style.display = 'table-row';
        } else {
          item.style.display = 'none';
        }
      }
    }
</script>