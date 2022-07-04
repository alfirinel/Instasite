<div class="center">
    <div class="pagination">
        <a href="/index/gallery?page=">&laquo;</a>
        <a href="/index/gallery?page=1">1</a>
        <a href="/index/gallery?page=2" class="active">2</a>
        <a href="/index/gallery?page=3" class="active">3</a>
        <a href="/index/gallery?page=">&raquo;</a>
    </div>
</div>
<?php
//// Проверяем нужны ли стрелки назад
//if ( (integer) $current_page != 1) $pervpage = '<a href= ./page?page=1><<</a>
//                               <a href= ./page?page='. ((int)$total_page - 1) .'><</a> ';
//// Проверяем нужны ли стрелки вперед
//if ($current_page != $total_page) $nextpage = ' <a href= ./page?page='. ($current_page + 1) .'>></a>
//                                   <a href= ./page?page=' .$total_page. '>>></a>';
//
//// Находим две ближайшие станицы с обоих краев, если они есть
//if($current_page - 2 > 0) $page2left = ' <a href= ./page?page='. ($current_page - 2) .'>'. ($current_page - 2) .'</a> | ';
//if($page - 1 > 0) $page1left = '<a href= ./page?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';
//if($current_page + 2 <= $total_page) $page2right = ' | <a href= ./page?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
//if($current_page + 1 <= $total_page) $page1right = ' | <a href= ./page?page='. ($page + 1) .'>'. ($page + 1) .'</a>';
//
//// Вывод меню
//echo $pervpage.$page2left.$page1left.'<b>'.$current_page.'</b>'.$page1right.$page2right.$nextpage;
//
//?>