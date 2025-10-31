<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PassportSyncEnvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passport:sync-env';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Passport clients and sync their IDs and secrets to .env file';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🔐 Syncing Passport clients to .env...');

        try {
            // Ambil Personal Access Client
            $personalClient = DB::table('oauth_personal_access_clients')
                ->join('oauth_clients', 'oauth_clients.id', '=', 'oauth_personal_access_clients.client_id')
                ->select('oauth_clients.id', 'oauth_clients.secret', 'oauth_clients.name')
                ->first();

            // Ambil Password Grant Client
            $passwordClient = DB::table('oauth_password_clients')
                ->join('oauth_clients', 'oauth_clients.id', '=', 'oauth_password_clients.client_id')
                ->select('oauth_clients.id', 'oauth_clients.secret', 'oauth_clients.name')
                ->first();

            // Jika tidak ada salah satu, buat otomatis
            if (!$personalClient) {
                $this->warn('⚠️  No personal access client found, creating...');
                $this->call('passport:client', [
                    '--personal' => true,
                    '--name' => 'Laravel Personal Access Client',
                    '--no-interaction' => true,
                ]);
                $personalClient = DB::table('oauth_personal_access_clients')
                    ->join('oauth_clients', 'oauth_clients.id', '=', 'oauth_personal_access_clients.client_id')
                    ->select('oauth_clients.id', 'oauth_clients.secret', 'oauth_clients.name')
                    ->first();
            }

            if (!$passwordClient) {
                $this->warn('⚠️  No password grant client found, creating...');
                $this->call('passport:client', [
                    '--password' => true,
                    '--name' => 'Laravel Password Grant Client',
                    '--no-interaction' => true,
                ]);
                $passwordClient = DB::table('oauth_password_clients')
                    ->join('oauth_clients', 'oauth_clients.id', '=', 'oauth_password_clients.client_id')
                    ->select('oauth_clients.id', 'oauth_clients.secret', 'oauth_clients.name')
                    ->first();
            }

            // Update ENV
            $envPath = base_path('.env');
            $envContent = File::exists($envPath) ? File::get($envPath) : '';

            $updates = [
                'PASSPORT_PERSONAL_CLIENT_ID' => $personalClient->id ?? '',
                'PASSPORT_PERSONAL_CLIENT_SECRET' => $personalClient->secret ?? '',
                'PASSPORT_PASSWORD_CLIENT_ID' => $passwordClient->id ?? '',
                'PASSPORT_PASSWORD_CLIENT_SECRET' => $passwordClient->secret ?? '',
            ];

            foreach ($updates as $key => $value) {
                if (!$value) continue;
                if (preg_match("/^{$key}=.*/m", $envContent)) {
                    $envContent = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $envContent);
                } else {
                    $envContent .= "\n{$key}={$value}";
                }
            }

            $envContent .= "\n# Passport synced on " . now()->format('Y-m-d H:i:s');
            File::put($envPath, trim($envContent) . PHP_EOL);

            $this->info('✅ Passport client credentials synced successfully!');
            $this->line("🔸 Personal Client ID: {$personalClient->id}");
            $this->line("🔸 Password Grant Client ID: {$passwordClient->id}");

            return self::SUCCESS;

        } catch (\Throwable $e) {
            $this->error("❌ Error: {$e->getMessage()}");
            return self::FAILURE;
        }
    }
}
