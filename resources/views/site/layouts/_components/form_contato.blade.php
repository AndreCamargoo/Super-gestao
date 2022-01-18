{{ $slot }}
<form method="POST" action="{{ route('site.contato') }}" >
    {{-- Cross-site request forgery --}}
    @csrf
    <input name="name" value="{{ old('name') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if ($errors->has('name'))
        {{ $errors->first('name') }}
    @endif
    <br>
    <input name="phone" value="{{ old('phone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
        {{ $errors->has('phone') ? $errors->first('phone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
        {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="subject" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo_contato)
           <option value="{{ $motivo_contato->id }}" {{ old('subject') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach        
    </select>
        {{ $errors->has('subject') ? $errors->first('subject') : '' }}
    <br>
    <textarea name="message" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem">{{ old('message') }}</textarea>
        {{ $errors->has('message') ? $errors->first('message') : '' }}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{-- @if ($errors->any())
    <div style="position: absolute;width: 100%; background-color: #eee; color: #000;">
        @foreach ($errors->all() as $erro)
            <p>{{ $erro }}</p>
        @endforeach
    </div>    
@endif --}}
