<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                required autofocus autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="city" :value="__('City')" />
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                required autofocus autocomplete="city" />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                         <div>
                            <x-input-label for="state" :value="__('State')" />
                            <x-text-input id="state" class="block mt-1 w-full" type="text" name="state"
                                required autofocus autocomplete="state" />
                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                        </div>

                         <div>
                            <x-input-label for="country" :value="__('Country')" />
                            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                                required autofocus autocomplete="country" />
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"
                                required autofocus autocomplete="date" />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                         <div>
                            <x-input-label for="start" :value="__('Start')" />
                            <x-text-input id="start" class="block mt-1 w-full" type="time" name="start"
                                required autofocus autocomplete="start" />
                            <x-input-error :messages="$errors->get('start')" class="mt-2" />
                        </div>

                         <div>
                            <x-input-label for="end" :value="__('End')" />
                            <x-text-input id="end" class="block mt-1 w-full" type="time" name="end"
                                required autofocus autocomplete="end" />
                            <x-input-error :messages="$errors->get('end')" class="mt-2" />
                        </div>

                         <div>
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                                required autofocus autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                         <div>
                            <x-input-label for="capacity" :value="__('Capacity')" />
                            <x-text-input id="capacity" class="block mt-1 w-full" type="number" name="capacity"
                                required autofocus autocomplete="capacity" />
                            <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="contact_number" :value="__('Contact Number')" />
                            <x-text-input id="contact_number" class="block mt-1 w-full" type="number" name="contact_number"
                                required autofocus autocomplete="contact_number" />
                            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                required autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="banner" :value="__('Banner')" />
                            <x-text-input id="banner" class="block mt-1 w-full" type="file" name="banner"
                                required autofocus autocomplete="banner" />
                            <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Create Event') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
