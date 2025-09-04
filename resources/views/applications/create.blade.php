
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    @if(session('success'))
        <div class="mb-4 rounded bg-green-100 p-3">{{ session('success') }}</div>
    @endif

    <h1 class="text-2xl font-semibold mb-4">Envio de Currículo</h1>

    <form id="cvForm" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block">Nome*</label>
            <input name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" required>
            @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block">E-mail*</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded" required>
            @error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block">Telefone*</label>
            <input name="phone" value="{{ old('phone') }}" class="w-full border p-2 rounded" required>
            @error('phone')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block">Cargo desejado*</label>
            <input name="desired_role" value="{{ old('desired_role') }}" class="w-full border p-2 rounded" required>
            @error('desired_role')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block">Escolaridade*</label>
            <select name="education" class="w-full border p-2 rounded" required>
                @foreach(['fundamental','médio','técnico','superior','pos','mestrado','doutorado'] as $opt)
                    <option value="{{ $opt }}" @selected(old('education')===$opt)>{{ ucfirst($opt) }}</option>
                @endforeach
            </select>
            @error('education')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block">Observações (opcional)</label>
            <textarea name="notes" class="w-full border p-2 rounded" rows="4">{{ old('notes') }}</textarea>
            @error('notes')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block">Arquivo (doc, docx, pdf | máx. 1MB)*</label>
            <input id="cv" type="file" name="cv" accept=".doc,.docx,.pdf" class="w-full" required>
            @error('cv')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            <p id="cvHint" class="text-sm mt-1"></p>
        </div>

        <button class="px-4 py-2 rounded bg-blue-600 text-white">Enviar</button>
    </form>
</div>

<script>
document.getElementById('cv').addEventListener('change', function(){
  const f = this.files[0]; if(!f) return;
  const okExt = ['application/pdf',
                 'application/msword',
                 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
  const hint = document.getElementById('cvHint');
  if (f.size > 1024 * 1024) {
    hint.textContent = 'Arquivo maior que 1MB.'; hint.style.color = 'red'; this.value = '';
  } else if (!okExt.includes(f.type)) {
    hint.textContent = 'Formato inválido. Use .doc, .docx ou .pdf.'; hint.style.color = 'red'; this.value = '';
  } else {
    hint.textContent = `Selecionado: ${f.name} (${(f.size/1024).toFixed(0)} KB)`; hint.style.color = '';
  }
});
</script>
@endsection
