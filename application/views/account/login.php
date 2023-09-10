
<p><?php echo $title; ?></p>
<form id="enter">
    <div><label for="login">Login:</label><input type="text" id="login" name="login" value="" placeholder="Enter your login" data-error="error-login">
        <div id="error-login" class="error-message"></div>
    </div>
    <div><label for="password">Password:</label><input type="password" id="password" name="password" value="" placeholder="Enter your password" data-error="error-password">
        <div id="error-password" class="error-message"></div>
    </div>
    <div><a href="/account/register">Регистрация</a></div><input type="submit" value="Submit">
</form>
<script src="/public/scripts/enterHandler.js"></script>
<link rel="stylesheet" href="/public/styles/style.css">