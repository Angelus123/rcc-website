<?php require"config.php" ?>
<?php

require_once "../../functions.php";
$pdo = require_once '../../database.php';

$keyword = $_GET['search'] ?? null;

if ($keyword) {
    $statement = $pdo->prepare('SELECT * FROM home_card WHERE title like :keyword ORDER BY created_date DESC');
    $statement->bindValue(":keyword", "%$keyword%");
} else {
    $statement = $pdo->prepare('SELECT * FROM home_card ORDER BY created_date DESC');
}
$statement->execute();
$cards = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once '../../views/partials/header.php'; ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <ul class="navbar-nav">
        <li class="nav-item"><a href="https://hindutemple.org.rw"><img src="../../../../asset/image/logo.jpeg" alt ="logo" width="100px" height="50px"/></a></li>
            <li class="nav-item active">
                <a class="nav-link" href="https://hindutemple.org.rw"> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://hindutemple.org.rw/component/about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://hindutemple.org.rw/component/contact.html">Contact</a>
            </li>
            <li class="nav-link" >  
         
   
    </li>
        </ul>
    </nav>
<h1>Hindu News</h1>

<p>

    <a href="https://hindutemple.org.rw/backend/homepage/public/crud/create.php" type="button" class="btn btn-sm btn-success">Add card</a>
</p>
<form action="" method="get">
    <div class="input-group mb-3">
      <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $keyword ?>">
      <div class="input-group-append">
        <button class="btn btn-success" type="submit">Search</button>
      </div>
    </div>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Create Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cards as $i => $card) { ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td>
                <?php if ($card['images']): ?>
                    <img src="../../public/<?php echo $card['images'] ?>" alt="<?php echo $card['title'] ?>"style="width:250px; height:250px">
                <?php endif; ?>
            </td> 
            <td><?php echo $card['title'] ?></td>
           
            <td><?php echo $card['description'] ?></td>
            <td><?php echo $card['created_date'] ?></td>
            <td>
                <a href="https://hindutemple.org.rw/backend/homepage/public/crud/update.php?id=<?php echo $card['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form method="post" action="https://hindutemple.org.rw/backend/homepage/public/crud/delete.php" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $card['id'] ?>"/>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>