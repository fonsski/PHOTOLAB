const sideMenu = document.querySelector("aside");
const menuBtn = document.getElementById("menu-btn");
const closeBtn = document.getElementById("close-btn");
const logo = document.querySelector(".logo img");
const darkMode = document.querySelector(".dark-mode");

// Проверяем, есть ли сохраненная тема в localStorage
const currentTheme = localStorage.getItem("theme");
if (currentTheme) {
  document.body.classList.add(currentTheme);
  if (currentTheme === "dark-mode-variables") {
    logo.src = "/assets/img/logo.svg";
    darkMode.querySelector("span:nth-child(1)").classList.add("active");
    darkMode.querySelector("span:nth-child(2)").classList.remove("active");
  }
} else {
  darkMode.querySelector("span:nth-child(1)").classList.remove("active");
  darkMode.querySelector("span:nth-child(2)").classList.add("active");
}

menuBtn.addEventListener("click", () => {
  sideMenu.style.display = "block";
});

closeBtn.addEventListener("click", () => {
  sideMenu.style.display = "none";
});

darkMode.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode-variables");
  darkMode.querySelector("span:nth-child(1)").classList.toggle("active");
  darkMode.querySelector("span:nth-child(2)").classList.toggle("active");
  if (document.body.classList.contains("dark-mode-variables")) {
    logo.src = "/assets/img/logo.svg";
    localStorage.setItem("theme", "dark-mode-variables");
    localStorage.setItem("darkModeActive", true);
  } else {
    logo.src = "/assets/img/photologo-black.svg";
    localStorage.setItem("theme", "");
    localStorage.setItem("darkModeActive", false);
  }
});

// Проверяем состояние значка темы при загрузке страницы
const darkModeActive = localStorage.getItem("darkModeActive");
if (darkModeActive === "true") {
  darkMode.querySelector("span:nth-child(2)").classList.add("active");
  darkMode.querySelector("span:nth-child(1)").classList.remove("active");
} else {
  darkMode.querySelector("span:nth-child(2)").classList.remove("active");
  darkMode.querySelector("span:nth-child(1)").classList.add("active");
}

const tableBody = document.querySelector(".recent-orders tbody");
if (tableBody) {
  document.addEventListener("DOMContentLoaded", function () {
    // Функция для загрузки последних измененных товаров
    function loadRecentProducts() {
      fetch("/vendor/functions/recent_products.php")
        .then((response) => response.json())
        .then((data) => {
          tableBody.innerHTML = ""; // Очищаем текущие записи в таблице
          data.forEach((product) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                        <td>${product.name}</td>
                        <td>${product.cost}р.</td>
                        <td>${product.updated_at}</td>
                        <td>
                        <a href="/vendor/admin/products.php?id=${product.id}">
                        <span class="material-icons-sharp">edit</span>
                        <h3>Изменить</h3>
                        </a>
                        </td>
                        <td></td>
                    `;
            tableBody.appendChild(row);
          });
        });
    }

    loadRecentProducts();
  });
}
