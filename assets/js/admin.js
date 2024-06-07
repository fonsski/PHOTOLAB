const products = document.querySelector(".productUpdate");
if (products) {
  products.addEventListener("change", function () {
    const id = this.value;
    fetch("/vendor/functions/api.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json;charset=utf-8",
      },
      body: JSON.stringify({ id: id, action: "getProductApi" }),
    })
      .then((response) => response.json())
      .then((result) => {
        console.log(result);
        const categories = document.querySelector(".productCategoryNew");
        if (categories) {
          categories.value = result.category_id;
        }
        const name = document.querySelector(".productNameNew");
        if (name) {
          name.value = result.name;
        }
        const cost = document.querySelector(".productCostNew");
        if (cost) {
          cost.value = result.cost;
        }
      });
  });
}
