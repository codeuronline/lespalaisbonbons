<?php
session_start();
require_once('dev/connect.php');
require_once('dev/tools.php');

$sql = 'SELECT * FROM `hebergement`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);





//require_once('dev/hebergement.class.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gitebonbon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<header>
    <a href="inscription.php"><button class="btn-inscription-connexion" type=submit>Inscription</button></a>
    <a href="connexion.php"><button class="btn-inscription-connexion" type=submit>Connexion</button></a>
    <a href="rechercheutilisateur.html"><img class="logo1" src="image/logo.png" width="100px" height="100px"
            alt="Logo"></a>
</header>


<body class='bg'>
    <div class='container'>
        <div class='row1'>
            <div class='col-lg-4 col-md-8 col-sm-8'>
                <div class='card shadow'>
                    <div class='card-title text-center border-bottom'>
                    </div>

                    <div class='mb-9'>
                        <button class="b1" type=submit><img class="img1" src=image/picto-map-blanc.png height="50"
                                width="50">
                            <select name="id_hebergement" id="id_hebergement" required>
                                <?php
                                var_dump($hebergement);
                                foreach ($result as $hebergement) {
                                    echo "<option value='" . $hebergement['nom'] . "'>" . $hebergement['nom'] . "</option>";
                                } ?>
                            </select>
                    </div>



                    <!-------fin-->
                    <div class='mb-4'>
                        <button class="b1" type=submit><img src=image/groupepicto.png height="50" width="50">
                            <div class="corpsformulaire">
                                <label for="Nombre_de_couchages"></label>
                                <select name="Nombre_de_couchages" id="Nombre_de_couchages" required>
                                    <option value="1">1 Personne</option>
                                    <option value="2">2 Personnes</option>
                                    <option value="3">3 Personnes</option>
                                    <option value="4">4 Personnes</option>
                                </select>
                            </div>
                    </div>


                    <div class="e">


                        <input type="radio" name="fumeur" class="fumeur demoyes" id="fumeur-a" checked value="false">
                        <label for="fumeur-a"><img src='./image/fumeurpictorouge.png' width="60"
                                alt='fumer interdiction' height="60" width="50"></label>
                        <input type="radio" name="fumeur" class="fumeur demono" id="fumeur-b" value="true">
                        <label for="fumeur-b"><img src="./image/fumeurpicto.png" width="60" alt="fumer autorisation"
                                height="60" width="50"></label>

                        <input type="radio" name="piscine" class="piscine demoyes" id="piscine-a" checked value="false">
                        <label for="piscine-a"><img src='./image/piscinepictorouge.png' width="60"
                                alt='piscine interdiction' height="60" width="50"></label>
                        <input type="radio" name="piscine" class="piscine demono" id="piscine-b" value="true"
                            class=form>
                        <label for="piscine-b"><img src="./image/piscinepicto.png" width="60" alt="piscine autorisation"
                                height="60" width="50"></label>

                        <input type="radio" name="animaux" class="animaux demoyes" id="animaux-a" checked value="false">
                        <label for="animaux-a"><img src='./image/animauxpictorouge.png' width="60"
                                alt='piscine interdiction' height="60" width="50"></label>
                        <input type="radio" name="animaux" class="animaux demono" id="animaux-b" value="true"
                            class=form>
                        <label for="animaux-b"><img src="./image/animauxpicto.png" width="60" alt="piscine autorisation"
                                height="60" width="50"></label>

                        <input type="radio" name="wifi" class="wifi demoyes" id="wifi-a" checked value="false">
                        <label for="wifi-a"><img src='./image/wifipictorouge.png' width="60" alt='wifi interdiction'
                                height="60" width="50"></label>
                        <input type="radio" name="wifi" class="wifi demono" id="wifi-b" value="true" class=form>
                        <label for="wifi-b"><img src="./image/wifipicto.png" width="60" alt="wifi autorisation"
                                height="60" width="50"></label>

                        <input type="radio" name="douche" class="douche demoyes" id="douche-a" checked value="false">
                        <label for="douche-a"><img src='./image/douchepictorouge.png' width="60"
                                alt='douche interdiction' height="60" width="50"></label>
                        <input type="radio" name="douche" class="douche demono" id="douche-b" value="true" class=form>
                        <label for="douche-b"><img src="./image/douchepicto.png" width="60" alt="douche autorisation"
                                height="60" width="50"></label>

                        <input type="radio" name="taxi" class="taxi demoyes" id="taxi-a" checked value="false">
                        <label for="taxi-a"><img src='./image/taxipictorouge.png' width="60" alt='taxi interdiction'
                                height="60" width="50"></label>
                        <input type="radio" name="taxi" class="taxi demono" id="taxi-b" value="true" class=form>
                        <label for="taxi-b"><img src="./image/taxipicto.png" width="60" alt="taxi autorisation"
                                height="60" width="50"></label>


                    </div>

                    <button class=btn-recherche type='submit' class='bg-text-light'>Recherche</button>
                </div>
            </div>

            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>