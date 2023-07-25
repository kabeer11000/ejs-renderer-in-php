// Parts of this code are AI generated, keeping risks onn security in mind please refrain from using this in production
<?php

class EjsRenderer
{
    private $template;
    private $data;

    public function __construct($template, $data = [])
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function render()
    {
        // Replace EJS tags with PHP tags
        $phpCode = preg_replace_callback(
            '/<%=(.+?)%>/',
            function ($matches) {
                return "<?php echo " . $this->convertVariable($matches[1]) . "; ?>";
            },
            $this->template
        );

        // Evaluate any remaining code blocks
        $phpCode = preg_replace_callback(
            '/<%(.+?)%>/',
            function ($matches) {
                return "<?php " . $this->convertCodeBlock($matches[1]) . "; ?>";
            },
            $phpCode
        );

        // Handle include (partials) statements
        $phpCode = preg_replace_callback(
            '/<%\s*include\s*(.+?)\s*%>/',
            function ($matches) {
                return file_get_contents(trim($matches[1]));
            },
            $phpCode
        );

        // Output the rendered template
        extract($this->data); // Extract data to local variables
        ob_start();
        eval('?>' . $phpCode);
        $output = ob_get_clean();
        return $output;
    }

    private function convertVariable($variable)
    {
        // Convert EJS variable to PHP variable
        return '$' . trim($variable);
    }

    private function convertCodeBlock($code)
    {
        // Convert EJS control structures to PHP control structures
        $code = trim($code);
        if (strpos($code, 'if') === 0) {
            return "if (" . substr($code, 2) . ")";
        } elseif (strpos($code, 'else') === 0) {
            return "} else {";
        } elseif (strpos($code, 'for') === 0) {
            return "foreach (" . substr($code, 3) . ")";
        } else {
            // No special conversion needed for other code blocks
            return $code;
        }
    }
}
?>
