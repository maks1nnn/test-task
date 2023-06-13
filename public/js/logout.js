function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handlers/logout.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Обработка успешного ответа от сервера
            console.log(xhr.responseText);
            // Дополнительные действия после успешного разлогинивания
            window.location.href = '/start';
        }
    };
    xhr.send();
}