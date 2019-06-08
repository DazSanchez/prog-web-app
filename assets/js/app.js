document.addEventListener("DOMContentLoaded", () => {
  const goBackLink = document.querySelector("#go-back-link");
  if (goBackLink) {
    goBackLink.addEventListener("click", e => {
      e.preventDefault();
      window.history.back();
    });
  }
});
