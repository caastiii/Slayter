<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Erabiltzailea Editatu - Bergarako Antzokia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">
    <x-header />
    
    <main class="flex-grow max-w-3xl mx-auto py-12 px-4 sm:px-6 w-full">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Erabiltzailea Editatu</h1>

        <form action="{{ route('erabiltzaileak.update', $user->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Izena</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#2b56bd] focus:ring-[#2b56bd]">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="Abizena" class="block text-sm font-medium text-gray-700">Abizena</label>
                    <input type="text" name="Abizena" id="Abizena" value="{{ old('Abizena', $user->Abizena) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#2b56bd] focus:ring-[#2b56bd]">
                    @error('Abizena') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Emaila</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#2b56bd] focus:ring-[#2b56bd]">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

           <div class="mb-6">
                <label for="Mota" class="block text-sm font-medium text-gray-700">Mota (Rola)</label>
                <select name="Mota" id="Mota" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#2b56bd] focus:ring-[#2b56bd]">
                    <option value="Arrunta" {{ old('Mota', $user->Mota) == 'Arrunta' ? 'selected' : '' }}>Arrunta</option>
                    <option value="Admin" {{ old('Mota', $user->Mota) == 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('Mota') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <hr class="my-6 border-gray-200">
            <p class="text-sm text-gray-500 mb-4">Utzi hutsik pasahitza ez baduzu aldatu nahi.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Pasahitz Berria (Aukerakoa)</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#2b56bd] focus:ring-[#2b56bd]">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Pasahitz Berria Errepikatu</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#2b56bd] focus:ring-[#2b56bd]">
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('erabiltzaileak.index') }}" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50">Utzi</a>
                <button type="submit" class="px-4 py-2 bg-[#2b56bd] text-white rounded-md hover:bg-blue-800">Eguneratu</button>
            </div>
        </form>
    </main>

</body>
</html>