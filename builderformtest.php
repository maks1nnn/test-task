<form id="registr">
  <div>
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" value="" placeholder="Enter your login" data-error="error-login">
    <div id="error-login" class="error-message"></div> <!-- Блок для вывода ошибки -->
  </div>
  <div>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="" placeholder="Enter your name" data-error="error-name">
    <div id="error-name" class="error-message"></div> <!-- Блок для вывода ошибки -->
  </div>
  <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="" placeholder="Enter your email" data-error="error-email">
    <div id="error-email" class="error-message"></div> <!-- Блок для вывода ошибки -->
  </div>
  <div>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="" placeholder="Enter your password" data-error="error-password">
    <div id="error-password" class="error-message"></div> <!-- Блок для вывода ошибки -->
  </div>
  <div>
    <label for="repeatPassword">Repeat password:</label>
    <input type="password" id="repeatPassword" name="repeatPassword" value="" placeholder="Repeat your password" data-error="error-repeatPassword">
    <div id="error-repeatPassword" class="error-message"></div> <!-- Блок для вывода ошибки -->
  </div>
  <input type="submit" value="Submit">
</form>
<script src="../public/js/handler.js"></script><link rel="stylesheet" href="../public/css/style.css">




