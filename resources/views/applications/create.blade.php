@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    
    <h1 class="text-2xl font-semibold mb-4 text-center">Envio de Currículo</h1>

    <div class="rounded-2xl bg-white/70 backdrop-blur-md shadow-xl border-md border-gray-200 p-6">
        <form id="cvForm" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block">Nome*</label>
                <input name="name" value="{{ old('name') }}" required
                       class="w-full rounded-md border border-gray-300 p-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block">E-mail*</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full rounded-md border border-gray-300 p-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                @error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block">Telefone*</label>
                <input name="phone" value="{{ old('phone') }}" required
                       class="w-full rounded-md border border-gray-300 p-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                @error('phone')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block">Cargo desejado*</label>
                <input name="desired_role" value="{{ old('desired_role') }}" required
                       class="w-full rounded-md border border-gray-300 p-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                @error('desired_role')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block">Escolaridade*</label>
                <select name="education" required
                        class="w-full rounded-md border border-gray-300 p-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                    @foreach([
                        'fundamental',
                        'fundamental incompleto',
                        'médio',
                        'médio incompleto',
                        'técnico',
                        'técnico incompleto',
                        'superior',
                        'superior incompleto',
                        'pos',
                        'pos incompleto',
                        'mestrado',
                        'mestrado incompleto',
                        'doutorado',
                        'doutorado incompleto'
                    ] as $opt)
                        <option value="{{ $opt }}" @selected(old('education')===$opt)>{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>
                @error('education')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block">Observações (opcional)</label>
                <textarea name="notes" rows="4"
                          class="w-full rounded-md border border-gray-300 p-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">{{ old('notes') }}</textarea>
                @error('notes')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block">Arquivo (doc, docx, pdf | máx. 1MB)*</label>
                <label for="cv" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md cursor-pointer hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15v2a2 2 0 002 2h14a2 2 0 002-2v-2M7 10l5-5 5 5M12 5v12"/>
                    </svg>
                    Selecionar arquivo
                </label>
                <input id="cv" type="file" name="cv" accept=".doc,.docx,.pdf" class="hidden" required>

                @error('cv')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror

                <p id="cvHint" class="text-sm text-gray-600 mt-1"></p>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md py-2 shadow-md transition cursor-pointer">
                Enviar
            </button>

        </form>
    </div>
</div>
@if(session('success'))
    <div id="toast"
         class="absolute right-0 bottom-0 bg-green-100 text-green-800 px-4 py-3 rounded-lg shadow-lg border border-green-300 animate-fade-in">
        {{ session('success') }}
    </div>

    <script>
        // some o toast após 5 segundos
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.classList.add('opacity-0', 'translate-y-2', 'transition');
                setTimeout(() => toast.remove(), 500);
            }
        }, 5000);
    </script>
@endif

<script>
document.getElementById('cv').addEventListener('change', function(){
  const f = this.files[0]; if(!f) return;
  const okExt = ['application/pdf',
                 'application/msword',
                 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
  const hint = document.getElementById('cvHint');
  if (f.size > 1024 * 1024) {
    hint.textContent = 'Arquivo maior que 1MB.'; hint.classList.add('text-red-600');
    this.value = '';
  } else if (!okExt.includes(f.type)) {
    hint.textContent = 'Formato inválido. Use .doc, .docx ou .pdf.'; hint.classList.add('text-red-600');
    this.value = '';
  } else {
    hint.textContent = `Selecionado: ${f.name} (${(f.size/1024).toFixed(0)} KB)`; 
    hint.classList.remove('text-red-600');
  }
});
</script>
@endsection
