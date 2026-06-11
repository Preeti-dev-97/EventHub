<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form method="GET">
        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
        <input type="text" name="address" placeholder="Address" value="{{ request('address') }}">
        <input type="text" name="city" placeholder="City" value="{{ request('city') }}">
        <input type="text" name="state" placeholder="State" value="{{ request('state') }}">
        <input type="text" name="country" placeholder="Country" value="{{ request('country') }}">
        <input type="date" name="date" value="{{ request('date') }}">
        <input type="number" name="min_price" placeholder="Min" value="{{ request('min_price') }}">
        <input type="number" name="max_price" placeholder="Max" value="{{ request('max_price') }}">
        <button>
            Filter
        </button>
    </form>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        @foreach ($events as $event)
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                    <img src="{{ Storage::disk('s3')->url($event->banner) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event->title }}</h5>
                                        <p class="card-text">{{ $event->description }}</p>
                                        <a href="{{ route('eventShow', $event->id) }}" class="btn btn-primary">View
                                            details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{$events->links()}}
</x-app-layout>
