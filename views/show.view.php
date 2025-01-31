<?php require basePath("views/partials/header.php") ?>
<?php  require basePath("views/partials/nav.view.php")?>
<?php require basePath("views/partials/banner.view.php") ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden bg-white py-16">

            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-prose text-lg">
                    <?php if (isset($message)) : ?>
                        <h3 class="text-green-500 text-xl mt-2"><?= $message ?></h3>
                    <?php endif; ?>
                    <h1>
                        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl"><?= $event['title'] ?></span>
                    </h1>

                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        <?= $event['description'] ?>
                    </p>
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

                </div>
                <form class="space-y-6" action="/event/register" method="POST">
                    <div>
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name"   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        <?php if (isset($errors['name'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm/6 font-medium text-gray-900">Phone</label>
                        <div class="mt-2">
                            <input type="text" name="phone" id="phone"   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        <?php if (isset($errors['phone'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['phone'] ?></p>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="event_id" value="<?= $event['id'] ?>">

                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>

                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        <?php if (isset($errors['email'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full cursor-pointer justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Join in this event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php require basePath("views/partials/footer.php") ?>
