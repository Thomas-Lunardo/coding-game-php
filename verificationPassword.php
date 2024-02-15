<?php

// Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password respecte les règles suivantes :
    // Faire au moins 8 caractères
    // Avoir au moins 1 chiffre
    // Avoir au moins une majuscule et une minuscule

    $password = 'helloWor1d';

    function verificationPassword(string $str): bool
    {
        if (strlen($str) < 8) {
            return false;
    } elseif (!preg_match('/^([-a-zA-Z0-9])/', $str)) {
        return false;
    }
    
    else {
        return true;
    }
    }
    
    echo verificationPassword($password);
