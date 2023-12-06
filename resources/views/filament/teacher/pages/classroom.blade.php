<x-filament-panels::page>
    <div class="mx-4 mb-4 px-4">
        <div class="w-full bg-gray-200 rounded-full h-3  dark:bg-gray-700">
            <div class="bg-primary-500 h-3 rounded-full" style="width: {{ ($classroom->points / 100) * 100 }}%"></div>
        </div>
    </div>
    <div class="grid grid-cols-7 gap-4">
        @foreach($students as $student)

                <div class="bg-white rounded-xl shadow-md">
                    <!-- Card Header -->
                    <div class="p-4 border-b">
                        <div class="text-center font-semibold text-xl text-gray-800">
                            {{ $student->name }}
                        </div>
                    </div>
                    <!-- Card Image -->
                    <div class="flex justify-center p-4">
                        <div class="rounded-full p-4 ">
                            <!-- Placeholder for the creature image -->
                            <div class="h-24 w-24 flex items-center justify-center">
                                <img class="w-11" src="https://api.dicebear.com/7.x/pixel-art/svg?seed={{$student->name}}" alt="{{ $student->name }}">
                            </div>
                        </div>
                    </div>
                    <!-- Progress Bar -->
                    <div class="mx-4 mb-4 px-4">
                        <div class="w-full bg-gray-200 rounded-full h-3  dark:bg-gray-700">
                            <div class="bg-primary-500 h-3 rounded-full" style="width: {{ ($student->points / 100) * 100 }}%"></div>
                        </div>
                    </div>
                    <!-- Card Footer -->
                    <div class="flex justify-between items-center p-4">
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
        @endforeach

    </div>

</x-filament-panels::page>
