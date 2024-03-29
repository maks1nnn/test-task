document.getElementById('enter').addEventListener('submit', function (event) {
  event.preventDefault(); // Отменить отправку формы

  // Собрать данные формы
  var login = document.getElementById('login').value;

  var password = document.getElementById('password').value;


  // Создать объект для отправки данных на сервер
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/handlers/enterHandlers.php', true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Отправить данные формы на сервер
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Получить и разобрать ответ от сервера
      var response = JSON.parse(xhr.responseText);

      // Очистить сообщения об ошибках
      clearErrorMessages();

      if (response.success) {
        // Успешно обработано, выполнить дополнительные действия
        sendDataToController(login, password);
        alert('Form submitted successfully!');

      } else {
        // Обработка ошибок
        handleErrors(response.errors);
      }
    }
  };

  // Преобразовать данные формы в строку для отправки
  var data = 'login=' + encodeURIComponent(login) +
    '&password=' + encodeURIComponent(password);


  // Отправить данные на сервер
  xhr.send(data);
});

// Функция для отображения сообщений об ошибках
function displayErrorMessage(field, message) {
  var errorField = document.getElementById('error-' + field);
  errorField.textContent = message;
}

// Функция для очистки сообщений об ошибках
function clearErrorMessages() {
  var errorFields = document.getElementsByClassName('error-message');
  for (var i = 0; i < errorFields.length; i++) {
    errorFields[i].textContent = '';
  }
}

// Функция для обработки ошибок
function handleErrors(errors) {
  for (var field in errors) {
    if (errors.hasOwnProperty(field)) {
      var error = errors[field];
      displayErrorMessage(error.field, error.message);
    }
  }
}

function sendDataToController(login, password) {

  // Создать объект для отправки данных на сервер
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/start', true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Получить и разобрать ответ от сервера
      var response = xhr.responseText;
      
      var startIndex = response.indexOf('{');
      var endIndex = response.lastIndexOf('}');

      // Извлекаем JSON-часть из строки
      var json = response.substring(startIndex, endIndex + 1);

      // Парсим JSON-строку в объект JavaScript
      var jsonData = JSON.parse(json);

      
      console.log(jsonData);

      // Очистить сообщения об ошибках
      clearErrorMessages();

      if (jsonData.success) {
        // Успешно обработано, выполнить дополнительные действия

        window.location.href = '/hello';

      } else {
        // Обработка ошибок
        handleErrors(jsonData.errors);
      }
    }
  };


  // Преобразовать данные формы в строку для отправки
  var dataNewUser = 'login=' + encodeURIComponent(login) +
    '&password=' + encodeURIComponent(password);


  // Отправить данные на сервер
  console.log(dataNewUser);
  xhr.send(dataNewUser);
}



