<form method="GET" class="mb-3">
    <div class="btn-group" role="group">
        <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-outline-secondary <?php echo e(request('filter') === null ? 'active' : ''); ?>">All</a>
        <a href="<?php echo e(route('tasks.index', ['filter' => 'completed'])); ?>" class="btn btn-outline-secondary <?php echo e(request('filter') === 'completed' ? 'active' : ''); ?>">Completed</a>
        <a href="<?php echo e(route('tasks.index', ['filter' => 'pending'])); ?>" class="btn btn-outline-secondary <?php echo e(request('filter') === 'pending' ? 'active' : ''); ?>">Pending</a>
    </div>
</form>
<?php /**PATH C:\Users\leena.baniodeh\task-management-app\resources\views/components/task-filter.blade.php ENDPATH**/ ?>