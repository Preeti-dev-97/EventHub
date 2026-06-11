<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @error('tickets')
                        <div style="color: red; font-weight: bold">
                            {{ $message }}
                        </div>
                    @enderror
                    <form action="{{ route('checkout', $event->id) }}" method="POST">
                        @csrf
                        <input type="number" name="tickets" min="1" value="1">
                        <button class="btn btn-primary">
                            Book Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
