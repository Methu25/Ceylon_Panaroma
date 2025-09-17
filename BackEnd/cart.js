// Recalculate totals on the client-side if needed
function updateTotals() {
    let packageTotal = 0, productTotal = 0;

    document.querySelectorAll('#packagesCart .cart-item').forEach(item => {
        packageTotal += parseFloat(item.querySelector('.item-total').innerText.replace('$', '')) || 0;
    });
    document.querySelectorAll('#productsCart .cart-item').forEach(item => {
        productTotal += parseFloat(item.querySelector('.item-total').innerText.replace('$', '')) || 0;
    });

    const grandTotal = packageTotal + productTotal;
    document.getElementById('packageTotal').innerText = packageTotal.toFixed(2);
    document.getElementById('productTotal').innerText = productTotal.toFixed(2);
    document.getElementById('grandTotal').innerText = grandTotal.toFixed(2);
}