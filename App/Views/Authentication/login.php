<div class="container mt-5">
    <h2>Login</h2>
    <?php
    if (isset($_SESSION['msg'])) {
        echo "<h3><span class='text-warning'>{$_SESSION['msg']}</span></h3>";
        unset($_SESSION['msg']);
    }
    ?>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text mb-4">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </div>
        <button type="submit" name="ok" class="btn btn-success">Login</button>
    </form>
</div>
