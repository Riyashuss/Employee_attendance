<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReadTabDelimitedFile extends Command
{
    protected $signature = 'file:read-tab-delimited';
    protected $description = 'Read and extract values immediately following specific keywords from a tab-delimited text file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $filePath = storage_path('app/public/v1text.txt'); // Adjust path if needed
    
        if (!file_exists($filePath)) {
            $this->error('File not found!');
            return 1;
        }
    
        $file = fopen($filePath, 'r');
    
        if ($file === false) {
            $this->error('Unable to open file!');
            return 1;
        }
    
        $headlines = [];
    
        while (($line = fgets($file)) !== false) {
            // Skip lines that start with a JSON object
            if (preg_match('/^\{[^}]*\}$/', trim($line))) {
                continue;
            }
    
            // Split the line by tabs
            $columns = explode("\t", trim($line));
    
            foreach ($columns as $column) {
                // Extract values enclosed in double quotes
                preg_match_all('/"([^"]*)"/', $column, $matches);
    
                if (!empty($matches[1])) {
                    // Add extracted values to the array
                    foreach ($matches[1] as $match) {
                        $headlines[] = $match;
                    }
                }
            }
        }
    
        fclose($file);
    
        // Output the extracted headlines
        $this->info('Extracted headlines:');
        foreach ($headlines as $headline) {
            $this->line($headline);
        }
    
        $this->info('File processing completed.');
        return 0;
    }
    
}
