@props(['popular', 'trending', 'comedies', 'action', 'western', 'horror', 'thriller', 'animation'])

<div class="container px-4 mx-auto my-6 space-y-8">

    <!-- Trending Movies -->
    <x-movies :movies='$trending'>
        <x-slot:category> Trending on Better Play &rsaquo; </x-slot:category>
    </x-movies>
    <!-- End Trending Movies -->

    <!-- Comedies Movies -->
    <x-movies :movies='$comedies'>
        <x-slot:category> Comedies &rsaquo; </x-slot:category>
    </x-movies>
    <!-- End Comedies Movies -->

    <!-- Action Movies -->
    <x-movies :movies='$action'>
        <x-slot:category> Action &rsaquo; </x-slot:category>
    </x-movies>
    <!-- End Action Movies -->

    <!-- Western Movies -->
    <x-movies :movies='$western'>
        <x-slot:category> Western &rsaquo; </x-slot:category>
    </x-movies>
    <!-- End Wester Movies -->

    <!-- Horror Movies -->
    <x-movies :movies=$horror>
        <x-slot:category> Horror &rsaquo; </x-slot:category>
    </x-movies>
    <!-- End Horror Movies -->

    <!-- Animation Movies -->
    <x-movies :movies='$animation'>
        <x-slot:category> Animation &rsaquo; </x-slot:category>
    </x-movies>
    <!-- End Animation Movies -->
</div>