{{ $slot }}
<form method="POST" action="{{ route('site.contato') }}" >
    {{-- Cross-site request forgery --}}
    @csrf
    <input name="name" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="phone" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="subject" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="">Dúvida</option>
        <option value="">Elogio</option>
        <option value="">Reclamação</option>
    </select>
    <br>
    <textarea name="message" class="{{ $classe }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>