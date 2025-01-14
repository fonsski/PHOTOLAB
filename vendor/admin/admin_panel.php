<?php
$title = "Админ панель";
require_once "admin_header.php";
?>
<!-- Main Content -->
<main>
    <h1>Аналитика</h1>
    <!-- Analyses -->
    <div class="analyse">
        <!-- <div class="sales">
            <div class="status">
                <div class="info">
                    <h3>Total Sales</h3>
                    <h1>$65,024</h1>
                </div>
                <div class="progresss">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="percentage">
                        <p>+81%</p>
                    </div>
                </div>

                </div>
        </div> -->
        <div class="visits">
            <div class="status">
                <div class="info">
                    <h3>Посещаемость сайта</h3>
                    <h1>24,981</h1>
                </div>
                <div class="progresss">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="percentage">
                        <p>-48%</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="searches">
            <div class="status">
                <div class="info">
                    <h3>Searches</h3>
                    <h1>14,147</h1>
                </div>
                <div class="progresss">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="percentage">
                        <p>+21%</p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- End of Analyses -->

    <!-- Recent Orders Table -->
    <div class="recent-orders">
        <h2>Недавно изменено</h2>
        <table>
            <thead>
                <tr>
                    <th>Название товара</th>
                    <th>Цена товара</th>
                    <th>Время изменения</th>
                    <th></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
</main>
<?php
require_once "right_section.php";
?>
</div>
</body>

</html>
