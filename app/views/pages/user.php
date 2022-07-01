<div class="panel-body">
    <form action="/index/store" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="photo">Upload photo:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Upload</button>
    </form>
    <div class="galleryWrap">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php if(count($photos) > 0):?>
                <tbody>
                <?php foreach ($photos as $photo):?>
                    <tr>
                        <td><?= $photo['id']?></td>
                        <td><img src="<?= $photo['path']?>" class="gallery-photo"/></td>
                        <td>
                            <form action="/index/destroy" method="post">
                                <input type="hidden" name="id" value="<?= $photo['id']?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            <?php endif;?>
        </table>
    </div>
</div>