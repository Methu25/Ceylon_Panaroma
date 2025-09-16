<?php
// hotel.php
include "db.php"; // <-- your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_hotel'])) {
    // Common fields
    $full_name   = $_POST['full_name'] ?? '';
    $email       = $_POST['email'] ?? '';
    $phone       = $_POST['phone_number'] ?? '';
    $country     = $_POST['country'] ?? '';
    $province    = $_POST['province'] ?? '';
    $district    = $_POST['district'] ?? '';
    $town        = $_POST['town'] ?? '';

    // Hotel-specific fields
    $check_in    = $_POST['check_in_date'] ?? '';
    $check_out   = $_POST['check_out_date'] ?? '';
    $budget      = $_POST['budget_range'] ?? '';
    $guests      = $_POST['number_of_guests'] ?? '';
    $requests    = $_POST['hotel_special_requests'] ?? '';

    $stmt = $conn->prepare("INSERT INTO service_bookings 
        (full_name,email,phone_number,country,province,district,town,
         check_in_date,check_out_date,budget_range,number_of_guests,hotel_special_requests) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("ssssssssssss", 
        $full_name,$email,$phone,$country,$province,$district,$town,
        $check_in,$check_out,$budget,$guests,$requests);

    if ($stmt->execute()) {
        header("Location: FakePaymentGateway4Services.php");
        exit();
    } else {
        echo "<script>alert('Error saving booking.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hotel Booking</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f4f4;
    }
    .navbar {
      background: #333;
      color: white;
      padding: 1rem;
    }
    .hero {
      background: url('hotel-hero.jpg') no-repeat center center/cover;
      height: 50vh;
      position: relative;
    }
    .form-box {
      background: white;
      padding: 2rem;
      width: 500px;
      margin: -100px auto 0;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      border-radius: 10px;
      position: relative;
      z-index: 2;
    }
    label {
      display: block;
      margin-top: 10px;
    }
    input, select, textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
    }
    button {
      margin-top: 15px;
      padding: 10px;
      background: #28a745;
      color: white;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 5px;
    }
    button:hover {
      background: #218838;
    }
  </style>
  <script>
    function validateHotelForm() {
      let form = document.forms["hotelForm"];
      let requiredFields = ["full_name","email","phone_number","country","province","district","town",
                            "check_in_date","check_out_date","budget_range","number_of_guests"];
      for (let field of requiredFields) {
        if (form[field].value.trim() === "") {
          alert("Please fill out " + field.replace("_"," "));
          return false;
        }
      }
      return true;
    }
  </script>
</head>
<body>
  <div class="navbar">
    <h2>Tourism Website</h2>
  </div>
  <div class="hero"></div>
  <div class="form-box">
    <form name="hotelForm" method="POST" onsubmit="return validateHotelForm()">
      <h2>Hotel Booking</h2>

      <!-- Common Fields -->
      <label>Full Name</label>
      <input type="text" name="full_name">

      <label>Email</label>
      <input type="email" name="email">

      <label>Phone Number</label>
      <input type="text" name="phone_number">


      <label>Country</label>
<select id="country" name="country" required></select>

<label>Province</label>
<select id="province" name="province">
  <option selected disabled>Select Province</option>
</select>

<label>District</label>
<select id="district" name="district">
  <option selected disabled>Select District</option>
</select>

<label>Town</label>
<select id="town" name="town">
  <option selected disabled>Select Town</option>
</select>

<script>
// 1️⃣ Country dropdown
const countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei","Bulgaria","Burkina Faso","Burundi","Cabo Verde","Cambodia","Cameroon","Canada","Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo","Costa Rica","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Eswatini","Ethiopia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","North Korea","North Macedonia","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe"];

const countrySelect = document.getElementById('country');
countries.forEach(c => {
  const opt = document.createElement('option');
  opt.value = c;
  opt.textContent = c;
  countrySelect.appendChild(opt);
});

// 2️⃣ Sri Lanka provinces → districts → towns
const sriLanka = {
  "Central": { "Kandy": ["Kandy","Gampola","Nawalapitiya","Deltota"], "Matale":["Matale","Dambulla","Sigiriya"], "Nuwara Eliya":["Nuwara Eliya","Hatton","Talawakele","Nanu Oya"] },
  "Western": { "Colombo":["Colombo","Dehiwala","Mount Lavinia","Moratuwa"], "Gampaha":["Gampaha","Negombo","Wattala","Ja-Ela"], "Kalutara":["Kalutara","Panadura","Horana"] },
  "Southern": { "Galle":["Galle","Unawatuna","Hikkaduwa"], "Matara":["Matara","Weligama","Tangalle"], "Hambantota":["Hambantota","Tissamaharama","Sponge Bay"] },
  "Northern": { "Jaffna":["Jaffna","Point Pedro","Kilinochchi"], "Kilinochchi":["Kilinochchi"], "Mannar":["Mannar"], "Vavuniya":["Vavuniya"] },
  "Eastern": { "Trincomalee":["Trincomalee","Nilaveli","Kinniya"], "Batticaloa":["Batticaloa","Kattankudy","Eravur"], "Ampara":["Ampara","Kalmunai","Uhana"] },
  "North Western": { "Kurunegala":["Kurunegala","Mawathagama","Kuliyapitiya"], "Puttalam":["Puttalam","Chilaw","Wennappuwa"] },
  "North Central": { "Anuradhapura":["Anuradhapura","Medawachchiya","Padaviya"], "Polonnaruwa":["Polonnaruwa","Hingurakgoda","Bakamuna"] },
  "Uva": { "Badulla":["Badulla","Bandarawela","Ella"], "Monaragala":["Monaragala","Bibile","Wellawaya"] },
  "Sabaragamuwa": { "Ratnapura":["Ratnapura","Balangoda","Eheliyagoda"], "Kegalle":["Kegalle","Mawanella","Warakapola"] }
};

const provinceSelect = document.getElementById('province');
const districtSelect = document.getElementById('district');
const townSelect = document.getElementById('town');

countrySelect.addEventListener('change', () => {
  provinceSelect.innerHTML = '<option selected disabled>Select Province</option>';
  districtSelect.innerHTML = '<option selected disabled>Select District</option>';
  townSelect.innerHTML = '<option selected disabled>Select Town</option>';

  if (countrySelect.value === "Sri Lanka") {
    Object.keys(sriLanka).forEach(prov => {
      const opt = document.createElement('option');
      opt.value = prov;
      opt.textContent = prov;
      provinceSelect.appendChild(opt);
    });
    provinceSelect.disabled = false;
  } else {
    provinceSelect.disabled = true;
    districtSelect.disabled = true;
    townSelect.disabled = true;
  }
});

provinceSelect.addEventListener('change', () => {
  const prov = provinceSelect.value;
  districtSelect.innerHTML = '<option selected disabled>Select District</option>';
  townSelect.innerHTML = '<option selected disabled>Select Town</option>';
  if (sriLanka[prov]) {
    Object.keys(sriLanka[prov]).forEach(dist => {
      const opt = document.createElement('option');
      opt.value = dist;
      opt.textContent = dist;
      districtSelect.appendChild(opt);
    });
    districtSelect.disabled = false;
  }
});

districtSelect.addEventListener('change', () => {
  const prov = provinceSelect.value;
  const dist = districtSelect.value;
  townSelect.innerHTML = '<option selected disabled>Select Town</option>';
  if (sriLanka[prov] && sriLanka[prov][dist]) {
    sriLanka[prov][dist].forEach(town => {
      const opt = document.createElement('option');
      opt.value = town;
      opt.textContent = town;
      townSelect.appendChild(opt);
    });
    townSelect.disabled = false;
  }
});
</script>

      <!-- Hotel Specific Fields -->
      <label>Check-In Date</label>
      <input type="date" name="check_in_date">

      <label>Check-Out Date</label>
      <input type="date" name="check_out_date">

      <label>Budget Range</label>
      <input type="text" name="budget_range">

      <label>Number of Guests</label>
      <input type="number" name="number_of_guests">

      <label>Special Requests</label>
      <textarea name="hotel_special_requests"></textarea>

      <button type="submit" name="submit_hotel">Book Service</button>
    </form>
  </div>
</body>
</html>