
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contact Us</title>
  <!-- Bootstrap 4.6 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/contact.css">
  
</head>
<body>

<section class="hero d-flex flex-column">
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top w-100 px-5">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="home.php">Ceylon Panorama</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>

          <!-- Themes Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="themesDropdown" data-toggle="dropdown">Themes</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="nature.php">Nature</a>
              <a class="dropdown-item" href="adventure.php">Adventure</a>
              <a class="dropdown-item " href="culture.php">Culture</a>
            </div>
          </li>

          <!-- Services Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" data-toggle="dropdown">Services</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="service.php#hotels">Hotels</a>
              <a class="dropdown-item" href="service.php#medicare">Medicare</a>
              <a class="dropdown-item" href="service.php#transport">Transport</a>
              <a class="dropdown-item" href="service.php#tourguide">Tour Guide</a>
            </div>
          </li>

          <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
          <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
          <li class="nav-item ml-3">
            <a class="nav-link" href="cart.php">
              <img src="cart.png" alt="Cart" width="30" height="30">
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container1">
    <h1 class="fw-bold">All Roads Lead Here</h1>
    <p class="lead">Every Corner | Every Culture | One Panorama</p>
  </div>
</section>

<div class="container">
  <table>
    <tr>
      <tD>
  <div class="contact-info">
    <h1>Contact Us</h1>
    <p>Have questions or need assistance?.</p>
    <div class="info-item">
      <strong>Email:</strong> <a href="mailto:info@touristwebsite.com">info@touristwebsite.com</a>
    </div>
    <div class="info-item">
      <strong>Phone:</strong> <a href="tel:+1234567890">+1 (234) 567-890</a>
    </div>
    <div class="info-item">
      <strong>Address:</strong> 123 Travel Lane, Adventure City
    </div>
  </div>
  </tD>
  <td>
    <div class="two"><h1>About Us</h1>
    
    <p>Welcome to [Your Website/Company Name], <br>your ultimate travel companion! <br>We are passionate about discovering hidden gems,<br> iconic landmarks, and unforgettable experiences <br>around the world.</p>
    <p>Feel free to contact us.</p>
  </div></td>
  </tr>
  </table>

  <div class="faq-container">
    <h2>Frequently Asked Questions</h2>

    <div class="faq-item">
      <div class="faq-question" onclick="toggleFAQ(this)">What is your return policy? <span>+</span></div>
      <div class="faq-answer">We accept returns within 30 days of purchase. The item must be unused and in its original packaging.</div>
    </div>

    <div class="faq-item">
      <div class="faq-question" onclick="toggleFAQ(this)">Do you offer international shipping? <span>+</span></div>
      <div class="faq-answer">Yes, we ship worldwide! Delivery times may vary depending on your country.</div>
    </div>

    <div class="faq-item">
      <div class="faq-question" onclick="toggleFAQ(this)">How can I contact customer support? <span>+</span></div>
      <div class="faq-answer">You can reach us via the Contact Us page or by emailing support@example.com.</div>
    </div>
  </div>
</div>

<Section class="map">
    <div class="container my-5">
    <h2 class="text-center mb-4">Our Location</h2>
    <div class="map-responsive">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.019318834346!2d80.0386008!3d6.8209774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25b7a3f0c5a4f%3A0x6c4820c35b2d7f8a!2sNSBM+Green+University!5e0!3m2!1sen!2slk!4v1694059512345"
        width="300" 
        height="200" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
      </iframe>
    </div>
</Section>

<footer class="footer">
  <div class="footer-container">
    <div class="footer-about">
      <h2 class="logo">Ceylon Panorama</h2>
      <p>We provide you with the best travel experience in Sri Lanka. Our team of experts will help you plan your trip according to your preferences.</p>
      <div class="footer-social">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <div class="footer-links">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="home.html#themes-section">Themes</a></li>
        <li><a href="home.html#services">Services</a></li>
        <li><a href="products.html">Products</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </div>

    <div class="footer-info">
      <h3>Information</h3>
      <p><strong>Phone:</strong> +123-234-1234</p>
      <p><strong>Email:</strong> hello@awesomesite.com</p>
      <p><strong>Address:</strong> 99 Roving St, Big City, PKU 23456</p>
      <p><strong>Opening Hours:</strong><br>
        <span class="open-24">Open 24 Hours / 7 Days</span>
      </p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>Copyright © 2023 Ceylon Panorama | All Right Reserved | Design by R</p>
  </div>
</footer>

<script>
function toggleFAQ(element) {
  const answer = element.nextElementSibling;
  answer.classList.toggle("open");
  const symbol = element.querySelector("span");
  symbol.textContent = answer.classList.contains("open") ? "-" : "+";
}
</script>

</body>
</html>
