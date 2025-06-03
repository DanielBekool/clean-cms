document.addEventListener("DOMContentLoaded", function () {
    const replyButtons = document.querySelectorAll('.reply-button');
    const replyFormTemplate = document.getElementById("reply-form-template");

    replyButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            // Remove any existing cloned reply form
            document.querySelectorAll(".reply-form").forEach(form => {
                if (form.dataset.clone === "true") {
                    form.remove();
                }
            });

            // Clone the reply form
            const clonedForm = replyFormTemplate.cloneNode(true);
            clonedForm.classList.remove("hidden");
            clonedForm.removeAttribute("id");
            clonedForm.dataset.clone = "true";

            // Append form under the clicked comment
            const parentArticle = button.closest("article");
            parentArticle.appendChild(clonedForm);
        });
    });
});