<section id="contact" class="contact">
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="row section-title  mt-5">
      <h5>CONTACT</h5>
      <p class="secondery-font fs-2">Need Help? <span class="text-main">Contact Us</span></p>
    </div>

    <div class="mb-3">
      <iframe style="border:0; width: 100%; height: 200px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen=""></iframe>
    </div><!-- End Google Maps -->

    <div class="row gy-4">

      <div class="col-md-6">
        <div class="info-item  d-flex align-items-center">
          <i class="icon fa fa-map flex-shrink-0"></i>
          <div>
            <h3>Our Address</h3>
            <p>A108 Adam Street, New York, NY 535022</p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-6">
        <div class="info-item d-flex align-items-center">
          <i class="icon fa fa-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>contact@example.com</p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-6">
        <div class="info-item  d-flex align-items-center">
          <i class="icon fas fa-phone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>+1 5589 55488 55</p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-6">
        <div class="info-item  d-flex align-items-center">
          <i class="icon fa-solid fa-share-nodes flex-shrink-0"></i>
          <div>
            <h3>Opening Hours</h3>
            <div><strong>Mon-Sat:</strong> 11AM - 23PM;
              <strong>Sunday:</strong> Closed
            </div>
          </div>
        </div>
      </div><!-- End Info Item -->

    </div>

    <form action="contact" method="post" role="form" class="php-email-form p-3 p-md-4">
      <div class="row">
        <div class="col-xl-6 form-group">
          <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="" fdprocessedid="3gbd7n">
        </div>
        <div class="col-xl-6 form-group">
          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="" fdprocessedid="qx86v">
        </div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="" fdprocessedid="4k0ise">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
      </div>
      <div class="mb-3">
        <!-- add message alert -->
        <?php if (isset($_POST['send'])) {
        ?>
          <div class="alert alert-warning mt-2 " role="alert">
            Sent Email Succesfully !
          </div>
        <?php } ?>
      </div>
      <div class="text-center"><button type="submit" class="mainbtn" name="send">Send Message</button>
      </div>
    </form><!--End Contact Form -->

  </div>
</section>