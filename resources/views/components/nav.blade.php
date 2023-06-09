@props(['popular'])

<section class="relative w-full h-screen bg-black">
    <div class="absolute z-10 w-full h-full">
        <div class="flex items-center justify-start h-full px-16">
            <div class="flex-col hidden w-2/5 py-12 space-y-4 lg:flex">
                <h1 class="text-6xl font-semibold text-yellow-300">
                    {{ $popular->title }}
                </h1>
                <div class="flex text-yellow-300 text-xl gap-x-3 ">
                @foreach ($popular->categories as $category)
                    <div class="border-1">
                       <p> {{$category->name}} </p>
                    </div>
                @endforeach
            </div>
                <p class="text-lg font-semibold text-white">
                    {{ $popular->description }}
                </p>
                <div class="flex flex-row w-full space-x-4">
                    <a href="{{route('video.play', $popular->id)}}" class="flex items-center justify-center px-2 py-2 mt-5 space-x-2 bg-white rounded shadow-md bg-gradient w-28">
                        <x-bi-caret-right-fill class="w-6 h-6" />
                        <span class="font-semibold text-gray-800">Play</span>
                    </a>
                    <button class="flex items-center justify-center px-3 py-2 mt-5 space-x-2 font-semibold bg-gray-500 bg-opacity-50 rounded-lg shadow-md w-36">
                        <x-bi-info-circle class="w-5 h-5 font-bold text-white" />
                        <span class="font-semibold text-white">More Info</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 w-full h-64 bg-gradient-to-t from-black"></div>

    <div class="object-cover -mt-8 lg:h-screen">
        <img class="object-contain w-screen h-screen" src="{{ Storage::url($popular->path_banner)}}">
    </div>
</section>
