<div class="design-form">
    <img class="logo-form" src="/images/logo.png" alt="logo">
    <form action="/auth/checkSignup" method="post" id="formSignUp">
        <?php if(isset($errors)):?>
            <ul>
                <?php foreach ($errors as $error):?>
                    <li style="color: rgba(255,87,62,0.93)"><?= $error?></li>
                <?php endforeach;?>
            </ul>
        <br>
        <?php endif;?>
        <label for="login" class="item-text">Login:</label>
        <input type="text" name="login" id="login" value="<?= $login?>" class="item" placeholder="Enter login" required/>
        <label for="name" class="item-text">Name:</label>
        <input type="text" name="name" id="name" value="<?= $name?>" class="item" placeholder="Enter name" required/>
        <label for="email" class="item-text">Email:</label>
        <input type="email" name="email" id="email" value="<?= $email?>" class="item"  placeholder="Enter email" required>
        <label for="pass" class="item-text">Password:</label>
        <input type="password" name="password" id="pass" class="item" minlength="6" placeholder="Enter password" required/>
        <label for="conf_pass" class="item-text">Password&nbspconfirm:</label>
        <input type="password" name="password_confirm" id="conf_pass" class="item" minlength="6" placeholder="Repeat password" required/>
        <input type="hidden" class="item-text" name="cur_date" value="<?= time()?>">
        <input type="submit" value="Sign Up" class="item-btn">
    </form>
    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a></p>
    </div>
</div>
