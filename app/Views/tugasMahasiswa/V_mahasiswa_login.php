<div>
    <center>
        <h1>Sign In</h1>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-danger"><?php echo session()->getFlashdata('pesan') ?></div>
        <?php endif; ?>
        <form action="/login" method="get">
            <div class="mb-3">
                <label>Username</label>
                <input name="username">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </center>
</div>