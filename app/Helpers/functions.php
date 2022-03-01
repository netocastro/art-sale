<?php

/**
 * função de validação de nomes com expressões regulares
 */

function validateName($name): bool
{
    if (preg_match('/^[a-zA-Z ]+$/', $name)) {
        return true;
    } else {
        return false;
    }
}

/**
 * função de validação de dinheiro com expressões regulares
 */

function validateMoney($money): bool
{
    if (preg_match('/^[0-9]+\,[0-9]{2}$/', $money)) {
        return true;
    } else {
        return false;
    }
}

/**
 * função de validação de cpf com expressões regulares
 */

function validateCpf($cpf): bool
{
    if (preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/', $cpf)) {
        return true;
    } else {
        return false;
    }
}

/**
 * função de validação de email
 */

function validateEmail($email): bool
{
    if (preg_match('/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/', $email)) {
        return true;
    } else {
        return false;
    }
}

/**
 * função de validação de  Phone com expressões regulares
 */

function validatePhone($phone): bool
{
    if (preg_match('/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/', $phone)) {
        return true;
    } else {
        return false;
    }
}

/**
 * função de validação de  Cell Phone com expressões regulares
 */

function validateCellPhone($cellPhone): bool
{
    if (preg_match('/^\([0-9]{2}\)[9][0-9]{4}\-[0-9]{4}$/', $cellPhone)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Transforma objetos do tipo DataLayer em arrays
 */

function objectToArray($object): array
{
    $newArray = [];
    if ($object == null) {
        return (array)$newArray;
    }

    if (is_array($object)) {

        foreach ($object as $item => $value) {
            $newArray[] = (array)$value->data();
        }
        return  (array) $newArray;
    } else {
        $newArray = [];
        $newArray[] = (array)$object->data();
        return (array)$newArray;
    }
}

/**
 * função que verifica se valores existem dentro de um objeto DataLayer
 */

function objectsExist($model, array $data, array $filter): array
{
    $arrayFilter = [];
    $error = [];
    $response = [];

    /**
     * condição para verificar se o array $filter foi passado vazio
     */

    if (empty($filter)) {
        $error['filter'] = 'filter empty';
        return $error;
    }

    /**
     * verificar se o valores do array $filter existem no array data
     */

    foreach ($filter as $key1) {
        $cont = 0;
        foreach ($data as $key2 => $value) {
            if ($key1 == $key2) {
                $arrayFilter[$key1] = $value;
                $cont = 1;
            }
        }

        /**
         * retornando valores do array $filter que não existem no array $data
         */

        if ($cont == 0) {
            $error[] = $key1;
        }
    }

    /**
     * retornando o erro com os nomes dos indices do array filter
     * que não estãono array data
     */

    if (!empty($error)) {
        return ["indiceNaoExiste" => $error];
    }

    /**
     * Consultando o banco de dados com os names filtrados e retornando o resultado caso
     * exista registro
     */

    foreach ($arrayFilter as $key => $value) {

        if ($model->find("{$key} = :{$key}", "{$key}=" . $data[$key])->fetch()) {
            $response[] = $key;
        }
    }

    if ($response) {
        return $response;
    } else {
        return [];
    }
}

/**
 * função que verifica se valores existem dentro de um objeto DataLayer DEBUG
 */

function objectsExistEcho($model, array $data, array $filter)
{
    $arrayFilter = [];
    $error = [];

    if (empty($filter)) {
        $error['filter'] = 'filter empty';
        print_r($error);
        return;
    }
    foreach ($filter as $key1) {
        $cont = 0;
        foreach ($data as $key2 => $value) {
            if ($key1 == $key2) {
                $arrayFilter[$key1] = $value;
                $cont = 1;
            }
        }
        if ($cont == 0) {
            $error[] = $key1;
        }
    }
    if (!empty($error)) {
        print_r(["indiceNaoExiste" => $error]);
        return;
    }
    //print_r(['arrayFilter' =>$arrayFilter]);
    print_r($arrayFilter);

    $response = [];

    foreach ($arrayFilter as $key => $value) {
        echo "<h1>$key</h1>";
        echo "<pre>";
        //print_r($model->find("$key = :$key", "$key=" . $data[$key])->fetch()->data());
        ($model->find("$key = :$key", "$key=" . $data[$key])->fetch()) ? $response[] = $key : '';


        echo "</pre>";
    }
    print_r($response);
}

function email($newPassword)
{
    return "<!DOCTYPE html>
    <html>
    <head>
    
        <style type='text/css'>
            .fundo{
                background-color: black;
            }
            .center{
                display: flex;
                justify-content: center;
                font-size: 30px;
                color: white;
    
            }
            .password{
                color: blue;
            }
        </style>
    </head>
    <body>
    
        <div class='fundo'>
            <div>
                <center><img src='http://l2goat.baudafulo.com/cdn/assets/media/images/logos/logo-freya1.png'></center>
                
            </div>
            <div class='center'>
                <h5>Your new password is : <span class='password'>{$newPassword}</span></h5>
            </div>
        </div>
    
    
    </body>
    </html>";
}
