# ejs-renderer-in-php
Parts of this code are AI generated, keeping risks onn security in mind please refrain from using this in production
```
// Example usage:
$data = [
    'title' => "Fully Fledged EJS Renderer in PHP",
    'heading' => "Hello, World!",
    'content' => "This is a fully-fledged EJS template rendered in PHP.",
    'showHeading' => true,
    'list' => ['Item 1', 'Item 2', 'Item 3'],
];

$template = file_get_contents('sample.ejs');
$renderer = new EjsRenderer($template, $data);
echo $renderer->render();
```
