<?php if (isset($_SESSION['success'])): ?>
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4 shadow text-center w-full max-w-3xl mx-auto">
        <?= $_SESSION['success'] ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<div class="flex flex-col text-center items-center my-10">
    <h2 class="text-5xl font-bold">Qué hacer esta semana</h2>
    <hr class="my-6 border-t w-[60%] border-gray-300">
</div>

<?php include __DIR__ . '/components/filter.php'; ?>

<div class="flex flex-wrap justify-center gap-6 px-4 mb-10">
    <?php foreach ($events as $index => $event): ?>
        <?php include __DIR__ . '/components/card.php'; ?>
    <?php endforeach; ?>
</div>

<?php if ($totalPages > 1): ?>
    <div class="flex justify-center mt-8 gap-2">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="index.php?page=<?= $i ?>" class="px-3 py-1 rounded <?= $i == $page ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800 hover:bg-gray-300' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>
<?php endif; ?>