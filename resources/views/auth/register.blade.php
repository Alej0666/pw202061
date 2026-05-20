<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse - ClassMaster</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-50 to-purple-50">
    <div class="flex items-center justify-center min-h-screen px-4 py-8">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg flex items-center justify-center text-white font-bold text-2xl">CM</div>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">ClassMaster</h1>
                <p class="text-gray-600 mt-2">Crea tu cuenta y comienza a aprender</p>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-red-800 font-semibold">¡Error en el registro!</p>
                        @foreach ($errors->all() as $error)
                            <p class="text-red-600 text-sm mt-1">• {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Juan Pérez">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="tu@correo.com">
                    </div>

                    <!-- Role Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">¿Qué eres?</label>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <input type="radio" id="student" name="role" value="student" {{ old('role') === 'student' ? 'checked' : '' }} required class="peer hidden">
                                <label for="student" class="block p-4 border-2 border-gray-300 rounded-lg cursor-pointer text-center peer-checked:border-purple-600 peer-checked:bg-purple-50 transition">
                                    <div class="font-semibold text-gray-900">👨‍🎓 Estudiante</div>
                                    <p class="text-xs text-gray-600 mt-1">Quiero aprender</p>
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="professor" name="role" value="professor" {{ old('role') === 'professor' ? 'checked' : '' }} required class="peer hidden">
                                <label for="professor" class="block p-4 border-2 border-gray-300 rounded-lg cursor-pointer text-center peer-checked:border-purple-600 peer-checked:bg-purple-50 transition">
                                    <div class="font-semibold text-gray-900">👨‍🏫 Profesor</div>
                                    <p class="text-xs text-gray-600 mt-1">Quiero enseñar</p>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="••••••••">
                        <p class="text-xs text-gray-500 mt-1">Mínimo 6 caracteres</p>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="••••••••">
                    </div>

                    <!-- Terms -->
                    <div class="flex items-start">
                        <input type="checkbox" id="terms" name="terms" required class="mt-1 rounded border-gray-300 text-purple-600">
                        <label for="terms" class="ml-2 text-sm text-gray-600">
                            Acepto los <a href="#" class="text-purple-600 hover:underline">términos y condiciones</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold py-2 rounded-lg hover:opacity-90 transition mt-6">
                        Crear Cuenta
                    </button>
                </form>

                <!-- Links -->
                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        ¿Ya tienes cuenta? 
                        <a href="{{ route('login') }}" class="text-purple-600 font-semibold hover:text-purple-700">Inicia sesión</a>
                    </p>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-6">
                <a href="{{ route('welcome') }}" class="text-gray-600 hover:text-gray-900">← Volver al inicio</a>
            </div>
        </div>
    </div>
</body>
</html>
