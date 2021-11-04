<x-layout.layout>
    <form action="{{ route('profile.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        <x-forms.input name="name" required :value="old('name', $user->name)"/>
        <x-forms.input name="username" required :value="old('username', $user->username)"/>
        <x-forms.input name="email" type="email" required :value="old('email', $user->email)"/>
        <x-forms.input name="password" type="password" required/>
        <x-forms.input name="password_confirmation" type="password" required/>
        <x-forms.submit>Update</x-forms.submit>

    </form>
</x-layout.layout>
