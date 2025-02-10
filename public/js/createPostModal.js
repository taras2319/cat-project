document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ createPostModal.js завантажено!");

    document.addEventListener("DOMContentLoaded", function () {
        const postForm = document.getElementById("postForm");

        if (postForm) {
            postForm.addEventListener("submit", function (e) {
                e.preventDefault();
                // Логіка форми
            });
        } else {
            console.error("❌ Елемент #postForm не знайдено!");
        }

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
                    location.reload();// Оновлює сторінку повністю
                })
                .catch(error => {
                    console.error("❌ Помилка запиту:", error);
                    alert("Сталася помилка. Спробуйте знову."); // Виводимо повідомлення про помилку
                });
        });

    });



