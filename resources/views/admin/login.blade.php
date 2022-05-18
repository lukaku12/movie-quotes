<x-layout>
    <x-wrapper>
        <x-form.wrapper>
            <form class="space-y-6" action="/login" method="POST">
                @csrf
                <x-form.input name="email" type="email" translatable="email"/>
                <x-form.input name="password" type="password"  translatable="password"/>
                <x-form.button name="sign_in"/>
            </form>
        </x-form.wrapper>
    </x-wrapper>
</x-layout>
