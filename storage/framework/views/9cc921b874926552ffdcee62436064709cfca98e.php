<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($student->name); ?></td>
        <td><?php echo e($student->surname); ?></td>
        <td><?php echo e($student->phone); ?></td>
        <td><?php echo e($student->email); ?></td>
        <td>
            <?php if($student->faculty): ?>
                <?php echo e($student->faculty->name); ?>

            <?php endif; ?>
        </td>
        <td>
            <?php if($student->faculty): ?>
                <?php echo e($student->group->name); ?>

            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

