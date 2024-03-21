<?php
include "../functions/core.php";
$_POST = (array) json_decode(file_get_contents('php://input'));
$id = $_POST['id'];

switch ($id) {
    case 1:
        $data = [
            [
                'h1' => 'Главная',
                'content' => '<div class="cls">Пока не используемый элемент в силу малого финансирования и сроков.</div>',
            ]
        ];
        break;
    case 2:
        $category = $link->query("SELECT * FROM `categories`");
        $products = $link->query("SELECT * FROM `products`");

        $resultCategory = [];
        foreach ($category as $item) {
            $resultCategory .= "<option value='{$item['id']}'>{$item['name']}</option>";
        }

        $resultProduct = [];
        foreach ($products as $key) {
            $resultProduct .= "<option value='{$key['name']}'>{$key['name']}</option>";
        }

        $data = [
            [
                'h1' => 'Товары',
                'content' => '<div class="products_block">
                <div class="cls">
                <h1>Добавить товар</h1>
                <form action="addProduct.php" method="POST" enctype="multipart/form-data"> 
                <label for="products">Введите название товара</label>
                <input type="text" name="name">
                <label for="products">Введите цену</label>
                <input type="text" name="cost">
                <label for="product_category">Выберите категорию товара</label>
                <select name="category_id">' .
                    $resultCategory
                    . '</select>
                <label for="img">Выберете изображение</label>
                <input type="file" name="img">
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>
                
                
                <div class="cls">
                <h1>Редактировать товар</h1>
                <form action="productUpdate.php" method="POST" enctype="multipart/form-data">
                <label for="name_old">Выберите товар для редактирования</label>
                <select name="name_old" class="select_old">' .
                    $resultProduct
                    . '</select>
                <label for="products__name_new">Введите новое название товара</label>
                <input type="text" name="products__name_new">
                <label for="cost__new">Введите новую цену</label>
                <input type="text" name="cost__new">
                <label for="product_category__new">Выберите новую категорию товара</label>
                <select name="category_id__new">' .
                    $resultCategory
                    . '</select>
                <input type="file" name="img__new">
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>

                <div class="cls">
                <h1>Удалить товар</h1>
                <form action="productDelete.php" method="POST"> 
                <label for="product__delete">Введите название товара</label>
                <select name="product__delete">' .
                    $resultProduct
                    . '</select>
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>',
            ]
        ];
        break;
    case 3:
        $category = $link->query("SELECT * FROM `categories`");
        $resultCategory = [];
        foreach ($category as $item) {
            $resultCategory .= "<option value='{$item['name']}'>{$item['name']}</option>";
        }

        $data = [
            [
                'h1' => 'Категории товаров',
                'content' => '<div class="products_block">
                <div class="cls">
                <h1>Добавить категорию</h1>
                <form action = "addCategory.php" method="post"> 
                <label for="category_name">Введите название категории</label>
                <input type="text" name="category_name">
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>
                
                
                <div class="cls">
                <h1>Редактировать категорию</h1>
                <form action="updateCategory.php" method="POST"> 
                <select name="category_old_red" class="category_old">' .
                    $resultCategory
                    . '</select>
                <label for="category_new_name">Введите новое значение категории</label>
                <input type="text" name="category_new_name">
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>

                <div class="cls">
                <h1>Удалить категорию</h1>
                <form action="deleteCategory.php" method="POST"> 
                <label for="category_old_del">Выберите категорию для удаления</label>
                <select name="category_old_del">' .
                    $resultCategory
                    . '</select>
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>',
            ]
        ];
        break;
    case 4:
        $data = [
            [
                'h1' => 'Настройки баннера',
                'content' => '<div class="products_block">
                <div class="cls">
                <h1>Создать баннер</h1>
                <form action = "addCategory.php" method="post"> 
                <label for="products">Введите заголовок баннера</label>
                <input type="text" name="name">
                <label for="products">Введите описание баннера</label>
                <input type="text" name="cost">
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>
                
                
                <div class="cls">
                <h1>Редактировать категорию</h1>
                <form> 
                <label for="products">Введите новое значение категории</label>
                <input type="text" name="products">
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>
                <div class="cls">
                <h1>Удалить категорию</h1>
                <form> 
                <label for="products">Введите название категории</label>
                <input type="text" name="products">
                <button class="admin_button">Подтвердить</button>
                </form>
                </div>',
            ]
        ];
        break;
    default:
        $data = [
            [
                'h1' => 'Страница не найдена',
                'content' => 'Ошибка 404',
            ]
        ];
}

echo json_encode($data);
