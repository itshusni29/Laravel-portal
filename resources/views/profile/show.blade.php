<!-- resources/views/pages/new-page.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Konten halaman baru Anda di sini -->
    <h1>New Page Content</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="department">{{ __('Department') }}</label>
                            <input id="department" class="block mt-1 w-full" type="text" name="department" value="{{ $user->department }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="occupation">{{ __('Occupation') }}</label>
                            <input id="occupation" class="block mt-1 w-full" type="text" name="occupation" value="{{ $user->occupation }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Update Profile') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
