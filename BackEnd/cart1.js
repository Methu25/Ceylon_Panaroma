// Function to recalc totals after page load
function loadCartFromDB() {
    updateTotals();
}

// Update quantity in database via AJAX
function updateCart(cartId, quantity, type) {
    if (quantity < 1) quantity = 1;

    fetch('update_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cartId, quantity, type })
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Update item total in UI
                const item = document.querySelector(`[data-cart-id="${cartId}"]`);
                const price = parseFloat(item.querySelector('p').innerText.replace(/[^\d.]/g, ''));
                item.querySelector('.item-total').innerText = '$' + (price * quantity).toFixed(2);
                updateTotals();
            }
        });
}

// Update totals
function updateTotals() {
    let packageTotal = 0, productTotal = 0;
    document.querySelectorAll('#packagesCart .cart-item').forEach(item => {
        packageTotal += parseFloat(item.querySelector('.item-total').innerText.replace('$', ''));
    });
    document.querySelectorAll('#productsCart .cart-item').forEach(item => {
        productTotal += parseFloat(item.querySelector('.item-total').innerText.replace('$', ''));
    });

    document.getElementById('packageTotal').innerText = packageTotal.toFixed(2);
    document.getElementById('productTotal').innerText = productTotal.toFixed(2);
    document.getElementById('grandTotal').innerText = (packageTotal + productTotal).toFixed(2);
}

// Checkout
function checkout() {
    const grandTotal = document.getElementById('grandTotal').innerText;
    if (parseFloat(grandTotal) <= 0) {
        alert('Your cart is empty!');
        return;
    }
    // Redirect to fake payment gateway with total
    window.location.href = 'FakePayment.php?total=' + grandTotal;
}
