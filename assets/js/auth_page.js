function expand(lbl) {
  const elemId = lbl.getAttribute("for");
  document.getElementById(elemId).style.height = "45px";
  document.getElementById(elemId).classList.add("my-style");
  lbl.style.transform = "translateY(-45px)";
}
const inputs = document.querySelectorAll("input");

inputs.forEach((input) => {
  // Обработка получения фокуса
  input.addEventListener("focus", function () {
    this.style.height = "45px";
    this.classList.add("my-style");
    const label = document.querySelector(`label[for="${this.id}"]`);
    if (label) {
      label.style.transform = "translateY(-25px)";
      label.style.fontSize = "10px";
    }
  });

  // Обработка потери фокуса
  input.addEventListener("blur", function () {
    if (!this.value) {
      this.style.height = "2px";
      this.classList.remove("my-style");
      const label = document.querySelector(`label[for="${this.id}"]`);
      if (label) {
        label.style.transform = "none";
        label.style.fontSize = "12px";
      }
    }
  });

  // Проверка при загрузке страницы
  if (input.value) {
    input.style.height = "45px";
    input.classList.add("my-style");
    const label = document.querySelector(`label[for="${input.id}"]`);
    if (label) {
      label.style.transform = "translateY(-25px)";
      label.style.fontSize = "10px";
    }
  }
});

// Функция для обработки клика по label
function expand(label) {
  const input = document.getElementById(label.getAttribute("for"));
  if (input) {
    input.focus();
  }
}
