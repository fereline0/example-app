<?php if (isset($component)) { $__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b = $attributes; } ?>
<?php $component = App\View\Components\HomeLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\HomeLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-4 text-center my-12 lg:my-24 xl:my-48">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Добро пожаловать на
                        <?php if (isset($component)) { $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $attributes; } ?>
<?php $component = App\View\Components\Link::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Link::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('vacancies.index'))]); ?><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $attributes = $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $component = $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        Платформу, которая соединяет работодателей и соискателей, предоставляя удобный и эффективный
                        способ
                        поиска работы и подбора персонала.
                    </p>
                </div>
                <div>
                    <?php if (isset($component)) { $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $attributes; } ?>
<?php $component = App\View\Components\Link::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Link::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('vacancies.index'))]); ?><?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Начать искать работу мечты <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $attributes = $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $component = $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
                </div>
            </div>

            <div class="space-y-4">
                <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['class' => 'space-y-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'space-y-2']); ?>
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">О нас</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Наша цель - помочь людям найти работу своей мечты и работодателям - найти лучших специалистов.
                        Мы
                        предлагаем широкий выбор вакансий в различных отраслях и регионах.
                    </p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['class' => 'space-y-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'space-y-2']); ?>
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Преимущества</h2>
                    <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                        <li>Широкий выбор вакансий</li>
                        <li>Удобный интерфейс для поиска и фильтрации</li>
                        <li>Возможность загрузки резюме и откликов на вакансии</li>
                        <li>Поддержка пользователей через чат и электронную почту</li>
                    </ul>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['class' => 'space-y-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'space-y-2']); ?>
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Как пользоваться сайтом</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Чтобы начать, достаточно просто <?php if (isset($component)) { $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $attributes; } ?>
<?php $component = App\View\Components\Link::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Link::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('register'))]); ?>зарегистрироваться <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $attributes = $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $component = $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?> на нашем
                        сайте, загрузить резюме и
                        начать <?php if (isset($component)) { $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $attributes; } ?>
<?php $component = App\View\Components\Link::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Link::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('vacancies.index'))]); ?>поиск <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $attributes = $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $component = $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?> интересующей вас вакансии. Вы можете фильтровать
                        их по различным критериям,
                        таким как
                        зарплата, график и опыт
                        работы.
                    </p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>

                <?php if(count($reviews) > 0): ?>
                    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['class' => 'space-y-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'space-y-2']); ?>
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Огромное колличесвто
                            работодателей уже с нами</h2>
                        <div>
                            <p class="text-gray-600 dark:text-gray-400">
                                И уже есть отзывы о них
                            </p>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>

                    <div class="swiper-container">
                        <div class="swiper-wrapper" data-swiper-virtual>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['class' => 'space-y-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'space-y-2']); ?>
                                        <div>
                                            <?php if($review->anonymity): ?>
                                                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-400">
                                                    Предпочет
                                                    остаться анонимным</h3>
                                                <p class="text-gray-600 dark:text-gray-400">
                                                    Посвятил отзыв касаемо опыта работы на
                                                    <?php if (isset($component)) { $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $attributes; } ?>
<?php $component = App\View\Components\Link::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Link::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('users.show', $review->user->id)).'']); ?><?php echo e($review->user->name); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $attributes = $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $component = $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
                                                </p>
                                            <?php else: ?>
                                                <?php if (isset($component)) { $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $attributes; } ?>
<?php $component = App\View\Components\Link::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Link::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('users.show', $review->author->id)).'']); ?>
                                                    <h3 class="text-lg font-semibold"><?php echo e($review->author->name); ?></h3>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $attributes = $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $component = $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
                                                <p class="text-gray-600 dark:text-gray-400">
                                                    Посвятил отзыв касаемо опыта работы на
                                                    <?php if (isset($component)) { $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97 = $attributes; } ?>
<?php $component = App\View\Components\Link::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Link::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('users.show', $review->user->id)).'']); ?><?php echo e($review->user->name); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $attributes = $__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__attributesOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97)): ?>
<?php $component = $__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97; ?>
<?php unset($__componentOriginal6768a8abc6dec1bd6c8b1a9d996e6c97); ?>
<?php endif; ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <div x-data="{ open: false }">
                                            <p class="text-gray-600 dark:text-gray-400">
                                                <?php if(strlen($review->value) <= 100): ?>
                                                    <?php echo e($review->value); ?>

                                                <?php else: ?>
                                                    <span
                                                        x-show="!open"><?php echo e(Str::limit($review->value, 100, '...')); ?></span>
                                                    <span x-show="open"><?php echo e($review->value); ?></span>
                                                <?php endif; ?>
                                            </p>
                                            <?php if(strlen($review->value) > 100): ?>
                                                <button @click="open = !open"
                                                    class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                                                    <span x-show="!open">Еще...</span>
                                                    <span x-show="open">Скрыть</span>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b)): ?>
<?php $attributes = $__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b; ?>
<?php unset($__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b)): ?>
<?php $component = $__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b; ?>
<?php unset($__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b); ?>
<?php endif; ?>
<?php /**PATH /home/fereline/example-app/resources/views/home.blade.php ENDPATH**/ ?>