<x-layout.layout>
    <form action="{{ route('profile.update', $user) }}"
          method="POST"
          enctype="multipart/form-data"
    >
        @csrf
        @method('PATCH')

        <x-forms.input name="name" required :value="old('name', $user->name)"/>
        <x-forms.input name="username" required :value="old('username', $user->username)"/>
        <x-forms.input name="email" type="email" required :value="old('email', $user->email)"/>
        <x-forms.input name="avatar" type="file"/>
        <x-forms.input name="banner" type="file"/>

        <label for="description"></label>
        <textarea
            name="description"
            id="description"
            placeholder="Your description"
            maxlength="50"
            class="w-full p-3 rounded px-4 w-full py-2 bg-gray-50 border border-gray-200 text-gray-700 focus:bg-white focus:outline-none"
        >{{ old('description', $user->description) }}</textarea>

        <hr class="mt-5"/>

        <x-forms.input name="password" type="password" required/>
        <x-forms.input name="password_confirmation" type="password" required/>

        <x-forms.submit>Update</x-forms.submit>

    </form>
</x-layout.layout>
