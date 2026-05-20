<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - ClassMaster</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-50 to-purple-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg flex items-center justify-center text-white font-bold text-2xl">CM</div>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">ClassMaster</h1>
                <p class="text-gray-600 mt-2">Inicia sesión en tu cuenta</p>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-red-800 font-semibold">¡Error en el inicio de sesión!</p>
                        @foreach ($errors->all() as $error)
                            <p class="text-red-600 text-sm mt-1">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="tu@correo.com">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="••••••••">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="rounded border-gray-300 text-purple-600">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Recuérdame</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold py-2 rounded-lg hover:opacity-90 transition mt-6">
                        Iniciar Sesión
                    </button>
                </form>

                <!-- Links -->
                <div class="mt-6 text-center space-y-2">
                    <p class="text-gray-600">
                        ¿No tienes cuenta? 
                        <a href="{{ route('register') }}" class="text-purple-600 font-semibold hover:text-purple-700">Regístrate aquí</a>
                    </p>
                    <p>
                        <a href="{{ route('forgot-password') }}" class="text-sm text-gray-600 hover:text-gray-900">¿Olvidaste tu contraseña?</a>
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
