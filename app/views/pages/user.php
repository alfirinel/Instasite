<div class="panel-body">
    <form action="/index/store" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="photo">Upload photo:</label>
            <input type="hidden" name="id" value="<?php \app\helpers\Session::getValue('id') ?>">
            <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Upload</button>
    </form>
</div>