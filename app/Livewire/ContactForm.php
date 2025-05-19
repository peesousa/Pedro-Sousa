<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';
    public $successMessage = '';
    public $errorMessage = '';

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:10',
        ];
    }

    protected $messages = [
        'name.required' => 'O campo nome é obrigatório.',
        'name.min' => 'O nome precisa ter pelo menos 3 caracteres.',
        'email.required' => 'O campo email é obrigatório.',
        'email.email' => 'Por favor, insira um email válido.',
        'subject.required' => 'O campo assunto é obrigatório.',
        'subject.min' => 'O assunto precisa ter pelo menos 5 caracteres.',
        'message.required' => 'O campo mensagem é obrigatório.',
        'message.min' => 'A mensagem precisa ter pelo menos 10 caracteres.',
    ];


    public function submitForm()
    {
        $this->validate();
        $this->successMessage = '';
        $this->errorMessage = '';

        try {
            Mail::to(env('MAIL_TO_ADDRESS', 'seu-email-de-destino@example.com'))
                ->send(new ContactMessageMail($this->name, $this->email, $this->subject, $this->message));

            $this->successMessage = __('contact.form_success');
            $this->resetForm();
        } catch (\Exception $e) {
            // Log::error('Erro ao enviar email de contato: ' . $e->getMessage());
            $this->errorMessage = __('contact.form_error');
        }
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
