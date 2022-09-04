<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/classes/control/DataNews.php";

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="dist/css/styleheet.css">
    <title>Новостной агрегатор</title>
</head>
<body>
<header>
    <div class="header">
        <i class="header__logo">Новостной агрегатор</i>
        <button type="submit" class="uk-button uk-button-danger header__button-save-in-xml" value="<?= $controlFromExportXml ?>">Сохранить страницу в Xml</button>
    </div>
</header>
<div class="container">
    <?php if($newsCatcherApi->json["status"] == 'error' && $newsApi->json["status"] == 'error'): ?>
        <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
            <h3 class="uk-card-title">Ошибка</h3>
            <p>Источники новостей недоступны</p>
        </div>
    <?php elseif($newsCatcherApi->json["status"] == 'error' && $newsApi->json["status"] != 'error'): ?>
        <?php for($i = 0; $i < $lengthNewsApi; $i ++):?>
            <div class="uk-child-width-expand@s uk-text-center" uk-grid>
                <?php for($j = 0; $j < 3; $j ++): ?>
                <div>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img src="<?= $cache['allnews']['newsapi-' . $i]['onenews-' . ($countDataNewsapi + $j)]['img'] ?>" width="300" height="300" alt="">
                            </div>
                            <div class="uk-card-body container_card__green">
                                <h3 class="uk-card-title"><?= $cache['allnews']['newsapi-' . $i]['onenews-' . ($countDataNewsapi + $j)]['title'] ?></h3>
                                <p><?= $cache['allnews']['newsapi-' . $i]['onenews-' . ($countDataNewsapi + $j)]['author'] ?></p>
                                <p><?= $cache['allnews']['newsapi-' . $i]['onenews-' . ($countDataNewsapi + $j)]['date'] ?></p>
                                <p><?= $cache['allnews']['newsapi-' . $i]['onenews-' . ($countDataNewsapi + $j)]['source'] ?></p>
                                <button id="<?= $countDataNewsapi + $j ?>" class="uk-button uk-button-primary uk-margin-small-right button-view-newsapi" value="<?= $i ?>" type="button" uk-toggle="target: #modal-example">Открыть</button>
                                <div id="modal-example" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body">
                                        <p>
                                            <p class="text-modal-window"></p>
                                            <button class="uk-button uk-button-default uk-modal-close" type="button">Закрыть</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
                <?php $countDataNewsapi += 3 ?>
            </div>
        <?php endfor; ?>
    <?php elseif($newsApi->json["status"] == 'error' && $newsCatcherApi->json["status"] != 'error'): ?>
        <?php for($i = 0; $i < $lengthNewsCatcherApi; $i ++): ?>
        <div class="uk-child-width-expand@s uk-text-center" uk-grid>
            <?php for($j = 0; $j < 3; $j ++): ?>
                <div>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img src="<?= $cache['allnews']['newscatcherapi-' . $i]['onenews-' . ($countDataNewsCatcherapi + $j)]['img'] ?>" width="300" height="300" alt="">
                            </div>
                            <div class="uk-card-body container_card__turquoise">
                                <h3 class="uk-card-title"><?= $cache['allnews']['newscatcherapi-' . $i]['onenews-' . ($countDataNewsCatcherapi + $j)]['title'] ?></h3>
                                <p><?= $cache['allnews']['newscatcherapi-' . $i]['onenews-' . ($countDataNewsCatcherapi + $j)]['author'] ?></p>
                                <p><?= $cache['allnews']['newscatcherapi-' . $i]['onenews-' . ($countDataNewsCatcherapi + $j)]['date'] ?></p>
                                <p><?= $cache['allnews']['newscatcherapi-' . $i]['onenews-' . ($countDataNewsCatcherapi + $j)]['source'] ?></p>
                                <button id="<?= $countDataNewsCatcherapi + $j ?>" class="uk-button uk-button-primary uk-margin-small-right button-view-newscatcherapi" value="<?= $i ?>" type="button" uk-toggle="target: #modal-example">Открыть</button>
                                <div id="modal-example" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body">
                                        <p>
                                            <p class="text-modal-window"></p>
                                            <button class="uk-button uk-button-default uk-modal-close" type="button">Закрыть</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
            <?= $countDataNewsCatcherapi += 3 ?>
        </div>
        <?php endfor; ?>
    <?php else:?>
        <?php for($i = 0; $i < 10; $i ++): ?>
            <?php if($i % 2 == 0): ?>
                <div class="uk-child-width-expand@s uk-text-center" uk-grid>
                    <?php for($j = 0; $j < 3; $j ++): ?>
                        <div>
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="<?= $cache['allnews']['newsapi-' . $countNewsapi]['onenews-' . ($countOneNews)]['img'] ?>" width="300" height="300" alt="">
                                    </div>
                                    <div class="uk-card-body container_card__green">
                                        <h3 class="uk-card-title"><?= $cache['allnews']['newsapi-' . $countNewsapi]['onenews-' . ($countOneNews)]['title'] ?></h3>
                                        <p><?= $cache['allnews']['newsapi-' . $countNewsapi]['onenews-' . ($countOneNews)]['author'] ?></p>
                                        <p><?= $cache['allnews']['newsapi-' . $countNewsapi]['onenews-' . ($countOneNews)]['date'] ?></p>
                                        <p><?= $cache['allnews']['newsapi-' . $countNewsapi]['onenews-' . ($countOneNews )]['source'] ?></p>
                                        <button id="<?= $countOneNews ?>" class="uk-button uk-button-primary uk-margin-small-right button-view-newsapi" value="<?= $countNewsapi ?>" type="submit" uk-toggle="target: #modal-example">Открыть</button>
                                        <div id="modal-example" uk-modal>
                                            <div class="uk-modal-dialog uk-modal-body">
                                                <p class="text-modal-window"></p>
                                                <button class="uk-button uk-button-default uk-modal-close" type="submit">Закрыть</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $countOneNews ++ ?>
                        </div>
                    <?php endfor; ?>
                    <?php $countNewsapi ++ ?>
                </div>
            <?php else: ?>
                <div class="uk-child-width-expand@s uk-text-center" uk-grid>
                    <?php for($j = 0; $j < 3; $j ++): ?>
                        <div>
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="<?= $cache['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . ($countOneNews)]['img'] ?>" width="300" height="300" alt="">
                                    </div>
                                    <div class="uk-card-body container_card__turquoise">
                                        <h3 class="uk-card-title"><?= $cache['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . ($countOneNews)]['title'] ?></h3>
                                        <p><?= $cache['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . ($countOneNews)]['author'] ?></p>
                                        <p><?= $cache['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . ($countOneNews)]['date'] ?></p>
                                        <p><?= $cache['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . ($countOneNews)]['source'] ?></p>
                                        <button id="<?= $countOneNews ?>" class="uk-button uk-button-primary uk-margin-small-right button-view-newscatcherapi" value="<?= $countNewsCatcherapi ?>" type="submit" uk-toggle="target: #modal-example">
                                            Open
                                        </button>
                                        <div id="modal-example" uk-modal>
                                            <div class="uk-modal-dialog uk-modal-body">
                                                <p class="text-modal-window"></p>
                                                <button class="uk-button uk-button-default uk-modal-close" type="submit" uk-toggle="target: #modal-example">Закрыть</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $countOneNews ++ ?>
                        </div>
                    <?php endfor; ?>
                    <?php $countNewsCatcherapi ++ ?>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    <?php endif; ?>
</div>
<script src="dist/bundle.js"></script>
</body>
</html>
