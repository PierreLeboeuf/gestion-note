<?php
// Fichier pour la connexion à la base de données (via PDO).
?>

<?php
class Database {
    public static function getConnection() {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projet-gestion-notes', 'root', '');
            // Optionnel : mode d’erreurs
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}