<?php ?>
    <div class="galleryWrap">
        <?php if(count($photos) > 0):?>
            <?php foreach ($photos as $photo):?>
                <div class="grid">
                    <div class="user-name"><?= $photo['user'] ?></div>
                <img src="<?= $photo['path']?>" alt="gallery-photo" class="galleryPic"/>
                    <div class="bottom-list">
                        <div class="like-wrap">
                            <form action="/index/like" method="post" class="btn-like">
                                <input type="hidden" name="id" value="<?= $photo['id']?>">
                                <input type="image" src="/images/like.png" class="like">
                            </form>
                            <div class="like-number"><?= $photo['likes']?></div>
                        </div>
                        <?= $photo['created_at']?>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>