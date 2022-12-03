<?php

//Recupero el nombre del usuario
function userName($UserID, $mibd)
{
    $getUsername = $mibd->prepare('SELECT nombre FROM usuarios WHERE usuario_ID = ?');
    $getUsername->execute(array($UserID));
    $nombreUsuario = $getUsername->fetch();
    return $nombreUsuario;
};

//Recupero el nombre de la categoría
function categName($categID, $mibd)
{
    $getCateg = $mibd->prepare('SELECT * FROM categoria WHERE categ_ID = ?');
    $getCateg->execute(array($categID));
    $categ = $getCateg->fetch();
    return $categ;
};
