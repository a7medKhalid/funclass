<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <div class="bg-white rounded-xl shadow-md">
        <!-- Card Header -->
        <div class="p-4 border-b">
            <div class="text-center font-semibold text-xl text-gray-800">
                {{ $student->name }}
            </div>
        </div>

        <!-- Card Badges -->
        {{--                    <div class="flex justify-between items-center pt-4 ">--}}
        {{--                        <svg class="w-6" fill="black" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M31.908 26.249l-5.852-10.822c0.597-1.355 0.931-2.852 0.931-4.428 0-6.072-4.922-10.994-10.994-10.994-6.073 0-10.995 4.923-10.995 10.994 0 1.614 0.351 3.145 0.974 4.524l-5.878 10.721c-0.19 0.345-0.158 0.77 0.079 1.084 0.237 0.314 0.638 0.461 1.022 0.371l5.019-1.151 1.718 4.785c0.134 0.372 0.474 0.63 0.867 0.659 0.025 0.002 0.050 0.003 0.074 0.003 0.366 0 0.706-0.201 0.881-0.527l5.116-9.53c0.369 0.038 0.744 0.057 1.123 0.057 0.347 0 0.69-0.018 1.029-0.050l5.227 9.532c0.177 0.323 0.514 0.52 0.877 0.52 0.026 0 0.052-0.001 0.078-0.003 0.392-0.032 0.73-0.289 0.863-0.659l1.718-4.785 5.020 1.151c0.385 0.093 0.782-0.057 1.020-0.369s0.27-0.735 0.084-1.081zM9.056 28.542l-1.258-3.505c-0.172-0.477-0.671-0.754-1.165-0.637l-3.712 0.852 4.231-7.718c1.393 1.883 3.373 3.303 5.67 3.994zM7.007 10.999c0-4.955 4.032-8.986 8.986-8.986s8.985 4.031 8.985 8.986-4.031 8.986-8.986 8.986c-4.955 0-8.986-4.032-8.986-8.986zM25.367 24.4c-0.496-0.117-0.993 0.16-1.165 0.636l-1.267 3.53-3.849-7.017c2.357-0.691 4.386-2.148 5.797-4.085l4.214 7.791z"></path> </g></svg>--}}

        {{--                        <button wire:click="decreasePoints({{$student->id}})">--}}

        {{--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  fill="currentColor" class="bi bi-heartbreak-fill" viewBox="0 0 16 16">--}}
        {{--                                <path d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z"/>--}}
        {{--                            </svg>--}}
        {{--                        </button>--}}
        {{--                    </div>--}}

        <!-- Card Image -->
        <div class="flex justify-center p-4">
            <div class="rounded-full p-4 ">
                <!-- Placeholder for the creature image -->
                <div class="h-24 w-24 flex items-center justify-center ">
                    <img class="w-20 rounded-full" src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed={{ $student->name }}&eyes=happy&mouth=smile01" alt="{{ $student->name }}">
                </div>
            </div>
        </div>
        <!-- Progress Bar -->
        <div class="mx-4 mb-4 px-4">
            <div class="w-full bg-gray-200 rounded-full h-3  dark:bg-gray-700">
                <div class="bg-primary-500 h-3 rounded-full" style="width: {{ $student->levelProgress }}%"></div>
            </div>
            {{-- level badge --}}
            <div>
                <div class="text-center font-semibold text-sm text-gray-800">
                    {{ __('teacher.Level') . ' ' . $student->level }}
                </div>
            </div>
        </div>
        <!-- Card Footer -->
        <div class="flex justify-between items-center p-2">
            <button x-on:click="confettiIt" wire:click="increasePoints({{$student->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                </svg>
            </button>

            <button wire:click="decreasePoints({{$student->id}})">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  fill="currentColor" class="bi bi-heartbreak-fill" viewBox="0 0 16 16">
                    <path d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z"/>
                </svg>
            </button>
        </div>
    </div>

</div>
