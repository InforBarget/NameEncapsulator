<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['names'])) {
    // Récupère les noms à partir des données du formulaire
    $names = explode("\n", $_POST['names']);
    // Encapsule chaque nom avec la balise [char]
    foreach ($names as &$name) {
        $name = trim($name);
        $name = "[char]" . $name . "[/char]";
    }
    // Convertit le tableau de noms en une chaîne pour l'affichage
    $namesString = implode("\n", $names);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Noms</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Entrez une liste de noms</h2>
    <form method="post">
        <textarea name="names" rows="10" cols="30"><?php echo isset($_POST['names']) ? $_POST['names'] : ''; ?></textarea><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php if (!empty($namesString)): ?>
        <div class="output">
            <h3>Noms avec balises:</h3>
            <pre><?php echo htmlspecialchars($namesString); ?></pre>
        </div>
    <?php endif; ?>
</body>
</html>