document.addEventListener("DOMContentLoaded", () => {
    const categoriesWrapper = document.querySelector("#categories-wrapper");
    
    if (categoriesWrapper) {
        const categoriesButton = categoriesWrapper.querySelector(".categories");
        const categoriesArrow = categoriesButton?.querySelector(".categories-arrow");
        const categoriesOption = categoriesWrapper.querySelector(".categories-option");

        if (categoriesButton) {
            categoriesButton.addEventListener("click", () => {
                categoriesWrapper.classList.toggle("menu-open");

                if (categoriesArrow) {
                    categoriesArrow.classList.toggle("rotate-180");
                }
                if (categoriesOption) {
                    categoriesOption.classList.toggle("rounded-b-2xl");
                }
            });
        }
    }

    const addedCartIndicator = document.querySelector(".added-cart-indicator");

    if (addedCartIndicator) {
        setTimeout(() => {
            addedCartIndicator.classList.add("success");
        }, 100);

        setTimeout(() => {
            addedCartIndicator.classList.remove("success");
            setTimeout(() => {
                addedCartIndicator.remove();
            }, 500);
        }, 3000);
    }
});
