<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Book Event') }}
                </h2>
            </div>
            <div class="flex items-center justify-end col-md-6">
                <a href="{{ route('eventsList') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4"> {{ __('Back') }}</a>
            </div>
        </div>
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
                        <button class="btn btn-success">
                             Book Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
