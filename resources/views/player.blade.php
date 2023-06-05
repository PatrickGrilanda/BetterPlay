<x-layout>
    <x-header />

    <section class="relative w-full h-screen bg-black">
        <div class="absolute z-10 w-full h-full">
            <div class="flex items-center justify-start h-full px-16">
                <div class="flex-col hidden w-full py-12 space-y-4 lg:flex">
                    <video controls>
                        <source src="{{ Storage::url($video->path_media) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 w-full h-64 bg-gradient-to-t from-black"></div>

    </section>




    <x-footer />
</x-layout>