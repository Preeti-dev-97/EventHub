<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: right">
                <a href="{{ route('events.upload') }}">{{ __('Upload CSV') }}</a>
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: right">
                <a href="{{ route('events.create') }}">{{ __('Create') }}</a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Country</th>
                            <th scope="col">Date</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Price</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <th scope="row"> {{ $event->id }} </th>
                                <td>{{ $event->title }}</td>
                                <td>{{ Str::limit($event->description, 10) }}</td>
                                <td>{{ $event->address }}</td>
                                <td>{{ $event->city }}</td>
                                <td>{{ $event->state }}</td>
                                <td>{{ $event->country }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->start }}</td>
                                <td>{{ $event->end }}</td>
                                <td>{{ $event->price }}</td>
                                <td>{{ $event->capacity }}</td>
                                <td>{{ $event->status }}</td>
                                <td>{{ $event->contact_number }}</td>
                                <td> Edit Delete </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
