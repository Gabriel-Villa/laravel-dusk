<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <span id="test"></span>
            </div>
        </div>
    </div>

    <button onclick="toggleModal()" id="openModalButton" class="bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4">
        Open Modal
    </button>

    <p id="post-close"></p>

    <div id="myModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-2xl font-bold mb-4">
                {{ Auth::user()->name }} - {{ auth()->id() }}
            </h2>
            <p class="mb-4">This is a sample modal.</p>
            <button id="closeModal" onclick="closeModal()" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                Close
            </button>
        </div>
    </div>


    <script>
        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');
        const modal = document.getElementById('myModal');

        function toggleModal() {
            modal.classList.toggle('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');

            document.getElementById('post-close').innerHTML = "cerrado";
        }

        setInterval(() => {
            document.getElementById('test').innerHTML = "Gabrielito";
        }, 2000);
    </script>
</x-app-layout>
