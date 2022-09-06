const reviewButton = document.querySelector(".review-button");
const reviewForm = document.querySelector(".review-form");

if(reviewButton) {
  reviewButton.addEventListener("click", () => {
    reviewForm.hidden = false;
  });
}

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}