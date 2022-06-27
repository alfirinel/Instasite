<div class="design-form">
    <img class="logo-form" src="/images/logo.png" alt="logo">

    <form action="/index/checkLogin" method="post" id="formSignUp">
        <?php if($errors !==null):?>
            <ul>
                <?php foreach ($errors as $error):?>
                    <li style="color: rgba(255,87,62,0.93)"><?= $error?></li>
                <?php endforeach;?>
            </ul>
            <br>
        <?php endif;?>
        <label for="login" class="item-text">Login:</label>
        <input type="text" name="login" id="login" class="item" placeholder="Enter login" required value="<?= $login;?>"/>
        <label for="pass" class="item-text">Password:</label>
        <input type="password" name="password" id="pass" class="item" minlength="6" placeholder="Enter password" required/>
        <input type="submit" value="Sign In" class="item-btn">
    </form>
    <div>
        <a href="signup">Register</a>
    </div>
</div>
