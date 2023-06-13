<?php

session_start();
session_destroy();

// Отправка ответа клиенту
echo "Logout successful";