// ---------- Countries Dropdown ----------
const countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czechia (Czech Republic)", "Democratic Republic of the Congo", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini (fmr. " + "Swaziland)", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Holy See", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar (formerly Burma)", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine State", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"];

const countrySelect = document.getElementById("country");
countries.forEach(c => {
    const opt = document.createElement("option");
    opt.value = c;
    opt.textContent = c;
    countrySelect.appendChild(opt);
});

// ---------- Sri Lanka Province -> District -> Town ----------
const locationData = {
    "Central": {
        "Kandy": ["Kandy Town", "Nuwara Eliya"],
        "Matale": ["Matale Town"],
        "Nuwara Eliya": ["Nuwara Eliya Town"]
    },
    "Southern": {
        "Galle": ["Galle Town", "Unawatuna"],
        "Matara": ["Matara Town", "Weligama"]
    },
    "Western": {
        "Colombo": ["Colombo City", "Dehiwala"],
        "Gampaha": ["Negombo", "Gampaha Town"]
    },
    "Eastern": {
        "Trincomalee": ["Trincomalee Town"],
        "Batticaloa": ["Batticaloa Town"]
    },
    "North Western": {
        "Kurunegala": ["Kurunegala Town", "Puttalam"],
        "Puttalam": ["Puttalam Town"]
    },
    "North Central": {
        "Anuradhapura": ["Anuradhapura Town"],
        "Polonnaruwa": ["Polonnaruwa Town"]
    },
    "Uva": {
        "Badulla": ["Badulla Town"],
        "Monaragala": ["Monaragala Town"]
    },
    "Sabaragamuwa": {
        "Ratnapura": ["Ratnapura Town"],
        "Kegalle": ["Kegalle Town"]
    },
    "Northern": {
        "Jaffna": ["Jaffna Town", "Point Pedro"],
        "Kilinochchi": ["Kilinochchi Town"],
        "Mannar": ["Mannar Town"],
        "Vavuniya": ["Vavuniya Town"],
        "Mullaitivu": ["Mullaitivu Town"]
    }
};

const provinceSelect = document.getElementById("province");
const districtSelect = document.getElementById("district");
const townSelect = document.getElementById("town");

provinceSelect.addEventListener("change", function () {
    districtSelect.innerHTML = '<option selected disabled>Select District</option>';
    townSelect.innerHTML = '<option selected disabled>Select Town</option>';
    const districts = Object.keys(locationData[this.value]);
    districts.forEach(d => {
        const opt = document.createElement("option");
        opt.value = d;
        opt.textContent = d;
        districtSelect.appendChild(opt);
    });
});

districtSelect.addEventListener("change", function () {
    townSelect.innerHTML = '<option selected disabled>Select Town</option>';
    const province = provinceSelect.value;
    const towns = locationData[province][this.value];
    towns.forEach(t => {
        const opt = document.createElement("option");
        opt.value = t;
        opt.textContent = t;
        townSelect.appendChild(opt);
    });
});

// ---------- Budget + Town -> Hotel ----------
const hotelsData = {
    budget: ["Budget Hotel 1", "Budget Hotel 2", "Budget Hotel 3", "Budget Hotel 4"],
    mid: ["Mid Hotel 1", "Mid Hotel 2", "Mid Hotel 3", "Mid Hotel 4", "Mid Hotel 5"],
    luxury: ["Luxury Hotel 1", "Luxury Hotel 2", "Luxury Hotel 3", "Luxury Hotel 4"]
};

const budgetSelect = document.getElementById("budget");
const hotelSelect = document.getElementById("hotel");

function updateHotels() {
    hotelSelect.innerHTML = '<option selected disabled>Select Hotel</option>';
    const budget = budgetSelect.value;
    const town = townSelect.value;
    if (!budget || !town) return;
    hotelsData[budget].forEach(h => {
        const opt = document.createElement("option");
        opt.value = h;
        opt.textContent = h + " - " + town;
        hotelSelect.appendChild(opt);
    });
}

budgetSelect.addEventListener("change", updateHotels);
townSelect.addEventListener("change", updateHotels);

// ---------- Frontend Validation ----------
const form = document.getElementById("hotelForm");
form.addEventListener("submit", function (e) {
    e.preventDefault();
    let valid = true;
    const fields = ["full_name", "email", "phone", "country", "gender", "days", "budget", "province", "district", "town", "hotel", "guests", "checkin", "checkout"];
    fields.forEach(f => {
        const el = document.getElementsByName(f)[0];
        if (!el.value) {
            alert(`Please fill the ${f.replace("_", " ")}`);
            valid = false;
        }
    });
    // Email format
    const email = document.getElementsByName("email")[0].value;
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!email.match(emailPattern)) {
        alert("Invalid email format");
        valid = false;
    }
    // Dates
    const checkin = document.getElementsByName("checkin")[0].value;
    const checkout = document.getElementsByName("checkout")[0].value;
    if (checkin && checkout && checkout < checkin) {
        alert("Check-out date cannot be before check-in");
        valid = false;
    }

    if (valid) {
        alert("Confirm Your Booking!");
        // Here you just submit normally or let PHP handle redirect
        form.submit();
    }
});