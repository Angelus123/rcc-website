<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
      <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="form-container">
<form method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label>Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
    </div>
    <div class="form-group">
        <label>description</label>
        <textarea class="form-control" name="description"><?php echo $description ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>