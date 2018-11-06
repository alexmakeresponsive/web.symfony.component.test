<header>
    <nav>
        <a href="/?ctrl=Index"">Home</a>
        <a href="/?ctrl=Login">Login</a>
        <a href="/?ctrl=Signup">Sign up</a>
    </nav>

    <?php if ($this->userLoggedName): ?>
    <div>
        <span>Hello, <?php echo $this->userLoggedName; ?></span>
        <a href="/?ctrl=Login&action=Logout"> (Logout)</a>
    </div>
    <?php endif; ?>

</header>