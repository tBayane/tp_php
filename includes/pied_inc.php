<?php
// Auteur : Tahiri Bayane
// Objectif : pied de page avec la date du jour et le compte à rebours du semestre
// Date : 18/10/2026
?>
<hr>
<footer>
    <p><?= ETABLISSEMENT ?></p>
    <?php
    echo "<p>Date du jour : " . date("d/m/Y") . "</p>";

    $fin = new DateTime("2027-01-31");
    $aujourdhui = new DateTime("today");
    $diff = $aujourdhui->diff($fin);
    if ($diff->invert) {
        echo "<p>Le semestre est terminé.</p>";
    } else {
        echo "<p>Il reste " . $diff->days . " jours avant la fin du semestre.</p>";
    }
    ?>
</footer>
</body>
</html>