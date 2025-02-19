document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".like-button").forEach(button => {
        button.addEventListener("click", function () {
            let storyId = this.getAttribute("data-id");
            let likeCount = this.querySelector(".likes-count");

            fetch(`/posts/${storyId}/like`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                }
            })
                .then(response => response.json())
                .then(data => {
                    likeCount.textContent = data.likes; // Оновлюємо кількість лайків
                })
                .catch(error => console.error("Помилка:", error));
        });
    });
});
