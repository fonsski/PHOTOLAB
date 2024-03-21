let serviceButtons = document.querySelectorAll(".services_button");

serviceButtons.forEach((element) => {
  element.addEventListener("click", () => {
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
        console.log(result);
        result.forEach((product) => {
          html += htmlCreate(product);
        });
        document.querySelector(".services_content").innerHTML = html;
        serviceButtons.forEach((button) => {
          button.classList.remove("active");
        });
        element.classList.add("active");
      });
  });
});

function htmlCreate(product) {
  return `
    <div class="product_card">
      <div class="card__image"><img src="/assets/img/products/${product.img}"></div>
      <div class="card__content">
        <h3 class="card__content-title">${product.name}</h3>
        <h3 class="card__content_cost">${product.price} р.</h3>
      </div>
    </div>
    `;
}

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
    console.log(result);
    result.forEach((product) => {
      html += htmlCreate(product);
    });
    console.log(html);
    document.querySelector(".services_content").innerHTML = html;
    const allServiceButtons = document.querySelectorAll(".services_button");
    allServiceButtons.forEach((button) => {
      button.classList.remove("active");
    });
    activeServiceButton.classList.add("active");
  });