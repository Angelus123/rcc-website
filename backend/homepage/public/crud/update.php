<?php

require_once "../../functions.php";
$pdo = require_once '../../database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM home_card WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);
$title = $product['title'];
$description = $product['description'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../../validate_product.php';

    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE home_card SET title = :title, 
                                        images = :images, 
                                        description = :description
                                         WHERE id = :id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':images', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':id', $id);

        $statement->execute();
        header('Location: index.php');
    }

}

?>
<?php require_once '../../views/partials/header.php'; ?>
<p>
    <a href="index.php" class="btn btn-secondary">Back</a>
</p>
<h1>Update Product: <b><?php echo $product['title'] ?></b></h1>


<?php require_once '../../views/products/form.php' ?>

</body>
</html>