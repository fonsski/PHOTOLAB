document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('3d-container');
    const productSelect = document.getElementById('product');
    const uploadInput = document.getElementById('upload');
    const orderButton = document.getElementById('order-button');

    // Инициализация сцены, камеры и рендера
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer();
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Загрузка 3D модели
    let model;
    const loader = new THREE.GLTFLoader();

    function loadModel(product) {
        loader.load(`/assets/models/${product}.gltf`, (gltf) => {
            if (model) scene.remove(model);
            model = gltf.scene;
            scene.add(model);
            model.position.set(0, 0, 0);
            model.rotation.set(0, 0, 0);
        }, undefined, (error) => {
            console.error('An error happened during loading the model:', error);
        });
    }

    productSelect.addEventListener('change', (event) => {
        const product = event.target.value;
        loadModel(product);
    });

    // Загрузка изображения
    uploadInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = (e) => {
            const texture = new THREE.TextureLoader().load(e.target.result);
            if (model) {
                model.traverse((child) => {
                    if (child.isMesh) {
                        child.material.map = texture;
                        child.material.needsUpdate = true;
                    }
                });
            }
        };
        reader.readAsDataURL(file);
    });

    // Настройка камеры
    camera.position.z = 5;

    const animate = function () {
        requestAnimationFrame(animate);
        if (model) model.rotation.y += 0.01;
        renderer.render(scene, camera);
    };

    animate();

    // Обработка кнопки "Оформить заказ"
    orderButton.addEventListener('click', () => {
        const formData = new FormData();
        formData.append('product', productSelect.value);
        formData.append('image', uploadInput.files[0]);

        fetch('/vendor/functions/upload.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            alert('Заказ оформлен!');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Произошла ошибка при оформлении заказа.');
        });
    });
});