let liked = false;
let likeCount = 1870;

function toggleLike() {
    liked = !liked;
    const imgLike = document.getElementById("img-like");
    const imgLiked = document.getElementById("img-liked");
    const text = document.getElementById("like-text");

    if (liked) {
        imgLike.classList.add("hidden");
        imgLiked.classList.remove("hidden");
        likeCount++;
    } else {
        imgLiked.classList.add("hidden");
        imgLike.classList.remove("hidden");
        likeCount--;
    }

    text.textContent = `${likeCount} Likes`;
}