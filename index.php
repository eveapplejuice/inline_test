<?
require_once 'classes/FileManager.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <? FileManager::linkCSS('style.css');?>
    <script src="jquery-3.7.1.min.js"></script>
    <title>Тестовое задание</title>
</head>
<body>
    <div class="wrapper">
        <div class="row">
            <input class="input-field">
            <div id="search_btn" class="search-btn">Найти</div>
        </div>
    </div>
    <? FileManager::linkJS('script.js'); ?>
</body>
</html>