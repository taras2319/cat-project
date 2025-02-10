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
