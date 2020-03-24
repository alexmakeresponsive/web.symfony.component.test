<?php
//Enable dumper
$dumper = require __DIR__ .'/../../../web/dumper.php';

?>


<div class="wr-1 login">
    <?php include __DIR__ .'/parts/header.php'; ?>

    <b class="title-1 center">Sign up</b>
    <div>
        <form action="<?php echo '/?ctrl=Signup'; ?>" method="post">
            <input type="text"
                   placeholder="Name"
                   name="signup[name]"
                   value="<?php echo $this->valueFormFields['signup']['name']; ?>">
            <input type="text"
                   placeholder="E-mail"
                   name="signup[e-mail]"
                   value="<?php echo $this->valueFormFields['signup']['e-mail']; ?>">
            <input type="text"
                   placeholder="Login"
                   name="signup[login]"
                   value="<?php echo $this->valueFormFields['signup']['login']; ?>">
            <input type="password"
                   placeholder="Password"
                   name="signup[password]"
                   value="<?php echo $this->valueFormFields['signup']['password']; ?>">
            <button type="submit"
                    name="signup[submit]">Sign up</button>
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
//            echo $this->test;

            $dumper($this->valueFormFields);
        ?>
    </div>
    <?php endif; ?>

    <?php include __DIR__ .'/parts/footer.php'; ?>
</div>



