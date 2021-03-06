<?php
$web='dev';
session_start();
if (isset($_GET['id_hebergement']) && !empty($_GET['id_hebergement'])) {
    require_once('connect.php');
    //traite les element de la table hebergement
    $id = strip_tags(($_GET['id_hebergement']));
    $sql = 'SELECT * FROM `hebergement` WHERE `id_hebergement` = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $hebergement = $query->fetch(PDO::FETCH_ASSOC);
    //traite les elements de la table periode
    $sql1 = 'SELECT * FROM `periode`  WHERE `id_periode` = :id';
    $query1 = $db->prepare($sql1);
    $query1->bindValue(':id', intval($hebergement['id_periode']));
    $query1->execute();
    $periode = $query1->fetch(PDO::FETCH_ASSOC);


    //traite les elmements de la table jours
    //on verifie si le hebergement existe
    if (!$hebergement) {
        $_SESSION['erreur'] = "Cet ID n'existe pas";
        header('Location: index.php');
    }
} else {
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
} ?>
<!--code html-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="gitebonbon.css">
    <link rel="stylesheet" href="radio.css">
    <link rel="stylesheet" href="test.css">

    <title>Détails de l'hébergement</title>
</head>

<body>
    <div class="a">

        <h1> Gite bonbons Bonbons</h1>

    </div>
    <div class="b"><span>
            <?= (isset($hebergement['photo1']) && !(empty($hebergement['photo1']))) ? "<img src='photo/" . $hebergement['photo1'] . "' width='200'>" : "<img src='../image/vide.png' width='50'"; ?></span>
    </div>
    <div class="c">
        <span>
            <?= ($hebergement['animaux'] == "1") ? "<img src='../image/animauxpicto.png' width='50'>" : "<img src='../image/animauxpictorouge.png' width='50'>";  ?>
            <?= ($hebergement['wifi'] == "1") ? "<img src='../image/wifipicto.png' width='50'>" : "<img src='../image/wifipictorouge.png' width='50'>";  ?>
            <?= ($hebergement['fumeur'] == "1") ? "<img src='../image/fumeurpicto.png' width='50'>" : "<img src='../image/fumeurpictorouge.png' width='50'>";  ?>
            <?= ($hebergement['piscine'] == "1") ? "<img src='../image/piscinepicto.png' width='50'>" : "<img src='../image/piscinepictorouge.png' width='50'>";  ?>
        </span>
    </div>
    <div class="d">
        <h3>Formulaire</h2>
            <form method=POST action="search.php">
                <label for="search">Destination:
                    <input type="text" name="search" id="search">
                </label>
                <label for="couchage">


                </label>
            </form>
    </div>
    <div class="e">coucou</div>
    <div class="f">coucou</div>
    <div class="g">hello</div>
    </div>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails de l'hébergement : <?= $hebergement['nom'] ?></h1>
                <p>Id: <?= $hebergement['id_hebergement'] ?></p>
                <p>Categorie:<?= $hebergement['categorie'] ?></p>
                <p>Nom: <?= $hebergement['nom'] ?></p>
                <p>Adresse: <?= $hebergement['adresse'] ?></p>
                <p>Description: <?= $hebergement['description'] ?></p>
                <p>Prix: <?= $hebergement['prix'] ?></p>
                <p>Couchage: <?= $hebergement['couchage'] ?></p>
                <p>Sdb: <?= $hebergement['sdb'] ?></p>
                <p>
                    <?= ($hebergement['animaux'] == "1") ? "<img src='../image/animauxpicto.png' width='50'>" : "<img src='../image/animauxpictorouge.png' width='50'>";  ?>
                    <?= ($hebergement['wifi'] == "1") ? "<img src='../image/wifipicto.png' width='50'>" : "<img src='../image/wifipictorouge.png' width='50'>";  ?>
                    <?= ($hebergement['fumeur'] == "1") ? "<img src='../image/fumeurpicto.png' width='50'>" : "<img src='../image/fumeurpictorouge.png' width='50'>";  ?>
                    <?= ($hebergement['piscine'] == "1") ? "<img src='../image/piscinepicto.png' width='50'>" : "<img src='../image/piscinepictorouge.png' width='50'>";  ?>
                </p>

                <p>Photo 1:
                    <input type="hidden" id="id_periode" name="id_periode" value=<?= $hebergement['id_periode'] ?>>

                    <?= (isset($hebergement['photo1']) && !(empty($hebergement['photo1']))) ? "<img src='photo/" . $hebergement['photo1'] . "' width='200'>" : "<img src='../image/vide.png' width='50'"; ?>
                </p>
                <p>Debut: <?= $periode['debut']; ?></p>
                <p>Fin: <?= $periode['fin']; ?></p>
                <p>
                    <a href='index.php' class='btn btn-primary'>Retour<a>
                            <a href="edit.php?id_hebergement=<?= $hebergement['id_hebergement']; ?>"
                                class='btn btn-primary'>Modifier</a>
                </p>
            </section>
        </div>
    </main>
</body>

</html>