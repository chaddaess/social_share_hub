<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerCqYfIDS\App_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerCqYfIDS/App_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerCqYfIDS.legacy');

    return;
}

if (!\class_exists(App_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerCqYfIDS\App_KernelTestDebugContainer::class, App_KernelTestDebugContainer::class, false);
}

return new \ContainerCqYfIDS\App_KernelTestDebugContainer([
    'container.build_hash' => 'CqYfIDS',
    'container.build_id' => 'd16c225d',
    'container.build_time' => 1690367698,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerCqYfIDS');
