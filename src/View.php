<?php

namespace App;

class View
{
    public function render(string $filePath, array $variables = [], bool $print = true)
    {
        $output = NULL;

        $filePath = __DIR__ . '/../views/' . $filePath . '.template.php';
        
        if(file_exists($filePath)){
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }

        if ($print) {
            print $output;
        }

        return $output;
    }
}