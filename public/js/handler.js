
/*document.getElementById("registr").addEventListener("submit", function(event) {
    event.preventDefault(); // Предотвращаем обычное поведение формы (перезагрузку страницы)
  
    var formData = new FormData(this); // Создаем объект FormData из формы
  
    var xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
    xhr.open("POST", "/handlers/registrHandlers.php", true); // Устанавливаем метод, URL и асинхронность запроса
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Обработка успешного ответа
        console.log(xhr.responseText);
        // Перенаправление на страницу серверного обработчика
        
      }
    };
  
    xhr.send(formData); // Отправляем запрос с данными формы
  });

  xhr.send(formData);*/

  document.getElementById("registr").addEventListener("submit", function(event) {
    event.preventDefault(); // Предотвращаем обычное поведение формы (перезагрузку страницы)
  
    var formData = new FormData(this); // Создаем объект FormData из формы
  
    var xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
    xhr.open("POST", "/handlers/registrHanslers.php", true); // Устанавливаем метод, URL и асинхронность запроса
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Получаем ответ от сервера в виде JSON
          var response = JSON.parse(xhr.responseText);
          
          if (response.success) {
            // Обработка успешного ответа
            console.log("Данные были успешно обработаны.");
          } else {
            // Обработка ошибки
            console.error("Произошла ошибка:");
            // Проходимся по массиву ошибок и выводим их на экран
            for (var errorField in response.errors) {
              if (response.errors.hasOwnProperty(errorField)) {
                var errorId = response.errors[errorField];
                var errorMessage = document.getElementById(errorId).dataset.error;
                console.error(errorMessage);
              }
            }
          }
        } else {
          // Обработка ошибки HTTP
          console.error("Ошибка HTTP: " + xhr.status);
        }
      }
    };
  
    xhr.send(formData); // Отправляем запрос с данными формы
  });