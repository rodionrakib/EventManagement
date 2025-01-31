<?php require basePath("views/partials/header.php") ?>
<?php  require basePath("views/partials/nav.view.php")?>
<?php require basePath("views/partials/banner.view.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-white">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Attendees</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all of the event </p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <form method="post"  >
                        <button  type="submit" class=" cursor-pointer inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Download</button>
                        <input type="hidden" name="event-id" value="<?= $eventId ?>" >
                    </form>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>

                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>


                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Email
                                    </th>


                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                <?php  foreach ($attendees as $attendee) : ?>
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?= $attendee['name'] ?></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $attendee['email'] ?></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $attendee['phone'] ?></td>
                                     </tr>
                                <?php endforeach; ?>


                                <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require basePath("views/partials/footer.php") ?>
