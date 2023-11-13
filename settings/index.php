<?php
session_start();
include_once "../api/auth-errors.php";

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

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Настройки аккаунта | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <h1>Настройки</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="col-md-8">
                        <div class="person-setting-bg person-setting-content">
                            <div class="alert alert-background d-flex align-items-center" role="alert">
                                <svg height="32" width="32" class="me-3 svg-normal see-at-full-pc">
                                    <use xlink:href="/app/img/icons/bootstrap.svg#cone-striped"></use>
                                </svg>
                                <span>
                                    Ваш аккаунт не подтвержден, введите <span class="dashed">имя</span>, <span class="dashed">фамилию</span>,
                                    <span class="dashed">никнейм</span> и <a href="/api/php/person/send-verify-email.php" class="link">подтвердите почту</a>.
                                </span>
                            </div>
                            <h2 id="data">Личные данные</h2>
                            <form class="needs-validation" action="/api/php/person/edit-name.php" method="post" novalidate>
                                <div>
                                    <input class="form-control" type="text" name="name1" placeholder="Имя" aria-label="Имя" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите имя.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="text" name="name2" placeholder="Фамилия" aria-label="Фамилия" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите фамилию.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="text" name="nickname" placeholder="Никнейм" aria-label="Никнейм" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите уникальный никнейм.
                                    </div>
                                    <p class="form-more">
                                        Уникальное короткое имя.
                                    </p>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="icon">Фотография</h2>
                            <form class="needs-validation" action="?" method="post" novalidate>
                                <div>
                                    ...
                                </div>
                                <button class="btn btn-primary mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="cap">Обложка</h2>
                            <form class="needs-validation" action="?" method="post" novalidate>
                                <div>
                                    ...
                                </div>
                                <button class="btn btn-primary mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="person-setting-bg person-setting-bar">
                            <ul>
                                <li>
                                    <a href="#data">
                                        Личные данные
                                    </a>
                                </li>
                                <li>
                                    <a href="#icon">
                                        Фотография
                                    </a>
                                </li>
                                <li>
                                    <a href="#cap">
                                        Обложка
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="person-setting-bg person-setting-bar">
                            <a href="/api/php/person/person-exit.php" class="link-danger">
                                Выйти из аккаунта
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/app/js/confirm-form.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
