

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Task List</h1>
        <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-success">+ Create Task</a>
    </div>

    <?php if (isset($component)) { $__componentOriginal6a2da5895348efd7ac349e7eedf5e2eb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a2da5895348efd7ac349e7eedf5e2eb = $attributes; } ?>
<?php $component = App\View\Components\TaskFilter::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('task-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\TaskFilter::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a2da5895348efd7ac349e7eedf5e2eb)): ?>
<?php $attributes = $__attributesOriginal6a2da5895348efd7ac349e7eedf5e2eb; ?>
<?php unset($__attributesOriginal6a2da5895348efd7ac349e7eedf5e2eb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a2da5895348efd7ac349e7eedf5e2eb)): ?>
<?php $component = $__componentOriginal6a2da5895348efd7ac349e7eedf5e2eb; ?>
<?php unset($__componentOriginal6a2da5895348efd7ac349e7eedf5e2eb); ?>
<?php endif; ?>

    <?php if($tasks->count()): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="<?php echo e($task->is_completed ? 'table-success' : ''); ?>">
                        <td><?php echo e($task->title); ?></td>
                        <td><?php echo e($task->description); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($task->due_date)->format('Y-m-d H:i')); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e($task->is_completed ? 'success' : 'warning'); ?>">
                                <?php echo e($task->is_completed ? 'Completed' : 'Pending'); ?>

                            </span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('tasks.edit', $task)); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <form action="<?php echo e(route('tasks.destroy', $task)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($tasks->links()); ?>

    <?php else: ?>
        <p>No tasks available.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leena.baniodeh\task-management-app\resources\views/tasks/index.blade.php ENDPATH**/ ?>