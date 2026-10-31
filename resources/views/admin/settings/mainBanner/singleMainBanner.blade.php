 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
 </head>
 <body>
    
 </body>
 </html>
 
 
 @if($mainBanner->meta_key == "mainBanner")
        <img class="w-full"
        src="<?= asset("storage/" . $mainBanner->meta_value) ?>">
 @endif