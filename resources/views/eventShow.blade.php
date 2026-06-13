<x-app-layout>
    <x-slot name="header">
       <div class="row">
            <div class="col-md-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Event details') }}
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
                    <div class="container px-4">
                        <div class="row gx-5">
                            <div class="col">
                                <div class="p-3">
                                    <img src="{{ $event->thumbnail ? Storage::disk('s3')->temporaryUrl($event->thumbnail, now()->addMinutes(30)) : asset('storage/default_banner.jpg') }}"alt="{{ $event->title
                                     }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3"><b>{{ $event->title }}</b></div>
                                <div class="p-3">{{ $event->description }}</div>
                                <div class="p-3"><b>Address:</b> {{ $event->address($event) }}</div>
                                <div class="p-3"><b>Ticket Price:</b> ${{ $event->price }}</div>
                                <div class="p-3"><b>Event date:</b> {{ $event->date }}</div>
                                <div class="p-3"><b>Event time:</b> {{ $event->start . ' - ' . $event->end }}</div>
                                <div class="p-3"><b>Contact Number:</b> {{ $event->contact_number }}</div>
                                <div class="p-3"><b>Seats Left:</b> {{$event->remainingSeats()}}</div>
                                <div class="p-3">
                                    @if(!$event->soldOut())
                                        <a href="{{ route('bookEvent', $event->id) }}">
                                            <button class="btn btn-primary">Book Now</button>
                                        </a>
                                    @else
                                        <button class="btn btn-primary" disabled>Sold Out</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
