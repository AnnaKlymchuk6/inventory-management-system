document.addEventListener('DOMContentLoaded', function () {
    const productSelect = document.querySelector('select[name="product_id"]');
    const quantityInput = document.querySelector('input[name="quantity"]');
    const totalPrice = document.getElementById('totalPrice');
    const productPrice = document.getElementById('productPrice');
    const productQuantity = document.getElementById('productQuantity');
    const stockWarning = document.getElementById('stockWarning');

    if (!productSelect || !quantityInput) {
        return;
    }

    function updateSaleInfo() {
        const selectedOption =
            productSelect.options[productSelect.selectedIndex];

        const price = parseFloat(
            selectedOption.dataset.price || 0
        );

        const availableQuantity = parseInt(
            selectedOption.dataset.quantity || 0
        );

        const quantity = parseInt(
            quantityInput.value || 0
        );

        if (productPrice) {
            productPrice.textContent =
                price.toFixed(2) + ' грн';
        }

        if (productQuantity) {
            productQuantity.textContent =
                availableQuantity;
        }

        if (totalPrice) {
            const total = price * quantity;
            totalPrice.textContent =
                total.toFixed(2) + ' грн';
        }

        if (stockWarning) {
            if (
                quantity > availableQuantity &&
                quantity > 0
            ) {
                stockWarning.style.display = 'block';
            } else {
                stockWarning.style.display = 'none';
            }
        }
    }

    productSelect.addEventListener(
        'change',
        updateSaleInfo
    );

    quantityInput.addEventListener(
        'input',
        updateSaleInfo
    );

    updateSaleInfo();
});