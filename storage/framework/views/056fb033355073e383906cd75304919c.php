<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <?php if (isset($component)) { $__componentOriginalf697583636abf20b39710b782e3afda1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf697583636abf20b39710b782e3afda1 = $attributes; } ?>
<?php $component = App\View\Components\NavigationLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navigation-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavigationLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf697583636abf20b39710b782e3afda1)): ?>
<?php $attributes = $__attributesOriginalf697583636abf20b39710b782e3afda1; ?>
<?php unset($__attributesOriginalf697583636abf20b39710b782e3afda1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf697583636abf20b39710b782e3afda1)): ?>
<?php $component = $__componentOriginalf697583636abf20b39710b782e3afda1; ?>
<?php unset($__componentOriginalf697583636abf20b39710b782e3afda1); ?>
<?php endif; ?>

        <main>
            <?php echo e($slot); ?>

        </main>
    </div>
</body>

</html>
<?php /**PATH /home/fereline/example-app/resources/views/layouts/home.blade.php ENDPATH**/ ?>