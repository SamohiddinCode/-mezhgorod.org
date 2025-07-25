<?php
include $_SERVER['DOCUMENT_ROOT'].'/base_info.php';
$page_url = parse_url($_SERVER['PATH_INFO'],PHP_URL_PATH);
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
        <h1 id="h1id">Контактная информация</h1>
        
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-md">
                <div class="item shadow-sm p-4 bg-white rounded text-center h-100">
                    <img class="dimg mb-3" src="/assets/img/distance.png" alt="Индивидуальные перевозки">
                    <div class="desc">
                        <h3>Персональный подход</h3>
                        <p>От адреса до адреса без попутчиков. Гарантия конфиденциальности и комфорта.</p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="item shadow-sm p-4 bg-white rounded text-center h-100">
                    <img class="dimg mb-3" src="/assets/img/timer.png" alt="Честный тариф">
                    <div class="desc">
                        <h3>Прозрачное ценообразование</h3>
                        <p>Время в пути не подлежит оплате. Вы платите только за километраж.</p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="item shadow-sm p-4 bg-white rounded text-center h-100">
                    <img class="dimg mb-3" src="/assets/img/fixcost.png" alt="Фиксированная цена">
                    <div class="desc">
                        <h3>Фиксированная стоимость</h3>
                        <p>Цена, указанная при заказе, не изменится по прибытии.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center my-5">
            <a href="/" class="bttn btn-primary btn-lg px-4 py-2">Рассчитать стоимость поездки</a>
        </div>
    </div>
</section>

<section class="section3 py-5" style="background: #f6f7f8;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="mb-4">Наши контакты</h2>
                <div class="card shadow-sm p-4 mb-4">
                    <h4>Служба поддержки</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i> Телефон: <a class="phone fw-bold" href="tel:+79600331212">8 (960) 033-12-12</a></li>
                        <li class="mb-2"><i class="bi bi-chat-dots me-2"></i> Telegram: <a class="phone fw-bold" href="https://t.me/1" target="_blank">@mezhgorod</a></li>
                        <li class="mb-2"><i class="bi bi-whatsapp me-2"></i> WhatsApp: <a class="phone fw-bold" href="https://wa.me/79600331212">+7 960 033-12-12</a></li>
                    </ul>
                </div>
                
                <div class="card shadow-sm p-4">
                    <h4>График работы</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">Служба поддержки: 24/7</li>
                        <li class="mb-2">Офис: Пн-Пт с 9:00 до 18:00</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-7 mt-4 mt-lg-0">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-0">
                        <h4 class="card-title p-4 pb-0">Наш офис</h4>
                        <address class="px-4">
                            <strong>Огородный пр., 10, стр. 6, Москва</strong><br>
                            Бизнес-центр "Огородный Плаза", 3 этаж
                        </address>
                        
                        <div class="px-4 mb-3">
                            <h5>Как добраться</h5>
                            <p>5 минут пешком от станции метро "Бутырская". Имеется парковка для клиентов.</p>
                        </div>
                        
                        <div style="height: 400px; width: 100%;">
                            <iframe src="https://yandex.ru/maps/?um=constructor%3A1a2b3c4d5e6f7g8h9i0j&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgg1NjcyNjI0MhJI0KDQvtGB0YHQuNGPLCDQnNC-0YHQutCy0LAiM9CQ0L7QutC-0L3RgtC-0LrRgywg0YPQu9C40YbQsCwgMTDQodGC0L4gNtC6IgoN9d3HQhXQjzJC" 
                                    width="100%" 
                                    height="100%" 
                                    frameborder="0"
                                    style="border:0;"
                                    allowfullscreen=""
                                    aria-hidden="false"
                                    tabindex="0">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/pre-footer.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/contents/footer.php'; ?>
    
</html>