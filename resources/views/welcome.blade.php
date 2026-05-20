<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClassMaster - Clases Particulares Online</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg flex items-center justify-center text-white font-bold">CM</div>
                    <span class="text-xl font-bold text-gray-900">ClassMaster</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-gray-600 hover:text-gray-900">Características</a>
                    <a href="#pricing" class="text-gray-600 hover:text-gray-900">Precios</a>
                </div>
                <div class="flex space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 px-4 py-2">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">Registrarse</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-purple-50">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">Aprende de los Mejores <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">Profesores</span></h1>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">Conecta con profesores certificados para clases particulares personalizadas. Horarios flexibles, lecciones efectivas, éxito garantizado.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @guest
                    <a href="{{ route('register') }}" class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700">Empezar Ahora</a>
                    <a href="#features" class="border-2 border-purple-600 text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-purple-50">Ver Más</a>
                @else
                    <a href="{{ url('/dashboard') }}" class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700">Ir al Dashboard</a>
                @endguest
            </div>
        </div>
    </section>

    <section id="features" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-16">¿Por qué elegir ClassMaster?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-bold mb-2">Profesores Certificados</h3>
                    <p class="text-gray-600">Todos nuestros profesores han sido verificados y tienen experiencia comprobada.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-bold mb-2">Horarios Flexibles</h3>
                    <p class="text-gray-600">Elige tus propios horarios. Clases adaptadas a tu disponibilidad.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-bold mb-2">Personalizado</h3>
                    <p class="text-gray-600">Contenido y ritmo adaptado a tu nivel y objetivos específicos.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-purple-600 to-pink-600">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-white mb-6">¿Listo para comenzar?</h2>
            @guest
                <a href="{{ route('register') }}" class="inline-block bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100">Registrarse Ahora</a>
            @endguest
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-400 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <p>© 2026 ClassMaster. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
