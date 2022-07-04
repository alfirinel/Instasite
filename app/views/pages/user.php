<div class="galleryWrap">
    <div class="design-form-user">
        <form action="/index/store" method="post" enctype="multipart/form-data" class="form-group">
            <div >
                <label for="photo"></label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <div>
                <button type="submit" class="btn-upload"><i class="fa fa-upload"></i> Upload</button>
            </div>
        </form>
    </div>

        <?php if(count($photos) > 0):?>
            <?php foreach ($photos as $photo):?>
                <div class="grid">
                    <img src="<?= $photo['path']?>" class="galleryPic"/>
                    <div class="bottom-list">
                        <div >
                            <form action="/index/destroy" method="post">
                                <input type="hidden" name="id" value="<?= $photo['id']?>">
                                <input type="image" src="/images/delete.png" class="delete-btn">
                            </form>
                        </div>
                        <div><?= $photo['created_at']?></div>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>