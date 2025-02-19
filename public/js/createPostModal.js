document.addEventListener("DOMContentLoaded", () => {
    console.log("✅ createPostModal.js завантажено!");
    const postForm = document.getElementById("postForm");

    if (postForm) {
        console.log("Форма знайдена!");
        postForm.addEventListener("submit", (e) => {
            e.preventDefault();
            // Оновлення значення textarea перед відправкою
            if (typeof tinymce !== "undefined") {
                tinymce.triggerSave();
            }

            console.log("Подія submit перехоплена!");

            // Отримуємо дані форми
            let formData = new FormData(postForm);
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

            fetch("/posts", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken
                },
                body: formData  // Використовуємо FormData для підтримки файлів
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Помилка сервера");
                    }
                    return response.json(); // Якщо запит успішний, перетворюємо відповідь у JSON
                })
                .then(data => {
                    console.log("✅ Пост збережено успішно!");

                    // Очистка форми
                    postForm.reset();

                    // Закриваємо модальне вікно
                    let modal = bootstrap.Modal.getInstance(document.getElementById("postModal"));
                    modal.hide();

                    // Відображення повідомлення про успішне додавання
                    let successAlert = document.createElement("div");
                    successAlert.className = "alert alert-success mt-3";
                    successAlert.innerText = "Після перевірки ваша історія з’явиться у нашому списку! Мяу😊";

                    // Додаємо повідомлення в контейнер
                    let postList = document.getElementById("postsList");
                    postList.insertAdjacentElement("beforebegin", successAlert);

                    // Видаляємо повідомлення через 5 секунд
                    setTimeout(() => {
                        successAlert.remove();
                    }, 5000);
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


