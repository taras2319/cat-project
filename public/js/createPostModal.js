document.addEventListener("DOMContentLoaded", () => {
        console.log("✅ createPostModal.js завантажено!");
        const postForm = document.getElementById("postForm");

        if (postForm) {
            console.log("Форма знайдена!");
            postForm.addEventListener("submit", (e) => {
                e.preventDefault();
                console.log("Подія submit перехоплена!");
                // Логіка форми


                // Ваш код для обробки форми
                let title = document.getElementById("postTitle").value;
                let content = document.getElementById("postContent").value;
                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

                fetch("/posts", {
                    method: "POST",
                    headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                    },
                    body: JSON.stringify({ title: title, content: content })
                })


                .then(response => {
                    if (!response.ok) {
                        throw new Error("Помилка сервера");
                    }
                    return response.json(); // Якщо запит успішний, перетворюємо відповідь у JSON

                })
                .then(data => {
                    console.log("✅ Пост збережено успішно!");

                    // Очищуємо поля форми
                    document.getElementById("postTitle").value = "";
                    document.getElementById("postContent").value = "";

                    // Закриваємо модальне вікно
                    let modal = bootstrap.Modal.getInstance(document.getElementById("postModal"));
                    modal.hide();
                    // Оновлюємо сторінку
                    location.reload(); //Оновлює сторінку повністю
                })
                .catch(error => {
                    console.error("❌ Помилка запиту:", error);
                    alert("Сталася помилка. Спробуйте знову."); // Виводимо повідомлення про помилку
                });
        });
        } else {
            console.error("❌ Елемент #postForm не знайдено!");
        }
});

