<?php

require_once "../../functions.php";
$pdo = require_once '../../database.php';
$errors = [];
$title = '';
$description = '';
$product = [
    'image' => ''
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../../validate_product.php';

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO home_card (title, images, description, created_date)
                VALUES (:title, :images, :description, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':images', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
        $statement->execute();
        header('Location: index.php');
    }

}


?>
<?php require_once '../../views/partials/header.php'; ?>

<h1 class="form-container">Create new CARD</h1>

<?php require_once '../../views/products/form_create.php' ?>

</body>
</html>