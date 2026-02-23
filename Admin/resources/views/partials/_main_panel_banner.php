 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <!-- <h2 class="mt-20">Upload Image</h2> -->
        <!-- The form for submission -->
        <form action="../../Admin/app/Http/Controllers/sliders/slider_controller.php" method="POST" enctype="multipart/form-data">
            <div class="mt-20">
                <label for="imageInput" class="form-label">Select Image File</label>
                <!-- File input field with Bootstrap class -->
                <input class="form-control" type="text" name="title" placeholder="Slider Title">
            </div>
            <!-- Image preview area -->
            <div class="mb-3">
             <input type="file" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-success">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </form>
    </div>

    <!-- Include Bootstrap JS (optional, for some components) -->
    <script src="https://cdn.jsdelivr.net" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1oYwzqcXq6gof7Wq2z" crossorigin="anonymous"></script>
    <!-- Include the JavaScript for live preview -->
    <script src="path/to/your/script.js"></script>
</body>
</html>




