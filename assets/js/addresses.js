var map, marker;

DG.then(function () {
  const initialLocation = {
    lat: 54.960681,
    lon: 73.411413,
    popupContent:
      "1-я транспортная, 10 <br> <a href='tel:+7-965-986-84-99'>+7-965-986-84-99</a> <br> Ежедневно 10:00–19:00<br> Обед 13:00-13:30",
  };

  map = DG.map("map", {
    center: [initialLocation.lat, initialLocation.lon],
    zoom: 18,
  });

  marker = DG.marker([initialLocation.lat, initialLocation.lon])
    .addTo(map)
    .bindPopup(initialLocation.popupContent, {
        maxWidth: window.innerWidth >= 450 ? 200 : null,
        maxHeight: window.innerWidth >= 450 ? 150 : null
    })
    .openPopup();
});

function updateMap(lat, lon, popupContent) {
  if (map) {
    map.setView([lat, lon], 18);
    if (marker) {
      marker.setLatLng([lat, lon]).setPopupContent(popupContent).openPopup();
    } else {
      marker = DG.marker([lat, lon])
        .addTo(map)
        .bindPopup(popupContent)
        .openPopup();
    }
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Массив с данными для обновления карты
  const locations = [
    {
      lat: 54.960681,
      lon: 73.411413,
      popupContent:
        "1-я транспортная, 10 <br> <a href='tel:+7-965-986-84-99'>+7-965-986-84-99</a> <br> Ежедневно 10:00–19:00<br>Обед 13:00-13:30",
    },
    {
      lat: 54.922053,
      lon: 73.45916,
      popupContent:
        "Станционная 6-я, 2/3 — 1 этаж; около магазина Парфюм-лидер <br><a href='tel:+7-960-994-28-66'>+7-960-994-28-66</a> <br> Ежедневно 10:00–21:00, 13:00–13:30 - обед<br>",
    },
    {
      lat: 54.995135,
      lon: 73.250073,
      popupContent:
        "Дианова, 14 — 2 этаж <br> <a href='tel:+7-960-994-28-98'>+7-960-994-28-98</a> <br> Ежедневно 10:00–21:00<br> Обед 13:00-13:30",
    },
    {
      lat: 54.996825,
      lon: 73.285721,
      popupContent:
        "Комарова 6к1 — 1 этаж <br> <a href='tel:+7-960-994-28-77'>+7-960-994-28-77</a> <br> Ежедневно 10:00–21:00<br> Обед 14:30-15:00",
    },
  ];

  // Получаем все кнопки адресов и блоки с адресами
  const addressButtons = document.querySelectorAll(".address_button");
  const addressesMobile = document.querySelector(".addresses_mobile__nav");
  const addressesNavBlock = document.querySelector(".address_nav__block");

  if (addressButtons.length > 0) {
    addressButtons[0].classList.add("active_adr");
    updateMap(locations[0].lat, locations[0].lon, locations[0].popupContent);

    addressButtons.forEach((button, index) => {
      button.addEventListener("click", function () {
        addressButtons.forEach((btn, i) => {
          if (i === index) {
            btn.classList.add("active_adr");
            const location = locations[i];
            updateMap(location.lat, location.lon, location.popupContent);
          } else {
            btn.classList.remove("active_adr");
          }
        });
      });
    });
  }

  if (addressesMobile && addressesNavBlock) {
    addressesMobile.addEventListener("click", function () {
      addressesNavBlock.classList.toggle("open");
    });
  }
});
