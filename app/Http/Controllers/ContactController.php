<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ContactController extends Controller
{
    //
    public function index() {
        $contacts = Contact::all();

        return view('contact', compact('contacts'));
    }

    public function store() {
        $contact = new Contact();

        $contact->name = Crypt::encryptString('Matheus Souto');
        $contact->email = Crypt::encryptString('matheushsouto@gmail.com');
        $contact->telefone = Crypt::encryptString('(42) 99999-99999');
        $contact->data_nascimento = Crypt::encryptString('1997-10-18');
        $contact->save();
    }

    public function update() {
        $contact = Contact::find(3);
        $contact->name="Mat Souto";
        $contact->save();

        $contact = Contact::where('name', 'Maria Souza')->first();
        $contact->name = "Mariana";
        $contact->save();
    }

    public function destroy($id) {
        $contact = Contact::find($id);
        $contact->delete();
    }

    public function decripty() {
        $contact = Contact::find(5);
        $contact->name = Crypt::decryptString($contact->name);
        $contact->email = Crypt::decryptString($contact->email);
        $contact->telefone = Crypt::decryptString($contact->telefone);
        $contact->data_nascimento = Crypt::decryptString($contact->data_nascimento);
        dd($contact);
    }

    public function enviarMensagem(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensagem' => 'required|string',
        ]);

        dd($request);
        // Processamento dos dados do formulário (por exemplo, envio de e-mail, salvamento no banco de dados, etc.)

        // Redirecionamento após o envio do formulário
        return redirect('/contato')->with('success', 'Mensagem enviada com sucesso!');
    }
}
