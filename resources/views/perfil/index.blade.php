@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store', auth()->user()) }}" method="POST" class="mt-10 md:mt-0"
                enctype="multipart/form-data">
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center mt-3">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de Usuario"
                        value="{{ auth()->user()->username }}"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" />

                    @error('username')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center mt-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" type="email" placeholder="Tu email de registro"
                        value="{{ auth()->user()->email }}"
                        class="border p-3 w-full rounded-lg
                        @error('email') border-red-500 @enderror" />
                    @error('email')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center mt-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="old_password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña Actual</label>
                    <input id="old_password" name="old_password" type="password" placeholder="Contraseña Actual"
                        class="border p-3 w-full rounded-lg" />
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" name="password" type="password" placeholder="Nuevo password"
                        class="border p-3 w-full rounded-lg
                        @error('password') border-red-500 @enderror" />
                    @error('password')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center mt-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repite
                        tu Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Repite tu password" class="border p-3 w-full rounded-lg" />
                </div>


                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen perfil
                    </label>
                    <input id="imagen" name="imagen" type="file" class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png" />
                </div>

                <input type="submit" value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
