// Things that need the DOM to be ready (like the hover menu)
document.addEventListener("DOMContentLoaded", () => {
    const cartWrapper = document.querySelector("#cart-wrapper");
    if (cartWrapper) {
        cartWrapper.addEventListener("mouseenter", () =>
            cartWrapper.classList.add("menu-open"),
        );
        cartWrapper.addEventListener("mouseleave", () =>
            cartWrapper.classList.remove("menu-open"),
        );
    }
});

// ATTACH TO WINDOW: This makes it global so the HTML onclick can find it
window.selectPayment = function (method, element) {
    // 1. Update hidden input
    const input = document.getElementById("selected-payment");
    if (input) input.value = method;

    // 2. Update display text
    const display = document.getElementById("display-payment-method");
    if (display) {
        const label = element.querySelector("span")
            ? element.querySelector("span").innerText
            : method;
        display.innerText = label;
    }

    // 3. Update UI buttons styling
    document.querySelectorAll(".payment-option").forEach((btn) => {
        btn.classList.remove("ring-primary", "bg-primary/5");
        btn.classList.add("ring-secondary/30", "bg-white");
    });

    element.classList.remove("ring-secondary/30", "bg-white");
    element.classList.add("ring-primary", "bg-primary/5");
};
