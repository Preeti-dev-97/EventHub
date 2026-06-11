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
                    <div class="container px-4 text-center">
                        <div class="row gx-5">
                            <div class="col" style="border: 1px solid black">
                                <div class="p-3">
                                    <img src="{{ Storage::disk('s3')->url($event->banner) }}"alt="...">
                                </div>
                            </div>
                            <div class="col" style="border: 1px solid black">
                                <div class="p-3">{{ $event->title }}</div>
                                <div class="p-3">{{ $event->description }}</div>
                                <div class="p-3">{{ $event->price }}</div>
                                <div class="p-3"><a href="{{ route('bookEvent', $event->id) }}"><button class="btn btn-primary">Book Now</button></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
