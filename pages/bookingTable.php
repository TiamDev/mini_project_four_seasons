<section id="book-a-table" class="book-a-table">
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="row text-center section-header mt-5">
      <h5>BOOK A TABLE</h5>
      <p class="secondery-font fs-2">Book <span class="text-main">Your Stay </span>With Us</p>
    </div>

    <div class="row g-0 book-a-table-contant">
      <div class="col-lg-4 reservation-img " style=" background-image: url('./assets/images/gallery-1.jpg');" data-aos="zoom-out" data-aos-delay="200">
      </div>
      <div class="col-lg-8 d-flex align-items-center reservation-form my-4 ">
        <form action="" method="post" role="form" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="" data-rule="minlen:4" data-msg="Please enter at least 4 chars" fdprocessedid="x2e1ri">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="email" class="form-control" name="email" id="email" required="" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" fdprocessedid="rjef44">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" fdprocessedid="ka0x59">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="date" name="date" class="form-control" required="" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars" fdprocessedid="3t0v8">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6">
              <select class="form-select" name="time" required="" aria-label="Default select example" data-rule="minlen:4" data-msg="Please enter at least 4 chars" fdprocessedid="2bhwu7">
                <?php
                $start_time = strtotime('8:00 AM');
                $end_time = strtotime('11:30 PM');
                while ($start_time <= $end_time) {
                  $time_option = date('g:i A', $start_time);
                  echo "<option value=" . $time_option . ">$time_option</option>";
                  $start_time += 1800; //+(30m*60s)
                }
                ?>
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="number" class="form-control" name="people" required="" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars" min="1">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <!-- add message alert -->
            <?php if (isset($_POST['booking'])) {
            ?>
              <div class="alert alert-warning mt-2 " role="alert">
                Sent Email Succesfully !
              </div>
            <?php } ?>
          </div>
          <div class="text-center">
            <button name="booking" type="submit" class="mainbtn">Book a Table</button>
          </div>
        </form>
      </div>
      <!-- End Reservation Form -->
    </div>
  </div>
</section>
<script src='/four_seasons/node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>

<script>
  // الحصول على عنصر حقل التاريخ
  var dateField = document.getElementById("date");

  // الحصول على تاريخ اليوم
  var today = new Date();
  var year = today.getFullYear();
  var month = (today.getMonth() + 1).toString().padStart(2, '0');
  var day = today.getDate().toString().padStart(2, '0');
  var formattedDate = year + '-' + month + '-' + day;
  // تعيين التاريخ الأدنى المسموح به إلى التاريخ الحالي
  dateField.setAttribute("min", formattedDate);
</script>