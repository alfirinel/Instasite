<h2>Centered Pagination</h2>

<div class="center">
    <div class="pagination active">
        <a href="#">&laquo;</a>
        <a href="/index/<?= $page?>/?page=1" ">1</a>
        <a href="/index/<?= $page?>/?page=2">1</a>
        <a href="/index/<?= $page?>/?page=3">1</a>
        <a href="/index/<?= $page?>/?page=4">1</a>
        <a href="#">&raquo;</a>
    </div>
</div>

<?php
var_dump($page,$total, $cur_page,$_GET);
// Проверяем нужны ли стрелки назад
if ($cur_page != 1) $pervpage = '<a href= ./page?page=1><<</a>
                               <a href= ./page?page='. ($cur_page - 1) .'><</a> ';
// Проверяем нужны ли стрелки вперед
if ($cur_page != $total) $nextpage = ' <a href= ./page?page='. ($cur_page + 1) .'>></a>
                                   <a href= ./page?page=' .$total. '>>></a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($cur_page - 2 > 0) $page2left = ' <a href= ./page?page='. ($cur_page - 2) .'>'. ($cur_page - 2) .'</a> | ';
if($cur_page - 1 > 0) $page1left = '<a href= ./page?page='. ($cur_page - 1) .'>'. ($cur_page - 1) .'</a> | ';
if($cur_page + 2 <= $total) $page2right = ' | <a href= ./page?page='. ($cur_page + 2) .'>'. ($cur_page + 2) .'</a>';
if($cur_page + 1 <= $total) $page1right = ' | <a href= ./page?page='. ($cur_page + 1) .'>'. ($cur_page + 1) .'</a>';

// Вывод меню
echo $pervpage.$page2left.$page1left.'<b>'.$cur_page.'</b>'.$page1right.$page2right.$nextpage;

?>