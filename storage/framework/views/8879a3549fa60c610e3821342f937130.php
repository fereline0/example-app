<label for="<?php echo e($id); ?>" class="inline-flex items-center">
    <input id="<?php echo e($id); ?>" type="checkbox" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>"
        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
        <?php echo e($checked ? 'checked' : ''); ?>>
    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400"><?php echo e($label); ?></span>
</label><?php /**PATH /home/fereline/example-app/resources/views/components/checkbox.blade.php ENDPATH**/ ?>