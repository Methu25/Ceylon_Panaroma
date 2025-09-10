
function addPackageToCart(name, price, image) {
    window.location.href = `nature.php?add_to_cart=1&name=${encodeURIComponent(name)}&price=${price}&image=${encodeURIComponent(image)}`;
}

