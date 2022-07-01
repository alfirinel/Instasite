<div class="galleryWrap">
        <?php if(count($photos) > 0):?>
            <?php foreach ($photos as $photo):?>
                    <?= $photo['user'] ?>
                    <img src="<?= $photo['path']?>" class="gallery-photo" alt="gallery-photo"/>
                        <form action="/index/like" method="post" class="btn-like">
                            <input type="hidden" name="id" value="<?= $photo['id']?>">
                            <input type="submit" value="like">
                            <?= $photo['likes']?>
                            <?= $photo['created_at']?>
                        </form>
            <?php endforeach;?>
        <?php endif;?>
</div>


