function addPackageToCart(name, price, image) {
  let cart = JSON.parse(localStorage.getItem("packagesCart")) || [];
  cart.push({ name, price, people: 1, image });
  localStorage.setItem("packagesCart", JSON.stringify(cart));
  alert("Package added to cart!");
}

pkgHtml += `
  <div class="cart-item">
    <img src="${item.image}" alt="">
    <div>
      <h6>${item.name}</h6>
      <p>$${item.price} per person</p>
      <label>People: </label>
      <input type="number" min="1" value="${item.people}" onchange="updatePackage(${index}, this.value)">
    </div>
    <div>
      $${total}
      <button class="btn-clear" onclick="removePackage(${index})">❌</button>
    </div>
  </div>`;

