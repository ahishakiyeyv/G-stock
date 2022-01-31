<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/03.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Tableau de Bord</title>
</head>
<body>
<header>
        <div class="admin">
            <div class="img">
                <img src="images/2.jpg" alt="Image non disponible" height="75" width="75" class="img-admin">
            </div>
            <div class="txt">
                <h3 class="adm">Admin</h3>
                <p class="prof"><a href="profil.php" class="voir">voir profil</a></p>
            </div>
            </div>
            <div class="log-out">
                <a href="index.php" class="decon">Log-out   <i class="fas fa-power-off"></i></a>
            </div>
        
    </header>
    <div id="boody">
    <nav>
        <div class="menu-link">
            <ul class="ul">
            <li class="li"><a class="link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>  --  Dashboard</a></li>
                <li class="li"><a class="link" href="entree.php"><i class="fas fa-cart-plus"></i>   --   Entrée</a></li>
                <li class="li"><a class="link" href="sortie.php"><i class="fas fa-shopping-bag"></i>  --  Sortie</a></li>
                <li class="li"><a class="link" href="produit.php"><i class="fas fa-dolly-flatbed"></i>   --   Produit </a></li>
                <li class="li"><a class="link" href="stock.php"><i class="fas fa-warehouse"></i>   --     Stock </a></li>
                <li class="li"><a class="link" href="fournisseur.php"><i class="fas fa-user-plus"></i>   --   Fournisseur</a></li>
                <li class="li"><a class="link" href="categorie.php"><i class="fas fa-sort"></i>      --   Categorie</a></li>
                <li class="li"><a class="link" href="journal.php"><i class="fas fa-newspaper"></i>   --   Journal</a></li>
                <li class="li"><a class="link" href="utilisateur.php"><i class="fas fa-users"></i>   --  Utilisateur</a></li>
                <li class="li"><a class="link" href="statistique.php"><i class="fas fa-chart-line"></i>     --    Statistique</a></li>
        </div>
    </nav>
    <section id="section">
        <?php
        if(isset($_GET["mod"])){
            $select=$bdd->query("SELECT * FROM produit WHERE id_pro=".$_GET["mod"]."");
            $data=$select->fetch();
        }
        ?>
    <div class="aj_produit">
            <h3 class="stitlepro">Ajouter un produit</h3>
            <fieldset class="fieldset002">
                <form action="" method="post">
                    <table>
                        <tr>
                            <th class="th-pro">Code Produit</th>
                            <td><input type="text" name="code" class="inpt-pro" placeholder="Code Produit..." value="<?php echo $data["CodePro"]?>" required></td>
                        </tr>
                        <tr>
                            <th class="th-pro">Nom Produit</th>
                            <td><input type="text" name="nompro" class="inpt-pro" placeholder="Nom..." value="<?php echo $data["nomPro"]?>" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="Ajouter" name="submit" id="sub_pro">
                            <input type="reset" value="Annuler" id="res_pro">
                        </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </section>
    </div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $code=$_POST["code"];
    $nom=$_POST["nompro"];
    $update=$bdd->EXEC("UPDATE produit SET CodePro='$code',nomPro='$nom' WHERE id_pro=".$_GET["mod"]."");
}
?>