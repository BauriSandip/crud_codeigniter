<h2>Register</h2>
<form action="<?= site_url('register') ?>" method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
<a href="<?= site_url('login') ?>">Already have an account? Login here.</a>