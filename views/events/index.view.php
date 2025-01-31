<?php require basePath("views/partials/header.php") ?>
<?php  require basePath("views/partials/nav.view.php")?>
<?php require basePath("views/partials/banner.view.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-white">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Events</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all of my  events </p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <a href="/events/create" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add events</a>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        <a href="/dashboard?order-by=title&type=<?php echo getOrderByType() ?>" class="flex" > <span>Title</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>

                                        </a>
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"><a href="/dashboard?order-by=max_capacity&type=<?php echo getOrderByType() ?>" class="flex" >
                                            <span>Max Capacity</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>

                                        </a>
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Registered</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        <a href="/dashboard?order-by=start_at&type=<?php echo getOrderByType() ?>" class="flex" >
                                            START at
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        </a>

                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    </th>


                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                <?php  foreach ($events as $event) : ?>
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?= $event['title'] ?></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $event['max_capacity'] ?></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $event['attendee_count'] ?></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $event['start_at'] ?></td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="/dashboard/attendees?event-id=<?= $event['id']?>" class="text-indigo-600 hover:text-indigo-900">Attendees</a>
                                        </td>
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
