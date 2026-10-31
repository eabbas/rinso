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
 
 
 @if($singleAds->meta_key == "singleAds")
        <img class="w-[366px] h-[52px]"
        src="<?= asset("storage/" . $singleAds->meta_value) ?>">
 @endif