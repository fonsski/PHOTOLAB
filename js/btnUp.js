// Кнопка прокрутки
const btnUp = {
  el: document.querySelector(".topButton"),
  show() {
    // удалим у кнопки класс topButton_hide
    this.el.classList.remove("topButton_hide");
  },
  hide() {
    // добавим к кнопке класс topButton_hide
    this.el.classList.add("topButton_hide");
  },
  addEventListener() {
    // скроем кнопку по умолчанию
    this.hide();

    // при прокрутке содержимого страницы
    window.addEventListener("scroll", () => {
      // определяем величину прокрутки
      const scrollY = window.scrollY || document.documentElement.scrollTop;
      // если страница прокручена больше чем на 400px, то делаем кнопку видимой, иначе скрываем
      scrollY > 400 ? this.show() : this.hide();
    });

    // при нажатии на кнопку .topButton
    if (this.el) {
      this.el.onclick = () => {
        // переместим в начало страницы
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: "smooth",
        });
      };
    }
  },
};

// Инициализируем добавление события
btnUp.addEventListener();