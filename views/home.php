<form action="" method="post">
    <label for="name">Nom</label>
    <input type="text" name="name" required value="<?= $name ?? '' ?>">
    <div class="error"><?= $errors['name'] ?? ''?></div>
    <label for="description">Description</label>
    <input type="text" name="description" required value="<?= $description ?? '' ?>">
    <div class="error"><?= $errors['description'] ?? ''?></div>
    <label for="repetitions">Repetitions</label>
    <input type="number" name="repetitions" required value="<?= $repetitions ?? '' ?>">
    <div class="error"><?= $errors['repetitions'] ?? ''?></div>
    <input type="submit">
</form>