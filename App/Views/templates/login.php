<?php
//Enable dumper
$dumper = require __DIR__ .'/../../../web/dumper.php';

?>


<div class="wr-1 login">
    <?php include __DIR__ .'/parts/header.php'; ?>

    <b class="title-1 center">Login</b>
    <div>
        <form action="<?php echo '/?ctrl=Login'; ?>" method="post">
            <input type="text"
                   placeholder="Login"
                   name="login[login]"
                   value="<?php echo $this->valueFormFields['login']['login']; ?>">
            <input type="password"
                   placeholder="Password"
                   name="login[password]"
                   value="<?php echo $this->valueFormFields['login']['password']; ?>">
            <button type="submit" name="login[submit]">Login</button>
        </form>
    </div>

    <?php if (!empty($this->errors)): ?>
        <div class="box errors">
            <?php
            echo implode(', ', $this->errors );
            ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->valueFormFields)): ?>
        <div>
            <?php
            $dumper($this->valueFormFields);
            ?>
        </div>
    <?php endif; ?>

    <?php include __DIR__ .'/parts/footer.php'; ?>
</div>


<?php

