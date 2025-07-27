    <!-- resources/views/maintenance.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Site Under Maintenance</title>
        <style>
            body { font-family: sans-serif; text-align: center; padding-top: 50px; }
            h1 { font-size: 3em; }
            p { font-size: 1.2em; }
        </style>
    </head>
    <body>
        <h1>We'll be back soon!</h1>
        <p>Our website is currently undergoing scheduled maintenance. Please check back shortly.</p>
        @if (isset($exception) && $exception->getMessage())
            <p>{{ $exception->getMessage() }}</p>
        @endif
    </body>
    </html>
    