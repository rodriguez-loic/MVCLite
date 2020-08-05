<?php declare(strict_types=1);

namespace Core;
 
use Exception;
 
class Template
{
    private $viewPath = '%s/src/View';
    private $mainTemplate = 'template.php';
    private $reservedVariables = ['application_name', 'body'];
 
    public function __construct($template = '')
    {
        $this->viewPath = sprintf($this->viewPath, APP_ROOT);

        if ($template !== '') {
            $this->mainTemplate = $template . '.php';
        }
    }
 
    public function getView($path, array $variables = [])
    {
        $variables = $this->validateVariables($variables);
 
        $viewPath = $this->viewPath . '/' . $path . '.php';

        if (file_exists($viewPath)) {
            $mainTemplate = file_get_contents($this->viewPath.'/'.$this->mainTemplate);
            $body = file_get_contents($viewPath);
            $view = str_replace('{{ body }}', $body, $mainTemplate);
 
            foreach ($variables as $key => $value) {
                $view = str_replace('{{ '.$key.' }}', $value, $view);
            }
 
            return $view;
        }
 
        http_response_code(404);
        throw new Exception(sprintf('View cannot be found: [%s]', $viewPath), 404);
    }
 
    private function validateVariables(array $variables = [])
    {
        foreach ($variables as $name => $value) {
            if (in_array($name, $this->reservedVariables)) {
                http_response_code(404);
                throw new Exception('Unacceptable view variable given: [' . $name . ']', 409);
            }
        }
 
        $variables['application_name'] = APP_NAME;
 
        return $variables;
    }
}
