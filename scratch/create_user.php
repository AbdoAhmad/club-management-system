<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

try {
    tenancy()->initialize('drtuyio');
    
    $user = new User();
    $user->setTranslation('name', 'en', 'Admin');
    $user->setTranslation('name', 'ar', 'مدير');
    $user->email = 'admin@drtuyio.com';
    $user->password = 'password';
    $user->save();
    
    echo "User created successfully\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
