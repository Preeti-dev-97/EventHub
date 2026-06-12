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

                    <form method="GET">
                        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
                        <input type="text" name="address" placeholder="Address" value="{{ request('address') }}">
                        <input type="text" name="city" placeholder="City" value="{{ request('city') }}">
                        <input type="text" name="state" placeholder="State" value="{{ request('state') }}">
                        <input type="text" name="country" placeholder="Country" value="{{ request('country') }}">
                        <input type="date" name="date" value="{{ request('date') }}">
                        <input type="number" name="min_price" placeholder="Min" value="{{ request('min_price') }}">
                        <input type="number" name="max_price" placeholder="Max" value="{{ request('max_price') }}">
                        <button class="btn btn-primary">
                            Filter
                        </button>
                    </form>

                    <div class="row" style="margin-top: 10px">
                        @forelse ($events as $event)
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="card">
                                    <img src="{{ $event->banner ? Storage::disk('s3')->temporaryUrl($event->banner, now()->addMinutes(30)) : asset('storage/default_banner.jpg') }}"
                                        class="card-img-top" alt="{{ $event->title }}"
                                        style="height: 300px !important">
                                    <div class="card-body">
                                        <h3 class="card-title"><b>{{ $event->title }}</b></h3>
                                        <p class="card-text">{{ Str::limit($event->description, 50) }}</p>
                                        <a href="{{ route('eventShow', $event->id) }}" class="btn btn-primary">View
                                            details</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No events found...
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $events->links() }}
</x-app-layout>
