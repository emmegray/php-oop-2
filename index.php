<?php
include "./User.php";
include "./Product.php";

$users = [
    'utente_con_carta' => new User("Mario", "Rossi", "4111111111111111"),
    'utente_senza_carta' => new User("Luigi", "Verdi", "")
];

$discount = 0;
$utente_attuale = false;

if ($_GET['utente']) {
    $utente_attuale = $users[$_GET['utente']];
    $discount = 20;
}

$products = [
    new Product("Collarino", "collari", 10, 5),
    new Product("Ciotola rossa", "ciotole", 5, 6),
    new Antipulci("Bayer antizecche", "antipulci", 15, 5),
];

$problema_carta = false;
if ($utente_attuale) {
    $problema_carta = $utente_attuale->checkInvalidCreditCard();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
</head>

<body>
    <ul>
        <li>link di test: </li>
        <li><a href="?utente=utente_con_carta">utente con carta</a></li>
        <li><a href="?utente=utente_senza_carta">utente senza carta</a></li>
        <li><a href="?">nessun utente</a></li>
    </ul>

    <?php if ($utente_attuale) : ?>
        <h1>Ciao, <?php $utente_attuale->printName(); ?> </h1>
    <?php endif; ?>
    <?php if ($problema_carta) : ?>
        <h2 style="color: red">Rinnova i tuoi dati!</h2>
    <?php endif; ?>
    <h2>Prodotti:</h2>
    <ul>
        <?php foreach ($products as $product) : ?>
            <?php if ($product->checkAvailability()) : ?>
                <li><b><?php $product->printName() ?></b> <em><?php $product->printPrice($discount) ?></em></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>

</html>