/* document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ main.js завантажено!");

    document.getElementById("messageForm").addEventListener("submit", function (e) {
        e.preventDefault(); // Запобігаємо оновленню сторінки

        let message = document.getElementById("messageInput").value;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        fetch("/send-message", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            body: JSON.stringify({ message: message })
        })
            .then(response => response.json())
            .then(data => {
                console.log("✅ Отримано відповідь:", data);
                document.getElementById("responseText").innerText = "Збережено повідомлення: " + data.data.content;
                document.getElementById("messageInput").value = ""; // Очищаємо поле вводу
            })
            .catch(error => console.error("❌ Помилка запиту:", error));
    });
});*/

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





