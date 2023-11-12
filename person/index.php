<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php
include_once "../api/auth-errors.php";
include_once "../app/php/head.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$find = R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) <= 0) {
    header("Location: /");
    die();
}
?>

<title>Личный кабинет | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <div class="alert alert-warning d-flex align-items-center">
                <svg height="32" width="32" class="me-3" fill="dark">
                    <use xlink:href="/app/img/icons/bootstrap.svg#cone-striped"></use>
                </svg>
                <span>
                    Для подтверждения аккаунта <a href="/settings/" class="link">введите ваши данные</a>
                    и <span class="dashed">пройдите по ссылке</span>, отправленную на вашу почту.
                </span>
            </div>
            <div class="person-profile-bg" style="background-image: url('/app/img/users/bg/BG2.jpg');">
                <img src="/app/img/users/icons/MAN1.jpg">
            </div>
            <div class="person-profile">
                <div class="person-profile-content">
                    <div class="person-profile-content-name">
                        <p class="person-profile-content-name-1">
                            Даниил Дыбка
                        </p>
                        <p class="person-profile-content-name-2">
                            Описание профиля
                        </p>
                    </div>
                    <div class="person-profile-content-buttons">
                        <button onClick="ButtonLeftBar(4)" class="btn btn-secondary">
                            Редактировать профиль
                        </button>
                        <!-- <button class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#desc">
                            Ещё
                            <svg height="22" width="22" fill="white">
                                <use xlink:href="/app/img/icons/bootstrap.svg#chevron-down"></use>
                            </svg>
                        </button> -->
                    </div>
                </div>
            </div>
            <div class="person-form">
                <form action="?" method="post">
                    <div class="input-group">
                        <input type="text" name="post" class="form-control" aria-label="Что у вас нового" placeholder="Что у вас нового...">
                    </div>
                </form>
            </div>
            <div class="row row-cols-1 g-4 person-posts">
                <div class="col-md-4">
                    <a href="#">
                        <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                    </a>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="desc" tabindex="-1" aria-labelledby="descLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title fs-5 h1 mb-0" id="descLabel">Подробная информация</p>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <svg height="22" width="22" class="svg-normal">
                            <use xlink:href="/app/img/icons/bootstrap.svg#x-lg"></use>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
