<?php
function isEmailValid($email) {
    // Pulisco l'email per rimuovere caratteri non validi
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // Controllo se l'email contiene una "@" e un "."
    if (strpos($email, '@') !== false && strpos($email, '.') !== false) {
        return true;  // L'email è valida
    } else {
        return false;  // L'email non è valida
    }
}
?>
