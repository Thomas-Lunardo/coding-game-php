<?php

function check_form ($toto) {

    function isValideName($value) {
        return preg_match('/^[A-Za-z -]*$/', $value);
    }

    function isValideDate($value) {
        return preg_match('/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{1,4}$/', $value);
    }

    function isValideBankAccount($value) {
        return preg_match('/^BE[0-9]{2}( ?[0-9]{4}){3}$/', $value);
    }

    $results = [
        'valide' => true,
        'nom' => ['valide' => true, 'message' => 'Nom ok'],
        'prenom' => ['valide' => true, 'message' => 'Prénom ok'],
        'CP' => ['valide' => true, 'message' => 'Code Postal ok'],
        'naissance' => ['valide' => true, 'message' => 'Date de naissance ok'],
        'banque' => ['valide' => true, 'message' => 'Numéro de compte ok'],
    ];

    if (!isValideName($toto['nom'])) {
        $results['valide'] = false;
        $results['nom']['valide'] = false;
        $results['nom']['message'] = 'Le nom doit être composé des caractères de a à z, de - et d\'espace.';
    }

    if (!isValideName($toto['prenom'])) {
        $results['valide'] = false;
        $results['prenom']['valide'] = false;
        $results['prenom']['message'] = 'Le prénom doit être composé des caractères de a à z, de - et d\'espace.';
    }

    $CP = (int)$toto['CP'];
    if (is_nan($CP) || $CP < 1000 || $CP > 9999) {
        $results['valide'] = false;
        $results['CP']['valide'] = false;
        $results['preCPnom']['message'] = 'Le code postal doit être une valeur numérique comprise entre 1000 et 9999.';
    }

    if (!isValideDate($toto['naissance'])) {
        $results['valide'] = false;
        $results['naissance']['valide'] = false;
        $results['naissance']['message'] = 'La date de naissance doit être au format JJ/MM/AAAA.';
    }

    if (!isValideBankAccount($toto['banque'])) {
        $results['valide'] = false;
        $results['banque']['valide'] = false;
        $results['banque']['message'] = 'Le numéro de compte bancaire est incorrect';
    }

    return $results;
}

$data = [
    'nom' => 'Toto',
    'prenom' => 'Tutu',
    'CP' => 1278,
    'naissance' => '28/02/1987',
    'banque' => 'BE15 1234 5678 9012',
];

$result = check_form($data);
print_r($result);