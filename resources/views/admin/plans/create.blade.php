<x-app-layout>
    <x-slot name="header">
       <div class="row">
            <div class="col-md-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create an Plan') }}
                </h2>
            </div>
            <div class="flex items-center justify-end col-md-6">
                <a href="{{ route('plans.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4"> {{ __('Back') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('plans.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-2 w-full" type="text" name="name"
                                    required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="col-md-6">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-2 w-full" type="number" name="price"
                                    required autofocus autocomplete="price" />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <div class="col-md-6 mt-2">
                                <x-input-label for="event_limit" :value="__('Event Limit')" />
                                <x-text-input id="event_limit" class="block mt-2 w-full" type="number" name="event_limit"
                                    required autofocus autocomplete="event_limit" />
                                <x-input-error :messages="$errors->get('event_limit')" class="mt-2" />
                            </div>

                            <div class="col-md-6 mt-2">
                                <x-input-label for="stripe_price_id" :value="__('Stripe Price Id')" />
                                <x-text-input id="stripe_price_id" class="block mt-2 w-full" type="text" name="stripe_price_id"
                                    required autofocus autocomplete="stripe_price_id" />
                                <x-input-error :messages="$errors->get('stripe_price_id')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Create Plan') }}
                            </x-primary-button>
                        
                            <a href="{{ route('plans.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
