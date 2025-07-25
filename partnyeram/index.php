<?php
include $_SERVER['DOCUMENT_ROOT'].'/base_info.php';
$page_url = parse_url($_SERVER['PATH_INFO'],PHP_URL_PATH);
// print_r($_SERVER['SERVER_NAME']);
if (substr($page_url, -1)!='/' and $page_url!='') {
    $page_url.='/';
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $page_url");
    exit();
};
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/menu-top.php'; ?>

<section class="section1">
    <div class="container">
        <h1 id="h1id">Партнёрская программа</h1>

        <div class="row justify-content-center align-items-center">
            <div class="col-md">
                <div class="item">
                    <img class="dimg" src="/assets/img/distance.png" alt="Индивидуальные перевозки">
                    <div class="desc">Персональный транспорт <br> для ваших клиентов</div>
                </div>
            </div>
            <div class="col-md">
                <div class="item">
                    <img class="dimg" src="/assets/img/timer.png" alt="Честный тариф">
                    <div class="desc">Прозрачное ценообразование <br> без скрытых платежей</div>
                </div>
            </div>
            <div class="col-md">
                <div class="item">
                    <img class="dimg" src="/assets/img/fixcost.png" alt="Фиксированная цена">
                    <div class="desc">Гарантированная ставка <br> без изменения в процессе</div>
                </div>
            </div>
        </div>

        <a href="/" class="bttn">Оставить заявку на сотрудничество</a>

    </div>
</section>

<section class="section3" style="background: #f6f7f8;">
    <div class="container">
        <h2>Условия партнёрства</h2>
        <p>Прделагаем взаимовыгодное сотрудничество для бизнеса в сфере туризма, логистики и транспортных услуг. Наши преимущества для партнёров:</p>
        <ol>
            <li>Фиксированные конкурентные тарифы на все виды перевозок.</li>
            <li>Премиальное качество сервиса и обслуживания клиентов.</li>
            <li>Полная безопасность и страхование перевозок.</li>
            <li>Агентское вознаграждение от 10% с каждой выполненной поездки.</li>
            <li>Нулевые инвестиции с вашей стороны - мы берём все расходы на себя.</li>
            <li>Отсутствие любых финансовых обязательств и рисков.</li>
            <li>Гарантированные еженедельные выплаты партнёрских вознаграждений.</li>
            <li>Обслуживание клиентов по всей территории нашего покрытия.</li>
            <li>Минимальное вовлечение вашего персонала - все заботы на нас.</li>
        </ol>
    </div>
</section>

<?php //include $_SERVER['DOCUMENT_ROOT'].'/contents/body-top.php'; ?>
<?php //include $_SERVER['DOCUMENT_ROOT'].'/contents/breadcrumb.php'; ?>
<?php //include $_SERVER['DOCUMENT_ROOT'].'/contents/body-end.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/pre-footer.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/footer.php'; ?>
    
</html>