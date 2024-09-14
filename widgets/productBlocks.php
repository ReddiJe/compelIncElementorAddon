protected function render()
{
    $settings = $this->get_settings_for_display();
?>

    <style>
        .collectionContainer {
            padding: 15px;
        }

        .collectionContainer .collectionHeading {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 0 25px 0;
        }

        .collectionContainer .collectionGrid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 25px;
            width: 100%;
            max-width: 100%;
        }

        .collectionContainer .collectionGrid .product {
            display: flex;
            justify-content: start;
            align-items: start;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }

        .collectionContainer .collectionGrid .product * {
            max-width: 100%;
        }

        .collectionContainer .collectionGrid .product h4 {
            font-size: 18px;
            font-weight: 700;
        }

        .collectionContainer .collectionGrid .product p {
            font-size: 14px;
            font-weight: 300;
        }

        .collectionContainer .collectionGrid .product img {
            width: 100%;
            max-width: 100%;
            object-fit: contain;
            height: 100%;
            cursor: pointer;
        }

        .collectionContainer .collectionGrid .product.no-text img {
            object-fit: cover;
        }

        .collectionContainer .collectionGrid .product .imgContainer {
            width: 100%;
            height: 250px;
            border-radius: 15px;
            background: #fff;
        }

        @media screen and (min-width: 1600px) {
            .collectionContainer .collectionGrid .product .imgContainer {
                height: 300px;
            }
        }

        @media screen and (max-width: 600px) {
            .collectionContainer .collectionGrid {
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 15px;
            }

            .collectionContainer .collectionGrid .product .imgContainer {
                height: 150px;
            }

            .collectionContainer .collectionGrid .product {
                gap: 5px;
            }
        }

        /* Стили для модального окна */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            margin: auto;
            display: block;
            max-width: 80%;
            max-height: 80%;
        }

        .modal-content img {
            width: 100%;
            height: auto;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>

    <!-- HTML для модального окна -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <div class="pageWidthFG">
        <div class="collectionContainer greyBg">
            <div class="collectionHeading">
                <p class="title">
                    <?php echo $settings['title']; ?>
                </p>
                <p class="count">
                    <?php echo $settings['count']; ?>
                </p>
            </div>
            <div class="collectionGrid">
                <?php
                foreach ($settings['repeater_field'] as $item) :
                    $no_text_class = (empty($item['title']) && empty($item['description'])) ? 'no-text' : ''; ?>
                    <div class="product <?php echo $no_text_class; ?>">
                        <div class="imgContainer">
                            <img src="<?php echo $item['image']['url']; ?>" alt="" class="productImage">
                        </div>
                        <?php if (!empty($item['title'])) : ?>
                            <h4><?php echo $item['title']; ?></h4>
                        <?php endif; ?>
                        <?php if (!empty($item['description'])) : ?>
                            <p><?php echo $item['description']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Добавляем JavaScript для работы с модальным окном -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById("imageModal");
            var modalImg = document.getElementById("modalImage");
            var closeModal = document.querySelector(".close");

            // Получаем все изображения
            var images = document.querySelectorAll('.productImage');

            // Проходимся по каждому изображению и добавляем обработчик клика
            images.forEach(function(img) {
                img.addEventListener('click', function() {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                });
            });

            // Закрытие модального окна при нажатии на "крестик"
            closeModal.onclick = function() {
                modal.style.display = "none";
            };

            // Закрытие модального окна при клике вне изображения
            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            };
        });
    </script>

<?php
}
