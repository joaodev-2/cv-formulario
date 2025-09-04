<p>Olá {{ $application->name }},</p>
<p>Recebemos seu currículo para <strong>{{ $application->desired_role }}</strong>.</p>
<ul>
  <li>Escolaridade: {{ $application->education }}</li>
  <li>Telefone: {{ $application->phone }}</li>
  <li>IP do envio: {{ $application->ip }}</li>
  <li>Data/Hora: {{ $application->submitted_at->format('d/m/Y H:i') }}</li>
</ul>
<p>Obrigado!</p>
