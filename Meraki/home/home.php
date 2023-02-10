<?php
    session_start();

    include_once '../tools/variables.php';
    $page_title = 'Home';
    $css = 'home';
    $home = ' active';

    include_once '../includes/header.php';
    include_once '../classes/food.class.php';
?>

<div class="content">
    <div class="top">
        <p>Welcome!</p>
        <img src="../icons/logo/logo_icon.svg" class="logo">
        <?php
            if(!isset($_SESSION['logged_in'])){
                echo '<a href="../login/login.php" class="submit-btn">Sign in</a>';
            }
            else{
                echo '<a href="#"><img src="../icons/notification.svg"></a>';
            }
        ?>
    </div>
    <div class="row1">
        <span class="background"></span>

        <div class="search-container">
            <input type="text" name="search" placeholder="Search food or beverage">
            <a href="#">
                <img src="../icons/Search.svg">
            </a>
        </div>

        <div class="filter-container">
            <button>
                <img src="../icons/filter/favorites.svg">
            </button>

            <button>
                <img src="../icons/filter/vegetable.svg">
            </button>

            <button>
                <img src="../icons/filter/fish.svg">
            </button>

            <button>
                <img src="../icons/filter/drinks.svg">
            </button>

            <button>
                <img src="../icons/filter/cutlery.svg">
            </button>
        </div>
    </div>

    <div class="banner-container">
        <div class="img">
            <img src="../icons/banners/banner.png">
            <a href="#">Order Now</a>
        </div>
    </div>

    <div class="item-label-container">
        <h1>MOST FAVORITE</h1>
        <hr>
    </div>

    <div class="item-container">

        <?php
            $foods = new Food;

            foreach($foods->fetch() as $food){
        ?>
                <div class="items">
                    <img class="item-img" src="../icons/items/<?= $food['img'] ?>.png">
                    <div class="item-desc">
                        <div class="item-name-cont">
                            <p class="item-name"><?= $food['name']; ?></p>
                        </div>
                        <p class="item-price"><span>₱</span> <?= $food['price']; ?></p>
                        <div class="item-rates">
                            <div>
                                <img src="../icons/items/heart.svg">
                                <p><?= $food['likes']; ?></p>
                            </div>
                            <div>
                                <img src="../icons/items/star.svg">
                                <p><?= $food['rates']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>

    </div>
</div>

<?php
    include_once '../includes/navbar.php';
    include_once '../includes/footer.php';
?>