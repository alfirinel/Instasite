<span>working gallery</span>
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
                    <td><img src="<?= $photo['path']?>"/></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        <?php endif;?>
    </table>
</div>

