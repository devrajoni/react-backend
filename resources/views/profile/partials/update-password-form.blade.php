<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="row">
            <x-ui.input
                group="col-md-12"
                :label="__('Current Password')"
                type="password"
                name="current_password"
                id="current_password"
            />
        </div>
        <div class="row pt-6">
            <x-ui.input
                group="col-md-12"
                :label="__('New Password')"
                type="password"
                name="password"
                id="password"
            />
        </div>
        <div class="row pt-6">
            <x-ui.input
                group="col-md-12"
                :label="__('Confirm Password')"
                type="password"
                name="password_confirmation"
                id="password_confirmation"
            />
        </div>

        <div class="flex items-center gap-4 mt-3">
            <x-primary-button>{{ 'Save' }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
