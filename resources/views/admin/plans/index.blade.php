<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Plans') }}
                </h2>
            </div>
            <div class="flex items-center justify-end col-md-6">
                <a href="{{ route('plans.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4"> {{ __('Create Plan') }}</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Event Limit</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                <th scope="row"> {{ $plan->id }} </th>
                                <td>{{ $plan->name }}</td>
                                <td>{{ $plan->price }}</td>
                                <td>{{ $plan->event_limit }}</td>
                                <td><a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-warning" style="margin-bottom: 10px">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
