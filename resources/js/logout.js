document.getElementById("logout-link").addEventListener("click", function (e) {
    e.preventDefault();
    fetch("/logout", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        credentials: "same-origin",
    })
        .then((response) => {
            if (response.ok) {
                window.location.href = "/";
            }
        })
        .catch((error) => console.error("Error:", error));
});
