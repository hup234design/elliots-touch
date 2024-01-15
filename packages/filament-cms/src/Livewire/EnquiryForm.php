<?php

namespace Hup234design\FilamentCms\Livewire;

use Hup234design\FilamentCms\Mail\EnquirySubmitted;
use Hup234design\FilamentCms\Models\Enquiry;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Spatie\Honeypot\Exceptions\SpamException;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;
use Spatie\Honeypot\SpamProtection;

class EnquiryForm extends Component implements HasForms
{
    use InteractsWithForms;

    use UsesSpamProtection;

    public ?array $data = [];

    public $x = 20;
    public $y = 5;
    public $question = 25;
    public $answer = 25;
    public $submitted = false;

    public HoneypotData $extraFields;

    public function resetQuiz()
    {
//        $this->x = rand(1,20);
//        $this->y = rand(1,20);
//
//        $this->question = "What is " . $this->x . " + " . $this->y . " ?";
     }

    public function mount(): void
    {
        $this->submitted = Cache::has('enquiry-form-submitted');
        $this->resetQuiz();
        $this->extraFields = new HoneypotData();
        $this->form->fill([
            'name' => 'Dave Walker',
            'email' => 'dave@hup234.me.uk',
            'telephone' => '07887477234',
            'subject' => 'Test Enquiry',
            'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'quiz' => $this->answer
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->validationMessages([
                        'required' => 'Please provide your name.',
                    ]),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->validationMessages([
                        'required' => 'Please provide your email address.',
                    ]),
                TextInput::make('telephone')->tel(),
                TextInput::make('subject')
                    ->required()
                    ->validationMessages([
                        'required' => 'What is the subject of your enquiry.',
                    ]),
                Textarea::make('message')
                    ->required()
                    ->validationMessages([
                        'required' => 'Please provide some details for your enquiry.',
                    ]),
                Textinput::make('quiz')
                    ->label('What is '.$this->x.' + '.$this->y.' ?')
                    ->required()
                    ->rules([
                        function () {
                            return function ($attribute, $value, \Closure $fail) {
                                if ($value != $this->x + $this->y) {
                                    $fail("That answer is incorrect.");
                                }
                            };
                        }
                    ])
                    ->validationMessages([
                        'required' => 'Please answer question to prove you are human.',
                    ])
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $data['ip_address'] = request()->ip();
        $data['spam'] = false;

        $honeypotData = $this->guessHoneypotDataProperty();

        try {
            app(SpamProtection::class)->check($honeypotData->toArray());
            ray('Enquiry Submitted');
        } catch (SpamException) {
            $data['spam'] = true;
            ray('SPAM Detected');
        }

//        $data['ip_address'] = request()->ip();
//        $data['spam'] = false;

//        $honeypotData = $this->guessHoneypotDataProperty();

//        ray($honeypotData);

        $enquiry = Enquiry::create($data);

        $this->submitted = true;

        if( ! $data['spam'] ) {
            Mail::to('dave@hup234design.co.uk')->send(new EnquirySubmitted($enquiry));
        }
        Cache::put('enquiry-form-submitted', true, 60); // 60 seconds = 1 minute
    }

    public function render()
    {
        return view('cms::livewire.enquiry-form');
    }
}
