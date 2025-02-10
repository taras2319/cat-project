document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ Fancybox завантажено!");
    Fancybox.bind("[data-fancybox='gallery']", {
        infinite: true, // Дозволяє безкінечне перемикання зображень
        animationEffect: "fade", // Ефект анімації при відкритті
        trapFocus: false,
        caption: function (fancybox, carousel, slide) {
            return slide.$trigger.dataset.title; // Додає підпис із `data-title`
        },
    });
    document.addEventListener("fancybox:close", () => {
        const fancyboxContainer = document.querySelector(".fancybox__container");
        if (fancyboxContainer) {
            fancyboxContainer.removeAttribute("aria-hidden");
            console.log("aria-hidden видалено з Fancybox контейнера");
        }
    });
});
