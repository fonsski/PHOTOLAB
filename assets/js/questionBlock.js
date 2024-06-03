document.addEventListener("DOMContentLoaded", function () {
  let questionBlocks = document.querySelectorAll(".question");
  questionBlocks.forEach(function (questionBlock) {
    let answerBlock = questionBlock.nextElementSibling;
    answerBlock.style.height = "none";
    questionBlock.addEventListener("click", function () {
      if (answerBlock.style.height === "0px") {
        answerBlock.style.height = "min-content";
      } else {
        answerBlock.style.height = "0px";
      }
    });
  });
});