<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ScanMissingTranslations extends Command
{
    protected $signature = 'lang:scan {locale?}';
    protected $description = 'Scan the project for missing translation keys and add them automatically to lang files';

    public function handle()
    {
        $locale = $this->argument('locale') ?? config('app.locale');
        $fallback = config('app.fallback_locale');
        $localePath = resource_path("lang/{$locale}");

        if (!File::exists($localePath)) {
            File::makeDirectory($localePath, 0755, true);
            $this->info("📁 Created locale folder: {$localePath}");
        }

        $paths = [
            base_path('app'),
            base_path('resources/views'),
            base_path('routes'),
        ];

        $this->info("🔍 Scanning project for translation keys...");

        $allKeys = [];

        // Patterns to match different translation function calls
        // More comprehensive patterns to catch all variations
        $patterns = [
            // __('key'), __('key', params), __("key") - with or without spaces
            "/__\s*\(\s*['\"]([^'\"]+)['\"]\s*(?:,|\))/",
            // @lang('key'), @lang("key") - Blade directive
            "/@lang\s*\(\s*['\"]([^'\"]+)['\"]\s*(?:,|\))/",
            // trans('key'), trans("key") - function call
            "/\btrans\s*\(\s*['\"]([^'\"]+)['\"]\s*(?:,|\))/",
            // {{ __('key') }}, {{ __("key") }} - Blade echo
            "/\{\{\s*__\s*\(\s*['\"]([^'\"]+)['\"]\s*\)\s*\}\}/",
            // {{ trans('key') }}, {{ trans("key") }} - Blade echo
            "/\{\{\s*trans\s*\(\s*['\"]([^'\"]+)['\"]\s*\)\s*\}\}/",
            // {!! __('key') !!}, {!! __("key") !!} - Blade raw echo
            "/\{\!!\s*__\s*\(\s*['\"]([^'\"]+)['\"]\s*\)\s*!!\}/",
        ];

        foreach ($paths as $path) {
            if (!File::exists($path)) {
                continue;
            }
            
            $files = File::allFiles($path);
            foreach ($files as $file) {
                // Skip non-PHP and non-Blade files
                $extension = $file->getExtension();
                if (!in_array($extension, ['php', 'blade.php'])) {
                    continue;
                }

                $content = File::get($file->getPathname());
                
                // Remove comments to avoid false positives
                $content = preg_replace('/\/\*.*?\*\//s', '', $content); // Remove /* */ comments
                $content = preg_replace('/\/\/.*$/m', '', $content); // Remove // comments
                // Remove Blade comments
                $content = preg_replace('/\{\{--.*?--\}\}/s', '', $content);

                // Try all patterns
                foreach ($patterns as $pattern) {
                    if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
                        foreach ($matches as $match) {
                            if (!empty($match[1])) {
                                $key = trim($match[1]);
                                // Skip empty keys and common false positives
                                if (!empty($key) && !in_array($key, ['key', 'value', 'id', 'name']) && strlen($key) > 1) {
                                    $allKeys[] = $key;
                                }
                            }
                        }
                    }
                }
            }
        }

        $allKeys = array_unique($allKeys);
        $this->info("✅ Found " . count($allKeys) . " translation keys in project.");

        $added = 0;

foreach ($allKeys as $fullKey) {
    // لو المفتاح فاضي تجاهل
    if (trim($fullKey) === '') {
        continue;
    }

    // لو المفتاح بينتهي بنقطة أو مفيهوش نقطة خالص -> نخزن في JSON
    if (substr($fullKey, -1) === '.' || strpos($fullKey, '.') === false) {
        $jsonKey = rtrim($fullKey, '.'); // لو بينتهي بنقطة نحزفها
        $jsonPath = resource_path("lang/{$locale}.json");

        $jsonTranslations = [];
        if (File::exists($jsonPath)) {
            $content = File::get($jsonPath);
            $jsonTranslations = json_decode($content, true) ?: [];
        }

        // لو المفتاح مش موجود في JSON نضيفه بقيمة فاضية
        if (!array_key_exists($jsonKey, $jsonTranslations)) {
            $jsonTranslations[$jsonKey] = '';
            // حفظ JSON مرتب وجميل
            File::put($jsonPath, json_encode($jsonTranslations, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
            $this->line("➕ Added JSON key: {$jsonKey} -> {$jsonPath}");
            $added++;
        } else {
            $this->line("ℹ️ JSON key already exists: {$jsonKey}");
        }

        continue;
    }

    // لو هنا يبقى في نقطة وبعدين أجزاء -> نتعامل مع ملفات php المعتادة
    $parts = explode('.', $fullKey);
    $fileName = array_shift($parts);

    if (empty($fileName) || empty($parts)) {
        // هنا حالتك الأصلية اللي كانت بتتجاهلها، لكن المفروض منطقياً متغطّاة فوق
        $this->warn("⚠️ Skipped malformed key: {$fullKey}");
        continue;
    }

    $filePath = $localePath . '/' . $fileName . '.php';

    if (!File::exists($filePath)) {
        File::put($filePath, "<?php\n\nreturn [\n];");
        $this->warn("⚠️ Created missing file: {$filePath}");
    }

    $translations = include $filePath;
    if (!is_array($translations)) {
        $translations = [];
    }

    // Check if key already exists
    $current = $translations;
    $keyExists = true;
    foreach ($parts as $part) {
        if (!isset($current[$part])) {
            $keyExists = false;
            break;
        }
        $current = $current[$part];
    }

    // Only add if key doesn't exist or exists but is empty
    if (!$keyExists || (is_string($current) && trim($current) === '')) {
        if ($this->addNestedKey($translations, $parts)) {
            $this->saveArrayToFile($filePath, $translations);
            $this->line("➕ Added missing key: {$fullKey}");
            $added++;
        }
    }
}


        $this->info("\n🎉 Done! Added {$added} new translation keys.");
    }

    protected function addNestedKey(array &$array, array $keys)
    {
        $current = &$array;

        foreach ($keys as $i => $key) {
            if (!isset($current[$key])) {
                // آخر مستوى؟ ضيف قيمة فاضية
                if ($i === count($keys) - 1) {
                    $current[$key] = '';
                    return true;
                } else {
                    $current[$key] = [];
                }
            } elseif (!is_array($current[$key]) && $i !== count($keys) - 1) {
                // لو المفتاح نصي بس المفروض يبقى مصفوفة
                $current[$key] = [];
            }

            $current = &$current[$key];
        }

        return false;
    }

    protected function saveArrayToFile($path, array $translations)
    {
        $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";
        File::put($path, $content);
    }
}
