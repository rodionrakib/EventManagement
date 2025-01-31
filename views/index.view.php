<?php require basePath("views/partials/header.php") ?>
<?php  require basePath("views/partials/nav.view.php")?>
<?php require basePath("views/partials/banner.view.php") ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <?php  if ( isset($_SESSION['success'])) : ?>
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium"><?=  showFlash('success') ?></span>
            </div>
        <?php endif ?>
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php  foreach ($events as $event) : ?>
                <a  href="/event?id=<?= $event['id'] ?>" class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                    <div class="flex flex-1 flex-col p-8">
                        <h3 class="mt-6 text-base font-medium text-gray-900"><?= $event['title'] ?></h3>
                        <p class="mt-6 text-sm font-medium text-gray-600">
                            <?= substr($event['description'],0,200)."..."  ?>
                        </p>

                    </div>
                    <dl class="mt-1 flex flex-grow flex-col py-4">
                        <dt class="">Location</dt>
                        <dd class="text-sm text-gray-500"><?= $event['address'] ?></dd>
                        <dt class="">Start at</dt>
                        <dd class="mt-1 text-sm text-gray-500">
                            <?= $event['start_at'] ?>
                        </dd>
                        <dt class="">Max capacity</dt>
                        <dd class="mt-1 text-sm text-gray-500">
                            <?= $event['max_capacity'] ?>
                        </dd>
                        <dt class="">Already registered</dt>
                        <dd class="mt-1 text-sm text-gray-500">
                            <?= $event['attendee_count'] ?>
                        </dd>
                    </dl>

                </a>
            <?php  endforeach; ?>
        </ul>
    </div>
</main>
<?php require basePath("views/partials/footer.php") ?>
    