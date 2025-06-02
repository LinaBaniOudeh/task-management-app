

<?php $__env->startSection('content'); ?>
<h1><?php echo e(isset($task) ? 'Edit Task' : 'New Task'); ?></h1>
<form method="POST" action="<?php echo e(isset($task) ? route('tasks.update', $task) : route('tasks.store')); ?>">
    <?php echo csrf_field(); ?>
    <?php if(isset($task)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

    <input type="text" name="title" class="form-control mb-2" placeholder="Title" value="<?php echo e(old('title', $task->title ?? '')); ?>">
    <textarea name="description" class="form-control mb-2" placeholder="Description"><?php echo e(old('description', $task->description ?? '')); ?></textarea>
    <?php
    $dueDateFormatted = isset($task->due_date) ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d\TH:i') : '';
    ?>
    <input type="datetime-local" name="due_date" class="form-control mb-2" value="<?php echo e(old('due_date', $dueDateFormatted)); ?>">

    <div class="form-check mb-2">
        <!-- This hidden field ensures a 0 value is sent if the checkbox is unchecked -->
        <input type="hidden" name="is_completed" value="0">
        <input type="checkbox" class="form-check-input" name="is_completed" value="1"
            <?php echo e(old('is_completed') ? 'checked' : ''); ?>>
        Completed
    </div>

    <button class="btn btn-success"><?php echo e(isset($task) ? 'Update' : 'Create'); ?></button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leena.baniodeh\task-management-app\resources\views/tasks/create.blade.php ENDPATH**/ ?>