document.addEventListener("DOMContentLoaded", function () {
  // Находим все кнопки с классом "services_button"
  let serviceButtons = document.querySelectorAll(".services_button");
  const serviceMobile = document.querySelector(".services_mobile__nav");
  const servicesNavBlock = document.querySelector(".services_nav__block");
  const addresNavBlock = document.querySelector(".services_addres__block");
  const addresToggleMenu = document.querySelector(".addres_nav__block");
  const addresButton = document.querySelectorAll('.addres_button');
  const mapImgElement = document.querySelector('.addres_content img');
  if (serviceButtons.length > 0) {
    // Функция для отправки запроса и обновления HTML
    const fetchAndUpdateContent = async (id) => {
      try {
        let response = await fetch("app/functions/productQuery.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json;charset=utf-8",
          },
          body: JSON.stringify({ id: id }),
        });

        if (!response.ok) {
          throw new Error("Network response was not ok");
        }

        let result = await response.json();
        let html = result.map((product) => htmlCreate(product)).join("");
        document.querySelector(".services_content").innerHTML = html;

        serviceButtons.forEach((button) => {
          button.classList.remove("active");
        });
        document.getElementById(id).classList.add("active");
      } catch (error) {
        console.error("Fetch error: ", error);
      }
    };

    // Для каждой кнопки добавляем обработчик события клика
    serviceButtons.forEach((element) => {
      element.addEventListener("click", () => {
        fetchAndUpdateContent(element.id);
      });
    });

    // Функция для создания HTML блока продукта
    function htmlCreate(product) {
      return `
          <div class="product_card">
            <div class="card__image"><img src="/assets/img/products/${product.img}" alt="${product.name}"></div>
            <div class="card__content">
              <h3 class="card__content-title">${product.name}</h3>
              <h3 class="card__content_cost">${product.price}р.</h3>
            </div>
          </div>
        `;
    }

    // Находим кнопку с id "1" и устанавливаем ей класс "active", если она существует
    const activeServiceButton = document.getElementById("1");
    if (activeServiceButton) {
      fetchAndUpdateContent("1");
    }
  }

  if (serviceMobile && servicesNavBlock) {
    serviceMobile.addEventListener("click", function () {
      servicesNavBlock.classList.toggle("open");
    });
  }
  
  // Открытие меню с выборами адресов в мобильной версии
  addresNavBlock.addEventListener('click', () => {
    addresToggleMenu.classList.toggle('open');
  })

  // Перебираем все кнопки с адресами, и добавляем им слушатель события по нажатию на одну из них
  addresButton.forEach(button => {
    button.addEventListener('click', function() {
      // Убираем класс active у всех кнопок
      addresButton.forEach(btn => btn.classList.remove('active'));

      // Добавляем класс active к нажатой кнопке
      this.classList.add('active');

      // Меняем src у изображения
      const imgName = this.getAttribute('data-img');
      mapImgElement.src = `assets/img/map/${imgName}`;
    });
  });
});
