# EJS Templating Engine in PHP

This project is an EJS templating engine implemented in PHP. It allows you to use templates with a syntax similar to EJS (Embedded JavaScript) for rendering dynamic content on the server-side.

## Features

- Variable interpolation with `<%= ... %>`
- Control structures: `if`, `else`, `for` loops
- Partial template inclusion with `<% include ... %>`

## Getting Started

### Prerequisites

- PHP 7.0 or higher
- Composer (for installing dependencies)

### Installation

1. Clone this repository to your local machine or download the ZIP file and extract it.


### Usage

1. Create your EJS-like templates with a `.ejs.php` extension inside the "templates" directory. For example, you can create a file named `sample.ejs.php` with the following content:

```php
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <?php if ($showHeading): ?>
        <h1><?php echo $heading; ?></h1>
    <?php endif; ?>
    <p><?php echo $content; ?></p>
    <ul>
        <?php foreach ($list as $item): ?>
            <li><?php echo $item; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```


## Contributing

Contributions are welcome! If you find a bug, have a suggestion, or want to add a new feature, please open an issue or submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

2. Use the EJS renderer in your PHP code:

```php
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
<small>
    Parts of this code are AI generated, keeping risks onn security in mind please refrain from using this in production
</small>
