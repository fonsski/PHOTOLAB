// Находим все кнопки с классом "services_button"
let serviceButtons = document.querySelectorAll(".services_button");

// Для каждой кнопки добавляем обработчик события клика
serviceButtons.forEach((element) => {
  element.addEventListener("click", () => {
    // Отправляем POST запрос на сервер для получения данных о продуктах
    fetch("/vendor/functions/productQuery.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json;charset=utf-8",
      },
      body: JSON.stringify({ id: element.id }),
    })
      .then((response) => response.json())
      .then((result) => {
        let html = "";
        // Обрабатываем полученные данные и формируем HTML
        result.forEach((product) => {
          html += htmlCreate(product);
        });
        // Вставляем сформированный HTML в контейнер ".services_content"
        document.querySelector(".services_content").innerHTML = html;
        // Удаляем класс "active" у всех кнопок
        serviceButtons.forEach((button) => {
          button.classList.remove("active");
        });
        // Добавляем класс "active" только нажатой кнопке
        element.classList.add("active");
      });
  });
});

// Функция для создания HTML блока продукта
function htmlCreate(product) {
  return `
    <div class="product_card">
      <div class="card__image"><img src="../../assets/img/products/${product.img}"></div>
      <div class="card__content">
        <h3 class="card__content-title">${product.name}</h3>
        <h3 class="card__content_cost">${product.price}р.</h3>
      </div>
    </div>
    `;
}

// Находим кнопку с id "1" и устанавливаем ей класс "active"
const activeServiceButton = document.getElementById("1");
fetch("/vendor/functions/productQuery.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json;charset=utf-8",
  },
  body: JSON.stringify({ id: 1 }),
})
  .then((response) => response.json())
  .then((result) => {
    let html = "";
    // Обрабатываем полученные данные и формируем HTML
    result.forEach((product) => {
      html += htmlCreate(product);
    });
    // Вставляем сформированный HTML в контейнер ".services_content"
    document.querySelector(".services_content").innerHTML = html;
    // Удаляем класс "active" у всех кнопок
    const allServiceButtons = document.querySelectorAll(".services_button");
    allServiceButtons.forEach((button) => {
      button.classList.remove("active");
    });
    // Добавляем класс "active" кнопке с id "1"
    activeServiceButton.classList.add("active");
  });
