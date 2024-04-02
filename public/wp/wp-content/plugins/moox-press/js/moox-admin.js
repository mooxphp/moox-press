(function updateBackLink() {
    const backLink = document.querySelector(
        '.edit-post-fullscreen-mode-close[href*="edit.php?post_type=post"]'
    );
    if (backLink) {
        backLink.href = "/admin/wp-posts";
        backLink.setAttribute("aria-label", "Back to Moox");
        backLink.title = "Back to Moox";
    } else {
        setTimeout(updateBackLink, 500);
    }
})();
