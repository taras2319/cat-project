
document.querySelectorAll('.navbar-nav .nav-link, .dropdown-item').forEach(link => {
    link.addEventListener('click', function (event) {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        // Якщо натиснуто на "Наші функції" - не закриваємо меню
        if (link.classList.contains('dropdown-toggle')) {
            event.stopPropagation(); // Запобігає закриттю меню
            return;
        }

        // Закриваємо меню для всіх інших пунктів
        if (navbarToggler && navbarCollapse.classList.contains('show')) {
            navbarToggler.click();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () { //подія DOMContentLoaded виконується, коли HTML-документ повністю завантажено
    const elements = document.querySelectorAll(".scroll-animation"); //знаходить всі елементи на сторінці, які мають клас .scroll-animation,
    // і зберігає їх у змінну elements

    function handleScroll() { //викликається під час прокручування сторінки.
        elements.forEach((el) => { //Вона перебирає всі елементи зі змінної elements.
            const rect = el.getBoundingClientRect(); //отримує координати елемента на сторінці (верх, низ, ширину, висоту тощо).
            const windowHeight = window.innerHeight; //отримує висоту вікна браузера.

            if (rect.top < windowHeight * 0.8) {//rect.top — відстань від верху вікна до верхньої частини елемента. коли елемент потрапить в 80% висоти вікна.
                el.classList.add("show");//додається клас "show", який може запустити анімацію в CSS.
            }
        });
    }

    window.addEventListener("scroll", handleScroll); //Коли користувач скролить сторінку, викликається handleScroll(), яка перевіряє кожен елемент .scroll-animation.
    handleScroll(); // Викликаємо один раз, щоб перевірити елементи при завантаженні
});
document.addEventListener("DOMContentLoaded", function () {
    let lastScrollTop = 0; // Зберігаємо останню позицію скролу
    const header = document.querySelector("header"); // Знаходимо хедер

    window.addEventListener("scroll", function () {
        let scrollTop = window.scrollY || document.documentElement.scrollTop; // Отримуємо поточний скрол

        if (scrollTop < lastScrollTop) {
            // Скролимо вгору - показуємо хедер
            header.style.transform = "translateY(0)";
        } else {
            // Скролимо вниз - ховаємо хедер
            header.style.transform = "translateY(-100%)";
        }

        lastScrollTop = scrollTop; // Оновлюємо позицію скролу
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const scrollToTopBtn = document.getElementById("scrollToTop");
    const lastSection = document.querySelector("#contacts"); // Або вкажи останній блок

    function checkLastSectionVisibility() {
        const rect = lastSection.getBoundingClientRect();
        if (rect.top <= window.innerHeight) {
            scrollToTopBtn.classList.add("show"); // Показуємо кнопку
        } else {
            scrollToTopBtn.classList.remove("show"); // Ховаємо кнопку
        }
    }

    window.addEventListener("scroll", checkLastSectionVisibility);

    scrollToTopBtn.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    checkLastSectionVisibility(); // Викликаємо при завантаженні
});




