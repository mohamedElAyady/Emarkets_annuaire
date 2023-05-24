@extends('layouts.layout')

@section('content')
<x-form-section submit="updateProfileInformation" style="background-color: white">
    <x-slot name="title">
        {{ __('Informations sur le profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettez à jour les informations de profil et l\'adresse e-mail de votre compte.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->nom }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label name="nom"  for="nom" value="{{ __('Nom') }}" />
            <x-input id="nom" name="nom" type="text" class="mt-1 block w-full" wire:model.defer="state.nom" autocomplete="nom" />
            <x-input-error name="nom" for="nom" class="mt-2" />
        </div>

         <!-- Prenom -->
         <div class="col-span-6 sm:col-span-4">
            <x-label name="prenom"  for="prenom" value="{{ __('Prenom') }}" />
            <x-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" wire:model.defer="state.prenom" autocomplete="prenom" />
            <x-input-error name="prenom" for="prenom" class="mt-2" />
        </div>

        <!-- Ville -->
        <div class="col-span-6 sm:col-span-4">
            <x-label name="ville"  for="ville" value="{{ __('Ville') }}" />
            <x-input id="ville" name="ville" type="text" class="mt-1 block w-full" wire:model.defer="state.ville" autocomplete="ville" />
            <x-input-error name="ville" for="ville" class="mt-2" />
        </div>

        <!-- Telephone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label name="telephone"  for="telephone" value="{{ __('Télephone') }}" />
            <x-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" wire:model.defer="state.telephone" autocomplete="telephone" />
            <x-input-error name="telephone" for="telephone" class="mt-2" />
        </div>

         <!-- Ziip -->
         <div class="col-span-6 sm:col-span-4">
            <x-label name="zip"  for="zip" value="{{ __('Zip') }}" />
            <x-input id="zip" name="zip" type="text" class="mt-1 block w-full" wire:model.defer="state.zip" autocomplete="zip" />
            <x-input-error name="zip" for="zip" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Enregistré.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Sauvegarder') }}
        </x-button>
    </x-slot>
</x-form-section>
