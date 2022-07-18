<?php
    require_once '../config.php';
    use \models\{Product, ProductAttribute, Image};
    $allowed_types = [
        'image/png' => 'png',
        'image/jpeg' => 'jpg',
        'image/svg+xml' => 'svg',
        'image/avif' => 'avif',
        'image/webp' => 'webp'
    ];

  

    if(!(isset($_POST['add_product_submit']) && isset($_FILES['files']))){
        die("Bad request");
    }
    
    //Insert a product row
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_qty = $_POST['product-qty'];
    $product_category = $_POST['product-category'];
    $product_series = $_POST['product-series'];
    $product_color = $_POST['product-color'];

    $product_id = Product::add($mysqli, [
        $product_name, 
        $product_series,
        $product_price, 
        $product_qty, 
        $product_color
    ]);
    
    $file_container = [];
    $files = $_FILES['files'];


    //Zip all files
    for($i = 0; $i < count($files['name']); $i++){

        $file= $files['tmp_name'][$i]; //Actual file
        $filesize = filesize($file); //Get the file size
        $fileinfo = new finfo(FILEINFO_MIME_TYPE); // finfo instance
        $filetype = $fileinfo->file($file); // Returns the mime type
        echo 'asdasd->',$filetype, 'asd->';
        $basename = $files['name'][$i];
        
        if($dot_index = strrpos($basename, '.')){
            $basename = substr($basename, 0, $dot_index);
        }
        
        $uniq_basename = uniqid($basename);
        
        if($filesize == 0){
            die("The file is empty");
        }
        //Check if the file is in allowed types
        if(!in_array($filetype, array_keys($allowed_types))){
            die ($filename . "File is not allowed");
        }

        $temp_arr = [
            'uniq_basename' => $uniq_basename,
            'basename' => $basename,
            'filetype' => $filetype,
            'filesize' => $filesize,
            'file' => $file
        ];
        
        array_push($file_container, $temp_arr);
    }

    
    foreach($file_container  as $file){
        $extension = $allowed_types[$file['filetype']];
        $new_filepath = $product_upload_dir . "/" . $file['uniq_basename'] . '.' . $extension;
        //Insert image path to database
        
        Image::add($mysqli, [
            $file['uniq_basename'],
            $file['basename'],
            $file['filetype'],
            $file['filesize'],
            $new_filepath,
            $product_id
        ]);
        //Move to uploads folder
        
        move_uploaded_file($file['file'], $new_filepath);

    }
    echo json_encode(['done' => 1]);
?>