<?php

namespace App\Console\Commands;
use App\User;

use Illuminate\Console\Command;

class RegisterSuperAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'register:super-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register super admin';

    private $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $details = $this->getDetails();
        $admin = $this->user->createSuperAdmin($details);
        $this->display($admin);
    }
    private function getDetails() : array
    {
        $details['name'] = $this->ask('Name');
        $details['email'] = $this->ask('Email');
        $details['role']=$this->ask('role');
        $details['password'] = $this->secret('Password');
        $details['confirm_password'] = $this->secret('Confirm password');
        while (! $this->isValidPassword($details['password'], $details['confirm_password'])) {
            if (! $this->isRequiredLength($details['password'])) {
                $this->error('Password must be more that six characters');
            }
            if (! $this->isMatch($details['password'], $details['confirm_password'])) {
                $this->error('Password and Confirm password do not match');
            }
            $details['password'] = $this->secret('Password');
            $details['confirm_password'] = $this->secret('Confirm password');
        }
        return $details;
    }
    private function display(User $admin) : void
    {
        $headers = ['Name', 'Email', 'Super admin'];
        $fields = [
            'Name' => $admin->name,
            'email' => $admin->email,
            'role'=>$admin->admin,
            'admin' => $admin->isSuperAdmin()
        ];
        $this->info('Super admin created');
        $this->table($headers, [$fields]);
    }
    private function isValidPassword(string $password, string $confirmPassword) : bool
    {
        return $this->isRequiredLength($password) &&
        $this->isMatch($password, $confirmPassword);
    }
    private function isMatch(string $password, string $confirmPassword) : bool
    {
        return $password === $confirmPassword;
    }
    private function isRequiredLength(string $password) : bool
    {
        return strlen($password) > 6;
    }
}
