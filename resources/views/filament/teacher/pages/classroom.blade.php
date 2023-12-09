<x-filament-panels::page>


    <x-filament::modal id="student-level-up" >
        @if($modalModel)
        <!-- Card Header -->
        <div class="p-4 border-b">
            <div class="text-center font-semibold text-xl text-gray-800">
                {{ $modalModel->name }}
            </div>
        </div>

        <!-- Card Image -->
        <div class="flex justify-center p-4">
            <div class="rounded-full p-4 ">
                <!-- Placeholder for the creature image -->
                <div class="h-24 w-24 flex items-center justify-center">
                    <img class="w-20 rounded-full" src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed={{ $modalModel->name }}&eyes=happy&mouth=smile01" alt="{{ $modalModel->name }}">
                </div>
            </div>
        </div>

            <!-- Congratulations message -->
            <div class="text-center font-semibold text-xl text-gray-800">
                {{ __('teacher.CongratulationsLevelUpStudent') . ' ' . $modalModel->level . '!' }}
            </div>

        @endif
    </x-filament::modal>

    <x-filament::modal id="classroom-level-up" >
        @if($modalModel)
            <!-- Card Header -->
            <div class="p-4 border-b">
                <div class="text-center font-semibold text-xl text-gray-800">
                    {{ __('teacher.Classroom') . ' ' . $modalModel->name }}
                </div>
            </div>

            <!-- Card Image -->
            <div class="flex justify-center p-4">
                <div class="rounded-full p-4 ">
                    <!-- Placeholder for the creature image -->
                    <div class="h-24 w-24 flex items-center justify-center">
                        <svg height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.002 512.002" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#F09EA0;" d="M271.992,375.99L27.345,511.622c-3.161,1.752-8.283-2.96-6.798-6.255l114.85-255.065"></path> <path style="fill:#EF8990;" d="M249.373,355.176L34.548,474.274l-14.001,31.094c-1.484,3.297,3.636,8.008,6.799,6.255 L271.993,375.99L249.373,355.176z"></path> <ellipse transform="matrix(0.6771 -0.7359 0.7359 0.6771 -161.0841 252.6818)" style="fill:#59D3C4;" cx="207.387" cy="309.895" rx="40.387" ry="93.5"></ellipse> <path style="fill:#88E2E2;" d="M234.73,280.166c-37.998-34.964-81.046-50-96.15-33.585c-4.671,5.076-6.115,12.571-4.768,21.529 c20.053,2.145,47.666,16.588,73.038,39.934c26.248,24.151,43.211,51.489,46.22,71.5c9.978,1.067,18.093-0.895,23.112-6.35 C291.288,356.78,272.728,315.129,234.73,280.166z"></path> <g> <circle style="fill:#F9DE8F;" cx="138.504" cy="379.578" r="18.782"></circle> <path style="fill:#F9DE8F;" d="M67.305,445.452c10.373,0,18.782-8.409,18.782-18.782s-8.409-18.782-18.782-18.782 c-1.017,0-2.009,0.103-2.982,0.259l-12.866,28.573C54.789,441.963,60.633,445.452,67.305,445.452z"></path> </g> <path style="fill:#F09EA0;" d="M276.14,195.076c-2.976,0-5.885-1.492-7.572-4.206c-2.595-4.178-1.312-9.668,2.865-12.262 c13.482-8.375,31.86-23.705,42.852-49.18c5.723-13.265,8.638-27.46,8.663-42.19c0.008-4.912,3.992-8.888,8.904-8.888 c0.005,0,0.009,0,0.015,0c4.917,0.008,8.896,4.001,8.888,8.919c-0.027,17.159-3.433,33.717-10.118,49.215 c-12.82,29.709-34.16,47.532-49.805,57.251C279.368,194.643,277.744,195.076,276.14,195.076z"></path> <g> <path style="fill:#F9DE8F;" d="M283.649,272.084c-0.797,0-1.606-0.108-2.41-0.334c-4.734-1.327-7.494-6.243-6.166-10.977 c9.902-35.291,26.337-59.243,48.847-71.194c14.197-7.54,26.912-8.403,39.209-9.24c11.42-0.775,22.208-1.509,35.216-7.307 c18.331-8.17,33.787-23.325,45.939-45.047c2.399-4.289,7.822-5.822,12.117-3.424c4.29,2.4,5.823,7.827,3.423,12.118 c-14.068,25.147-32.314,42.85-54.231,52.618c-15.896,7.085-29.369,8-41.257,8.809c-11.388,0.774-21.224,1.444-32.067,7.2 c-18.042,9.578-31.519,29.858-40.054,60.277C291.113,269.512,287.54,272.084,283.649,272.084z"></path> <path style="fill:#F9DE8F;" d="M190.114,219.972c0.329,0.725,0.761,1.419,1.299,2.057c3.163,3.766,8.779,4.251,12.543,1.087 c28.06-23.581,43.098-48.435,44.695-73.872c1.009-16.043-3.451-27.982-7.763-39.528c-4.005-10.723-7.789-20.852-7.875-35.094 c-0.122-20.069,7.306-40.402,22.078-60.434c2.917-3.956,2.076-9.527-1.882-12.451c-3.958-2.918-9.532-2.075-12.451,1.883 c-17.102,23.19-25.698,47.115-25.552,71.11c0.106,17.402,4.83,30.054,9,41.215c3.994,10.693,7.442,19.929,6.673,32.181 c-1.28,20.387-14.192,41.03-38.379,61.357C189.374,212.112,188.509,216.428,190.114,219.972z"></path> </g> <path style="fill:#F09EA0;" d="M417.858,315.683c-3.913,0-7.756-0.412-11.526-1.235c-10.938-2.387-17.783-7.566-23.824-12.134 c-3.885-2.939-7.556-5.715-12.33-7.839c-15.078-6.704-35.532-4.001-60.791,8.042c-4.442,2.113-9.754,0.232-11.869-4.206 c-2.115-4.439-0.233-9.752,4.206-11.869c30.172-14.382,55.638-17.154,75.691-8.236c6.646,2.955,11.527,6.648,15.835,9.905 c5.456,4.128,9.765,7.386,16.88,8.939c11.36,2.479,24.31-0.719,38.483-9.51c4.178-2.592,9.668-1.307,12.258,2.873 c2.593,4.179,1.307,9.668-2.873,12.258C444.044,311.329,430.59,315.683,417.858,315.683z"></path> <g> <path style="fill:#88E2E2;" d="M421.163,245.37c-1.962,0-3.937-0.645-5.583-1.973c-3.829-3.088-4.428-8.692-1.341-12.52 c8.289-10.279,18.851-18.758,30.542-24.518c8.442-4.16,17.477-6.964,26.854-8.335c4.871-0.709,9.387,2.654,10.099,7.521 s-2.656,9.387-7.521,10.099c-7.537,1.103-14.791,3.352-21.561,6.69c-9.386,4.625-17.876,11.445-24.552,19.723 C426.34,244.236,423.764,245.37,421.163,245.37z"></path> <path style="fill:#88E2E2;" d="M367.85,250.656c-5.187,0-9.397-4.211-9.397-9.397s4.21-9.397,9.397-9.397 c5.187,0,9.397,4.211,9.397,9.397C377.246,246.446,373.037,250.656,367.85,250.656z"></path> </g> <path style="fill:#F09EA0;" d="M388.829,122.001c-5.187,0-9.397-4.211-9.397-9.397s4.21-9.397,9.397-9.397 c5.187,0,9.397,4.211,9.397,9.397C398.227,117.79,394.016,122.001,388.829,122.001z"></path> <g> <path style="fill:#88E2E2;" d="M313.389,26.84c-5.187,0-9.397-4.211-9.397-9.397s4.21-9.397,9.397-9.397 c5.187,0,9.397,4.211,9.397,9.397S318.576,26.84,313.389,26.84z"></path> <path style="fill:#88E2E2;" d="M478.668,90.072c-5.187,0-9.397-4.211-9.397-9.397s4.21-9.397,9.397-9.397 c5.187,0,9.397,4.211,9.397,9.397C488.066,85.861,483.856,90.072,478.668,90.072z"></path> </g> <path style="fill:#F9DE8F;" d="M417.315,45.633c-5.187,0-9.397-4.211-9.397-9.397s4.21-9.397,9.397-9.397 c5.187,0,9.397,4.211,9.397,9.397S422.501,45.633,417.315,45.633z"></path> <path style="fill:#F09EA0;" d="M276.132,80.674c-5.187,0-9.397-4.211-9.397-9.397s4.21-9.397,9.397-9.397 c5.188,0,9.397,4.211,9.397,9.397C285.529,76.463,281.32,80.674,276.132,80.674z"></path> <g> <path style="fill:#F9DE8F;" d="M482.321,269.097c-5.187,0-9.397-4.211-9.397-9.397s4.21-9.397,9.397-9.397 c5.187,0,9.397,4.211,9.397,9.397C491.717,264.886,487.508,269.097,482.321,269.097z"></path> <path style="fill:#F9DE8F;" d="M189.325,158.283c-5.187,0-9.397-4.211-9.397-9.397c0-5.187,4.21-9.397,9.397-9.397 c5.188,0,9.397,4.211,9.397,9.397C198.722,154.073,194.511,158.283,189.325,158.283z"></path> </g> </g></svg>                    </div>
                </div>
            </div>

            <!-- Congratulations message -->
            <div class="text-center font-semibold text-xl text-gray-800">
                {{ __('teacher.CongratulationsLevelUpClassroom') . ' ' . $modalModel->level . '!' }}
            </div>

        @endif
    </x-filament::modal>


    <div class="mb-4 px-4">
        <div class="p-4 border-b">
            <div class="text-center font-semibold text-xl text-gray-800">
                {{ __('teacher.Classroom') . ' ' . $classroom->name }}
            </div>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3  dark:bg-gray-700">
            <div class="bg-primary-500 h-3 rounded-full" style="width: {{ $classroom->levelProgress }}%"></div>
            <div class="text-center font-semibold text-sm text-gray-800">
                {{ __('teacher.Level') . ' ' . $classroom->level }}
            </div>
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
        @endforeach

    </div>

</x-filament-panels::page>
