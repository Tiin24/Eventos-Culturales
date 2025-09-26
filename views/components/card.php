<?php

/** @var Src\Models\Event $event */
?>
<div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02] border border-gray-100 overflow-hidden group max-w-sm">
    <!-- Image Section -->
    <div class="relative h-48 overflow-hidden">
        <img
            src="<?= htmlspecialchars($event->getImageUrl()) ?>"
            alt="Concierto de Jazz en el Palau de la Música"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
    </div>

    <!-- Content Section -->
    <div class="p-6">
        <!-- Header with Title and Actions -->
        <div class="flex items-start justify-between mb-4">
            <div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-yellow-500 transition-colors">
                    <?= htmlspecialchars($event->getTitle()) ?>
                </h3>
                <p class="text-sm text-gray-500 capitalize">
                    <?= htmlspecialchars($event->getCategory()->getName()) ?>
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                <button
                    class="btnOpenEditModal cursor-pointer"
                    data-id="<?= $event->getId() ?>"
                    data-title="<?= htmlspecialchars($event->getTitle()) ?>"
                    data-description="<?= htmlspecialchars($event->getDescription()) ?>"
                    data-date="<?= $event->getDate() ?>"
                    data-time="<?= $event->getTime() ?>"
                    data-place="<?= htmlspecialchars($event->getPlace()) ?>"
                    data-category="<?= $event->getCategory()->getId() ?>"
                    data-price="<?= $event->getPrice() ?>"
                    data-capacity="<?= $event->getCapacity() ?>"
                    data-tags="<?= htmlspecialchars(implode(',', $event->getTags())) ?>"
                    data-imageurl="<?= htmlspecialchars($event->getImageUrl()) ?>">
                    <!-- Edit Icon -->
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </button>

                <form method="POST" action="index.php?action=delete" class="delete-form">
                    <input type="hidden" name="id" value="<?= $event->getId() ?>">

                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors cursor-pointer">
                        <!-- Delete Icon -->
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                    </button>
                </form>

            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-600 mb-4 line-clamp-2">
            <?= htmlspecialchars($event->getDescription()) ?>
        </p>

        <!-- Event Details Grid -->
        <div class="grid grid-cols-2 gap-3 mb-4">
            <!-- Date -->
            <div class="flex items-center space-x-2 text-sm text-gray-500">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>

                <?= htmlspecialchars($event->getDate()) ?>
            </div>

            <!-- Time -->
            <div class="flex items-center space-x-2 text-sm text-gray-500">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <?= htmlspecialchars($event->getTime()) ?>
            </div>

            <!-- Location -->
            <div class="flex items-center space-x-2 text-sm text-gray-500">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="truncate"><?= htmlspecialchars($event->getPlace()) ?></span>
            </div>

            <!-- Capacity -->
            <div class="flex items-center space-x-2 text-sm text-gray-500">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
                <span><?= htmlspecialchars($event->getCapacity()) ?> plazas</span>
            </div>
        </div>

        <!-- Price and Tags -->
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <span class="text-2xl font-bold text-green-600">
                    <?= $event->getPrice() == 0 ? 'Gratis' : htmlspecialchars($event->getPrice()) . ' $' ?>
                </span>
            </div>

            <div class="flex items-center space-x-1">
                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                <span class="text-xs text-gray-400">
                    <?= implode(', ', $event->getTags()); ?>
                </span>
            </div>
        </div>
    </div>
</div>