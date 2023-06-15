<?php

namespace helpers;


class CookiesManager {
    public function set($name, $value, $expires = 0, $path = '/', $domain = '', $secure = false, $httpOnly = true) {
        setcookie($name, $value, $expires, $path, $domain, $secure, $httpOnly);
    }

    public function get($name) {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    public function delete($name, $path = '/', $domain = '') {
        setcookie($name, '', time() - 3600, $path, $domain);
        unset($_COOKIE[$name]);
    }
}

