<div>
    @if( $submitted )
        <div class="border-2 bg-green-100 border-green-300 text-green-800 p-8 text-center">
            THANK YOU FOR YOUR  MESSAGE
        </div>
    @else
        <form wire:submit="create" class="not-prose" disabled>
            <x-honeypot livewire-model="extraFields" />

{{--            {{ $this->form }}--}}

            <div class="space-y-4">
                <div>
                    <label for="data.name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <input type="text" wire:model="data.name" class="mt-2 w-full">
                    @if($errors->has('data.name'))
                        <p class="mt-2 text-sm text-red-600" id="name-error">{{ $errors->first('data.name') }}</p>
                        @enderror
                </div>
                <div>
                    <label for="data.email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <input type="email" wire:model="data.email" class="mt-2 w-full">
                    @if($errors->has('data.email'))
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $errors->first('data.email') }}</p>
                        @enderror
                </div>
                <div>
                    <label for="data.telephone" class="block text-sm font-medium leading-6 text-gray-900">Telephone</label>
                    <input type="tel" wire:model="data.telephone" class="mt-2 w-full">
                    @if($errors->has('data.telephone'))
                        <p class="mt-2 text-sm text-red-600" id="telephone-error">{{ $errors->first('data.telephone') }}</p>
                        @enderror
                </div>
                <div>
                    <label for="data.subject" class="block text-sm font-medium leading-6 text-gray-900">Subject</label>
                    <input type="text" wire:model="data.subject" class="mt-2 w-full">
                    @if($errors->has('data.subject'))
                        <p class="mt-2 text-sm text-red-600" id="subject-error">{{ $errors->first('data.subject') }}</p>
                        @enderror
                </div>
                <div>
                    <label for="data.message" class="block text-sm font-medium leading-6 text-gray-900">Message</label>
                    <textarea rows="5" wire:model="data.message" class="mt-2 w-full"></textarea>
                    @if($errors->has('data.message'))
                        <p class="mt-2 text-sm text-red-600" id="message-error">{{ $errors->first('data.message') }}</p>
                        @enderror
                </div>
                <div>
                    <label for="data.quiz" class="block text-sm font-medium leading-6 text-gray-900">{{ $question }}</label>
                    <input type="text" wire:model="data.quiz" class="mt-2 w-full">
                    @if($errors->has('data.quiz'))
                        <p class="mt-2 text-sm text-red-600" id="quiz-error">{{ $errors->first('data.quiz') }}</p>
                    @enderror
                </div>
                <x-cms::button type="submit" label="Submit"/>
            </div>

        </form>
        <x-filament-actions::modals />
    @endif
</div>
