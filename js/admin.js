// Унифицированная функция для обновления полей (динамически подстраивается под данные)
function updateFields(data, entity) {
  if (entity === "product") {
    const categories = document.querySelector(".productCategoryNew");
    if (categories) {
      categories.value = data.category_id || "";
    } else {
      console.error("Element .productCategoryNew not found");
    }

    const name = document.querySelector(".productNameNew");
    if (name) {
      name.value = data.name || "";
    } else {
      console.error("Element .productNameNew not found");
    }

    const cost = document.querySelector(".productCostNew");
    if (cost) {
      cost.value = data.cost || "";
    } else {
      console.error("Element .productCostNew not found");
    }
  } else if (entity === "category") {
    const categoryName = document.querySelector(".categoryNameChange");
    if (categoryName) {
      categoryName.value = data.name || "";
    } else {
      console.error("Element .categoryNameChange not found");
    }
  } else if (entity === "banner") {
    const name = document.querySelector(".bannerNameNew");
    if (name) {
      name.value = data.name || "";
    } else {
      console.error("Element .bannerNameNew not found");
    }

    const title = document.querySelector(".bannerTitleNew");
    if (title) {
      title.value = data.title || "";
    } else {
      console.error("Element .bannerTitleNew not found");
    }

    const text = document.querySelector(".bannerTextNew");
    if (text) {
      text.value = data.text || "";
    } else {
      console.error("Element .bannerTextNew not found");
    }
  } else {
    console.error(`Unknown entity: ${entity}`);
  }
}

// Унифицированная функция для отправки запроса на сервер
function fetchData(entity, id) {
  // Проверка наличия параметров перед отправкой запроса
  if (!id || !entity) {
    console.error("Missing ID or Entity before sending request");
    return;
  }

  // Логирование отправки запроса
  console.log(`Fetching data for entity: ${entity}, ID: ${id}`);

  const requestBody = JSON.stringify({
    id: id,
    entity: entity,
    action: "getValue",
  });

  fetch("/vendor/functions/api.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json;charset=utf-8",
    },
    body: requestBody,
  })
    .then((response) => {
      if (!response.ok) {
        console.error(`Server returned status: ${response.status}`);
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then((result) => {
      if (result.error) {
        console.error(`Error from server: ${result.error}`);
      } else {
        updateFields(result, entity);
      }
    })
    .catch((error) => console.error("Fetch error:", error));
}

// Использование для продуктов
const products = document.querySelector(".productUpdate");
if (products) {
  products.addEventListener("change", function () {
    const id = this.value;
    if (id) {
      fetchData("product", id);
    } else {
      console.error("Product ID is missing");
    }
  });
} else {
  console.error("Element .productUpdate not found");
}

// Использование использования для категорий
const categories = document.querySelector(".categoryOld");
if (categories) {
  categories.addEventListener("change", function () {
    const id = this.value;
    if (id) {
      fetchData("category", id);
    } else {
      console.error("Category ID is missing");
    }
  });
} else {
  console.error("Element .categoryOld not found");
}

// Использование использования для баннеров
const banner = document.querySelector(".bannerOld");
if (banner) {
  banner.addEventListener("change", function () {
    const id = this.value;
    if (id) {
      fetchData("banner", id);
    } else {
      console.error("Banner ID is missing");
    }
  });
} else {
  console.error("Element .bannerOld not found");
}
