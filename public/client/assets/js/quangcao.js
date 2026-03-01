document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelector(".slides");
  const imgs = document.querySelectorAll(".slides img");
  if (!slides || imgs.length === 0) return;
  const total = imgs.length;
  let index = 0;
  function showSlide(i) {
    index = (i + total) % total;
    slides.style.transform = `translateX(${-index * 100}%)`;
  }
  document.querySelector(".prev").addEventListener("click", () => {
    showSlide(index - 1);
    resetTimer();
  });
  document.querySelector(".next").addEventListener("click", () => {
    showSlide(index + 1);
    resetTimer();
  });
  let timer = setInterval(() => showSlide(index + 1), 4000);
  function resetTimer() {
    clearInterval(timer);
    timer = setInterval(() => showSlide(index + 1), 4000);
  }
});
