<div class="bg-image">
    <div class="nav"><a href="/"><img class="logo" src="/images/logo.png" alt="logo"></a>
        <?php if(\app\helpers\Session::isAuth()):?>
            <ul class="header-list">
                <li  class="header-list-item"><a href="/" class="header_name">Home</a></li>
                <li  class="header-list-item"><a href="/index/gallery" class="header_name">Gallery</a></li>
                <li  class="header-list-item"><a href="/index/user" class="header_name">My photos</a></li>
            </ul>
            <ul class="auth-list">
                <li class="auth-list-item">Howdy, <?= \app\helpers\Session::getValue('user')['login'] ?>!</li>
                <li  class="auth-list-item">|</li>
                <li class="auth-list-item"><a href="/auth/logout" class="header_name">Log out</a></li>
            </ul>
        <?php else:?>
            <ul class="auth-list">
                <li  class="auth-list-item"><a href="/auth/login" class="header_name">Login</a></li>
                <li  class="auth-list-item">|</li>
                <li  class="auth-list-item"><a href="/auth/signup" class="header_name">Register</a></li>
            </ul>
        <?php endif;?>
    </div>
</div>