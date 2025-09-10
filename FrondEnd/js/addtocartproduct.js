function addProductToCart(name, price, image) {
  let cart = JSON.parse(localStorage.getItem("productsCart")) || [];
  cart.push({ name, price, qty: 1, image });
  localStorage.setItem("productsCart", JSON.stringify(cart));
  alert("Product added to cart!");
}

prodHtml += `
  <div class="cart-item">
    <img src="${item.image}" alt="">
    <div>
      <h6>${item.name}</h6>
      <p>$${item.price}</p>
      <label>Qty: </label>
      <input type="number" min="1" value="${item.qty}" onchange="updateProduct(${index}, this.value)">
    </div>
    <div>
      $${total}
      <button class="btn-clear" onclick="removeProduct(${index})">❌</button>
    </div>
  </div>`;
