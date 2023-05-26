<x-authentication-card>
    <x-slot name="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/annuaire/img/logo.png') }}" alt="Logo">
        </a>
    </x-slot>

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Rest of your form code -->

    </form>
</x-authentication-card>
