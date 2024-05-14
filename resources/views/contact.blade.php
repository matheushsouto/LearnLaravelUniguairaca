<h1>Listagem de Contatos</h1>

@foreach ($contacts as $contact)

<div>
    <p>{{ $contact->name }}</p>
</div>

@endforeach

<form action="/contato/store" method="POST">
    @method('POST')
    @csrf
    <button type="submit">Cadastrar Contato</button>
</form>

<form action="/contato/update" method="POST">
    @method('PUT')
    @csrf
    <button type="submit">Atualizar Contato</button>
</form>

<form action="/contato/delete/1" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">Excluir Contato</button>
</form>


<h1>Formulário de Contato</h1>

    <form method="POST" action="/contato/send">
        @csrf <!-- Token de CSRF -->

        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="mensagem">Mensagem:</label><br>
        <textarea id="mensagem" name="mensagem"></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
    @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
