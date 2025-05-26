document.addEventListener("DOMContentLoaded", function () {
    const comments = document.querySelectorAll('li[id^="comment-"]');

    comments.forEach(comment => {
        const replies = comment.querySelectorAll("ol > li");
        const countSpan = comment.querySelector(".count");

        if (countSpan) {
            countSpan.textContent = `Balasan ${replies.length}`;
        }
    });
});

