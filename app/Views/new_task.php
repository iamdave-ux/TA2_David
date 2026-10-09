<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Task</title>
</head>
<body>
    <h1>Add New Task</h1>
    <nav>
        <a href="<?= base_url('/'); ?>">Today's Tasks</a> | 
        <a href="<?= base_url('/tasks'); ?>">All Tasks</a> | 
        <a href="<?= base_url('/profile'); ?>">Profile</a> | 
        <a href="<?= base_url('/about'); ?>">About</a>
    </nav>
    <hr>

    <!-- Display Validation Errors -->
    <?php if (isset($validation)): ?>
        <div style="color: red; margin-bottom: 15px;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/tasks/create'); ?>" method="post">
        <?= csrf_field() ?>
        
        <div>
            <label><strong>Title (Required):</strong></label><br>
            <input type="text" name="title" value="<?= old('title') ?>" style="width: 300px; padding: 5px;">
        </div>
        <br>
        <div>
            <label><strong>Description:</strong></label><br>
            <textarea name="description" rows="4" style="width: 300px; padding: 5px;"><?= old('description') ?></textarea>
        </div>
        <br>
        <div>
            <label><strong>Task Date (Required):</strong></label><br>
            <input type="date" name="task_date" value="<?= old('task_date') ?>" style="padding: 5px;">
        </div>
        <br>
        <button type="submit" style="padding: 8px 15px;">Save Task</button>
    </form>
</body>
</html>