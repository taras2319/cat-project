document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ viewPostModal.js завантажено!");

    document.querySelectorAll(".view-post").forEach(button => {
        button.addEventListener("click", function () {
            let postId = this.getAttribute("data-id");
            console.log("ID поста:", postId);
            if (!postId) {
                console.error("❌ ID поста не знайдено!");
                return;
            }

            fetch(`/posts/${postId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("✅ Отримано дані поста:", data);

                    document.getElementById("viewPostTitle").innerText = data.title;
                    document.getElementById("viewPostContent").innerText = data.content;
                    let modalElement = document.getElementById("viewPostModal");

                    modalElement.addEventListener("shown.bs.modal", function () {
                        console.log("Модальне вікно успішно відкрите.");
                        document.getElementById("viewPostTitle").focus(); // Ставимо фокус на заголовок
                    });


                })
                .catch(error => {
                    console.error("❌ Помилка завантаження поста:", error);
                    alert("Сталася помилка при завантаженні поста.");
                });


        });
    }); // Закриваємо forEach
}); // Закриваємо DOMContentLoaded
