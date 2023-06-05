@props(['movies'])

<div class="">
    <div class="mb-4 text-lg antialiased font-bold tracking-wider text-gray-200">
        {{ $category }}
    </div>


    <div class="carousel" data-flickity='{ "freeScroll": true, "wrapAround": true }' class="flex carousel flex-nowrap">
        @foreach ($movies as $movie)
        <div @click="open = true" class="flex flex-col mr-3 overflow-hidden rounded-md" style="background-color:  #181818">

            <div @click="open = true" class="w-72">
                <a href="#">
                    <img class="w-full h-56 cursor-pointer" src="{{ Storage::url($movie->path_banner)  }}" alt="poster">
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>