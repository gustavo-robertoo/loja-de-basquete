document.addEventListener("DOMContentLoaded", () => {
    const updateCartTotals = () => {
        let subtotal = 0;
        document.querySelectorAll("tbody tr").forEach(row => {
            const price = parseFloat(row.querySelector(".price").textContent.replace("R$", "").trim());
            const quantity = parseInt(row.querySelector(".qty-value").textContent);
            const total = price * quantity;
            row.querySelector(".total").textContent = `R$ ${total.toFixed(2)}`;
            subtotal += total;
        });
        document.querySelector(".subtotal").textContent = `R$ ${subtotal.toFixed(2)}`;
        document.querySelector(".total-value").textContent = `R$ ${subtotal.toFixed(2)}`;
    };

    document.querySelectorAll(".qty-minus").forEach(button => {
        button.addEventListener("click", () => {
            const row = button.closest("tr");
            const qtyElement = row.querySelector(".qty-value");
            let quantity = parseInt(qtyElement.textContent);
            if (quantity > 1) {
                quantity--;
                qtyElement.textContent = quantity;
                updateCartTotals();
            }
        });
    });

    document.querySelectorAll(".qty-plus").forEach(button => {
        button.addEventListener("click", () => {
            const row = button.closest("tr");
            const qtyElement = row.querySelector(".qty-value");
            let quantity = parseInt(qtyElement.textContent);
            quantity++;
            qtyElement.textContent = quantity;
            updateCartTotals();
        });
    });

    document.querySelectorAll(".remove").forEach(button => {
        button.addEventListener("click", () => {
            const row = button.closest("tr");
            row.remove();
            updateCartTotals();
        });
    });

    updateCartTotals();
});

