// function openModal() {
//   var modalOverlay = document.createElement("div");
//   modalOverlay.classList.add("modal-overlay");

//   var modalContent = document.createElement("div");
//   modalContent.classList.add("modal-content");
//   modalContent.innerHTML = `
//   <form action="/four_seasons/admin/menu.php" method="post" role="form" class="p-3 p-md-4" enctype="multipart/form-data">
// <div class="form-group">
// <input type="file" class="form-control"  name="meal_image" id="meal_image" required="" onchange="previewImage(event)">
// </div>
// <div class="form-group">
// <input type="text" class="form-control" name="meal_name" placeholder="Meal Name" required="">
// </div>
// <div class="form-group">
// <textarea class="form-control" name="meal_description" rows="3" placeholder="Meal Description" required=""></textarea>
// </div>
// <div class="form-group">
// <input type="number" class="form-control" name="meal_price" placeholder="Meal Price" required="">
// </div>
// <select class="form-select" name="meal_category" aria-label="Default select example" data-rule="minlen:4"
// data-msg="Please enter at least 4 chars" fdprocessedid="2bhwu7">
// <option selected disabled>Category</option>
// <option value="1">Dinner</option>
// <option value="2">Lunch</option>
// <option value="3">BreakFast</option>
// <option value="4">Saled</option>

// </select>
// <div class="text-center">
// <button type="submit" name="add" class="mainbtn">ADD</button>
// </div>
// </form>
//   `;

//   modalOverlay.appendChild(modalContent);
//   document.body.appendChild(modalOverlay);
// }
// var imageSelected = false;

// function previewImage(event) {
// if (!imageSelected) {
//   var reader = new FileReader();
//   reader.onload = function() {
//     var output = document.createElement('img');
//     output.src = reader.result;
//     output.style.maxWidth = "200px"; // تحديد حجم الصورة المعروضة
//     var container = document.getElementsByClassName('form-group')[0];
//     container.insertBefore(output, container.firstChild);

//     imageSelected = true;
//     document.getElementById('meal_image').disabled = true;
//   };
//   reader.readAsDataURL(event.target.files[0]);
// }
// }