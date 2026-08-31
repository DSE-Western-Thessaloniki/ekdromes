<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Str;

use function Laravel\Prompts\text;

#[Signature('user:add {name} {email}')]
#[Description('Add a new admin user')]
class AddUserCommand extends Command implements PromptsForMissingInput
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'active' => true,
        ]);

        if ($user) {
            $this->info("Ο χρήστης '{$user->name}' δημιουργήθηκε!");
        } else {
            $this->error('Σφάλμα κατά την αποθήκευση του χρήστη');
        }
    }

    /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array<string, string>
     */
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => fn () => text(
                label: 'Ονοματεπώνυμο',
                validate: fn (string $value) => match (true) {
                    mb_strlen($value) > 255 => 'Η τιμή του πεδίου δεν μπορεί να περιέχει περισσότερους από 255 χαρακτήρες',
                    default => null
                }
            ),
            'email' => fn () => $this->anticipate(
                'Email',
                function (string $input) {
                    if (! Str::contains($input, '@')) {
                        return ["$input@sch.gr"];
                    }

                    return [];
                }
            ),
        ];
    }
}
