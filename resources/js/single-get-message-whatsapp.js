
document.addEventListener("DOMContentLoaded", function () {
    const heading = document.querySelector("#bangunan-pabrik h2.get-message");
    const link = document.querySelector("#bangunan-pabrik a.wa-message");

    if (heading && link) {
        const headingText = heading.textContent.trim();
        const message = `Halo PT Kawasan Industri Wijayakusuma, saya ingin informasi mengenai ${headingText}`;
        const encodedMessage = encodeURIComponent(message);
        const phoneNumber = "6281211118022";
        link.href = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${encodedMessage}`;
    }
});

