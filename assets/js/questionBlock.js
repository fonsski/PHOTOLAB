document.addEventListener("DOMContentLoaded", function () {
  let questionBlocks = document.querySelectorAll(".question");
  questionBlocks.forEach(function (questionBlock) {
    let answerBlock = questionBlock.nextElementSibling;
    // Установим начальную высоту блока ответа
    answerBlock.style.height = "0px";
    answerBlock.style.overflow = "hidden"; // Чтобы скрыть содержимое

    questionBlock.addEventListener("click", function () {
      if (answerBlock.style.height === "0px") {
        answerBlock.style.height = "auto"; // Показать содержимое
        answerBlock.style.overflow = "visible"; // Показать содержимое
      } else {
        answerBlock.style.height = "0px"; // Скрыть содержимое
        answerBlock.style.overflow = "hidden"; // Скрыть содержимое
      }
    });
  });
});
