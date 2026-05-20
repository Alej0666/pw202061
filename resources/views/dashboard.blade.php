<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - ClassMaster</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg"></div>
                    <span class="text-lg font-bold text-gray-900">ClassMaster</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Bienvenido, <strong>{{ auth()->user()->name }}</strong></span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-sm min-h-screen">
            <div class="p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Menú</h2>
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-lg bg-purple-100 text-purple-700 font-semibold">
                        📊 Dashboard
                    </a>
                    <a href="#" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                        @if(auth()->user()->role === 'professor')
                            👨‍🏫 Mi Perfil
                        @else
                            📋 Mis Clases
                        @endif
                    </a>
                    <a href="#" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                        ⚙️ Configuración
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Content Area -->
        <main class="flex-1 p-8">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg p-8 mb-8">
                <h1 class="text-3xl font-bold mb-2">¡Hola, {{ auth()->user()->name }}!</h1>
                <p class="text-purple-100">
                    @if(auth()->user()->role === 'professor')
                        Bienvenido a tu panel de profesor. Aquí puedes gestionar tus clases y ver el progreso de tus estudiantes.
                    @else
                        Bienvenido a tu panel de estudiante. Aquí puedes reservar clases y ver tu progreso académico.
                    @endif
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                @if(auth()->user()->role === 'professor')
                    <!-- Profesor Stats -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Clases Impartidas</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $lessons_count ?? 0 }}</p>
                            </div>
                            <div class="text-3xl">📚</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Estudiantes</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $students_count ?? 0 }}</p>
                            </div>
                            <div class="text-3xl">👨‍🎓</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Calificación Promedio</p>
                                <p class="text-3xl font-bold text-gray-900">{{ number_format($rating ?? 0, 1) }}/5</p>
                            </div>
                            <div class="text-3xl">⭐</div>
                        </div>
                    </div>
                @else
                    <!-- Estudiante Stats -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Clases Tomadas</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $lessons_count ?? 0 }}</p>
                            </div>
                            <div class="text-3xl">📚</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Profesores</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $teachers_count ?? 0 }}</p>
                            </div>
                            <div class="text-3xl">👨‍🏫</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Progreso</p>
                                <p class="text-3xl font-bold text-gray-900">--</p>
                            </div>
                            <div class="text-3xl">📈</div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Acciones Rápidas</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if(auth()->user()->role === 'professor')
                        <a href="#" class="block p-4 border-2 border-purple-300 rounded-lg text-center hover:bg-purple-50 transition">
                            <p class="font-semibold text-gray-900">➕ Crear Disponibilidad</p>
                            <p class="text-sm text-gray-600">Establece tus horarios disponibles</p>
                        </a>
                        <a href="#" class="block p-4 border-2 border-purple-300 rounded-lg text-center hover:bg-purple-50 transition">
                            <p class="font-semibold text-gray-900">📝 Ver Clases Pendientes</p>
                            <p class="text-sm text-gray-600">Confirma o rechaza solicitudes</p>
                        </a>
                    @else
                        <a href="#" class="block p-4 border-2 border-purple-300 rounded-lg text-center hover:bg-purple-50 transition">
                            <p class="font-semibold text-gray-900">🔍 Buscar Profesores</p>
                            <p class="text-sm text-gray-600">Encuentra el profesor que necesitas</p>
                        </a>
                        <a href="#" class="block p-4 border-2 border-purple-300 rounded-lg text-center hover:bg-purple-50 transition">
                            <p class="font-semibold text-gray-900">📅 Reservar Clase</p>
                            <p class="text-sm text-gray-600">Agenda una nueva clase</p>
                        </a>
                    @endif
                </div>
            </div>
        </main>
    </div>
</body>
</html>
