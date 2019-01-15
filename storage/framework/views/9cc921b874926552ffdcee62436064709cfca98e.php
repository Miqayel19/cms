<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($student->name); ?></td>
        <td><?php echo e($student->surname); ?></td>
        <td><?php echo e($student->phone); ?></td>
        <td><?php echo e($student->email); ?></td>
        <td><?php echo e($student->faculty->name); ?></td>
        <td><?php echo e($student->group->name); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

