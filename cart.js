document.addEventListener('DOMContentLoaded', () => {
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTableBody = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    const addressModal = document.getElementById('address-modal');
    const closeModal = document.querySelector('.close');
    const addressForm = document.getElementById('address-form');
    const placeOrderButton = document.getElementById('place-order');

    const renderCart = () => {
        cartTableBody.innerHTML = '';
        let total = 0;

        cartItems.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td><img src="${item.img}" alt="${item.name}"></td>
                <td>₹${item.price}</td>
                <td>${item.quantity}</td>
                <td>₹${itemTotal.toFixed(2)}</td>
            `;
            cartTableBody.appendChild(row);
        });

        cartTotalElement.textContent = `Total: ₹${total.toFixed(2)}`;
    };

    const showAddressModal = () => {
        addressModal.style.display = 'block';
    };

    const hideAddressModal = () => {
        addressModal.style.display = 'none';
    };

    const handleOrderPlacement = (event) => {
        event.preventDefault();
        const address = event.target.address.value;

        if (address) {
            alert(`further details will be sent to ur mail Order placed successfully! Shipping to: ${address}`);
            localStorage.removeItem('cart');
            renderCart();
            hideAddressModal();
        } else {
            alert('Please enter a valid address.');
        }
    };

    placeOrderButton.addEventListener('click', () => {
        if (cartItems.length > 0) {
            showAddressModal();
        } else {
            alert('Your cart is empty!');
        }
    });

    closeModal.addEventListener('click', hideAddressModal);

    addressForm.addEventListener('submit', handleOrderPlacement);

    renderCart();
});
