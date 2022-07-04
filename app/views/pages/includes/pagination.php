<?php
if($page!==$page){
    $cur_page === 1;
}
var_dump($total);
?>
<div class="center">
    <div class="pagination active">
        <?php if($cur_page>1):?>
            <a href="/index/<?= $page?>?page=<?= $cur_page - 1 ?>">&laquo;</a>
        <?php endif;?>
        <a href="/index/<?= $page?>?page=1">1</a>
        <a href="/index/<?= $page?>?page=2">2</a>
        <a href="/index/<?= $page?>?page=3">3</a>
        <a href="/index/<?= $page?>?page=4">4</a>
        <?php if($cur_page<$total):?>
            <a href="/index/<?= $page?>?page=<?= $cur_page + 1 ?>">&raquo;</a>
        <?php endif;?>
    </div>
</div>
