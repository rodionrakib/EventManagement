<?php require basePath("views/partials/header.php") ?>
<?php  require basePath("views/partials/nav.view.php")?>
<?php require basePath("views/partials/banner.view.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-white">
        <form method="post" action="/events/create" >
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <input type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="">
                                </div>
                            </div>
                            <?php if (isset($errors['title'])) : ?>
                                <li class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></li>
                            <?php endif; ?>
                        </div>

                        <div class="col-span-full">
                            <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea name="description" id="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                            </div>
                            <?php if (isset($errors['description'])) : ?>
                                <li class="text-red-500 text-xs mt-2"><?= $errors['description'] ?></li>
                            <?php endif; ?>
                        </div>
                        <div class="col-span-full">
                            <label for="address" class="block text-sm/6 font-medium text-gray-900">Address</label>
                            <div class="mt-2">
                                <input type="text" name="address" id="address" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="max-capacity" class="block text-sm/6 font-medium text-gray-900">Max capacity</label>
                            <div class="mt-2">
                                <input type="number" name="max-capacity" id="max-capacity" autocomplete="family-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            <?php if (isset($errors['max-capacity'])) : ?>
                                <li class="text-red-500 text-xs mt-2"><?= $errors['max-capacity'] ?></li>
                            <?php endif; ?>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="start-at" class="block text-sm/6 font-medium text-gray-900">Start at</label>
                            <div class="mt-2">
                                <input type="datetime-local" name="start-at" id="start-at" autocomplete="family-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            <?php if (isset($errors['start-at'])) : ?>
                                <li class="text-red-500 text-xs mt-2"><?= $errors['start-at'] ?></li>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 cursor-pointer text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>

    </div>
</main>
<?php require basePath("views/partials/footer.php") ?>
