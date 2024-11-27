<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropify Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify/dist/css/dropify.min.css">
    
</head>
<body>
    <div class="container">
        <h2>Dropify File Upload Example</h2>
        <input type="file" class="dropify" data-max-file-size="2M" />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>

    <script>
        // $(document).ready(function(){
        
        //     $('.dropify').dropify();
        // });
        
        $(document).ready(function() {
    console.log("Dropify initialization starting...");
    
    // Check if Dropify is defined
    if (typeof $.fn.dropify === 'function') {
        $('.dropify').dropify();  // Initialize Dropify
        console.log("Dropify initialization complete.");
    } else {
        console.error("Dropify is not loaded. Please check the inclusion of Dropify JS.");
    }
});

    </script>
</body>
</html>
