@extends('layouts.app')

@section('content')
    <main class="flex w-250 max-w-7xl mx-auto rounded-3xl">
        
        <div class="md:w-1/2 relative z-10 rounded-3xl">
            <div class="w-full h-full shadow-2xl bg-cover bg-center p-12 text-white flex flex-col justify-center rounded-3xl transform translate-x-5"
                style="background-image: url('{{ Vite::asset('resources/images/imagem_gradient_form.png') }}')">
                <h1 class="text-4xl font-bold leading-tight mb-3">Trabalhe Conosco</h1>
                <p class="text-xl text-gray-200 mb-12">Faça parte da nossa equipe!</p>

                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-4">
                    <a href="https://github.com/joaodev-2" target="_blank" rel="noopener noreferrer"
                        class="text-gray-300 hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.168 6.839 9.49.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://linkedin.com/in/joaopedropvic" target="_blank" rel="noopener noreferrer"
                        class="text-gray-300 hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 bg-white p-12 overflow-y-auto shadow-2xl rounded-r-3xl" style="max-height: 90vh;">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Envie seu currículo</h2>

            <form id="cvForm" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome completo*</label>
                    <input name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">E-mail*</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telefone*</label>
                    <input name="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('phone')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cargo desejado*</label>
                    <input name="desired_role" value="{{ old('desired_role') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('desired_role')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Escolaridade*</label>
                    <select name="education"
                        class="w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none text-sm"
                        style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 20 20%22 fill=%22none%22 stroke=%22currentColor%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22><polyline points=%226 9 12 15 18 9%22></polyline></svg>'); background-position: right 0.75rem center; background-repeat: no-repeat; background-size: 1.25em;">

                        <option value="" disabled @selected(!old('education'))>Selecione um nível</option>

                        @foreach (['fundamental', 'fundamental incompleto', 'médio', 'médio incompleto', 'técnico', 'técnico incompleto', 'superior', 'superior incompleto', 'pos', 'pos incompleto', 'mestrado', 'mestrado incompleto', 'doutorado', 'doutorado incompleto'] as $opt)
                            <option value="{{ $opt }}" @selected(old('education') === $opt)>{{ ucfirst($opt) }}</option>
                        @endforeach
                    </select>
                    @error('education')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn (opcional)</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url') }}"
                        placeholder="https://linkedin.com/in/seu-perfil"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    @error('linkedin_url')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Currículo (doc, docx, pdf | máx. 1MB)*</label>
                    <label for="cv"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 border border-gray-300 rounded-lg shadow-sm cursor-pointer hover:bg-gray-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 15v2a2 2 0 002 2h14a2 2 0 002-2v-2M7 10l5-5 5 5M12 5v12" />
                        </svg>
                        Anexar arquivo
                    </label>
                    <input id="cv" type="file" name="cv" accept=".doc,.docx,.pdf" class="hidden" required>
                    @error('cv')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p id="cvHint" class="text-sm text-gray-600 mt-1"></p>
                </div>

                <button type="submit"
                    class="w-full mt-6 bg-gray-900 text-white font-bold py-3 px-4 rounded-lg hover:bg-gray-800 transition duration-300 flex items-center justify-center cursor-pointer">
                    Enviar
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
    </main>

    @if (session('success'))
        <div id="toast"
            class="fixed right-5 top-5 bg-green-100 text-green-800 px-6 py-4 rounded-lg shadow-lg border border-green-300 animate-fade-in text-lg">
            {{ session('success') }}
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cvInput = document.getElementById('cv');
            const hintElement = document.getElementById('cvHint');

            if (cvInput && hintElement) {
                cvInput.addEventListener('change', function(event) {
                    const file = this.files[0];
                    const showError = (message) => {
                        hintElement.textContent = message;
                        hintElement.classList.remove('text-gray-600');
                        hintElement.classList.add('text-red-600', 'font-semibold');
                        this.value = '';
                    };

                    hintElement.textContent = '';
                    hintElement.classList.remove('text-red-600', 'font-semibold');
                    hintElement.classList.add('text-gray-600');

                    if (!file) return;

                    const MAX_SIZE_BYTES = 1024 * 1024;
                    const ALLOWED_MIME_TYPES = ['application/pdf', 'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    ];

                    if (file.size > MAX_SIZE_BYTES) return showError('Arquivo maior que 1MB.');
                    if (!ALLOWED_MIME_TYPES.includes(file.type)) return showError(
                        'Formato inválido. Use .doc, .docx ou .pdf.');

                    hintElement.textContent =
                        `Selecionado: ${file.name} (${(file.size / 1024).toFixed(0)} KB)`;
                });
            }

            const toast = document.getElementById('toast');
            if (toast) {
                setTimeout(() => {
                    toast.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                    setTimeout(() => toast.remove(), 500);
                }, 5000);
            }
        });
    </script>
@endsection
