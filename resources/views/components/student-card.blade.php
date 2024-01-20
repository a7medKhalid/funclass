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
        <div class="flex justify-between items-center p-2">
            @if($classroom->weekKing())
                @if($student->id === $classroom->weekKing()->id)
                    <svg width="48" height="48"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(240,187,64,1)"><path d="M2.00488 19H22.0049V21H2.00488V19ZM2.00488 5L7.00488 8.5L12.0049 2L17.0049 8.5L22.0049 5V17H2.00488V5ZM4.00488 8.84131V15H20.0049V8.84131L16.5854 11.2349L12.0049 5.28024L7.42435 11.2349L4.00488 8.84131Z"></path></svg>
                @endif
            @endif


        </div>


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
