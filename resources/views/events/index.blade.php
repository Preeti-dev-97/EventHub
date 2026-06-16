<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Events') }}
                </h2>
            </div>
            <div class="flex items-center justify-end col-md-6">
                <a href="{{ route(Auth::user()->role .'.events.upload') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4"> {{ __('Upload CSV') }}</a>
                <a href="{{ route(Auth::user()->role .'.events.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4"> {{ __('Create Event') }}</a>
            </div>
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
                                <td><a href="{{ route(Auth::user()->role .'.events.edit', $event->id) }}" class="btn btn-warning" style="margin-bottom: 10px">Edit</a>
                                    @if(Auth::user()->role == 'admin')
                                        <a href="{{ route('events.editStatus', $event->id) }}" class="btn btn-primary" style="margin-bottom: 10px">Update Status</a>
                                    @endif
                                    <a href="{{ route(Auth::user()->role .'.events.delete', $event->id) }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
