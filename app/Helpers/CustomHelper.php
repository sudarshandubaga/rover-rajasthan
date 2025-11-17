<?php

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

function dataUriToImage($dataUri, $dir = '')
{
    @list($type, $image) = explode(';base64,', $dataUri);
    $extension = substr($type, 11, strlen($type));

    // $image = $imageArr[1];
    $image = str_replace(' ', '+', $image);
    $data = base64_decode($image);

    $fileName = $dir . "/" . uniqid() . "." . $extension;


    Storage::disk("public")->put($fileName, $data);

    return $fileName;
}


function createEntryPaas($user, $type = "exhibitor")
{

    $mobile = $type == "visitor" ? $user->mobile : $user->phone;
    $dir =  public_path() . "/images/{$type}/{$user->id}/";
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $qrImagePath = $dir . "qrimage.png"; // Define the path where you want to save the QR code image

    QrCode::format("png")->size(256)->generate(
        "Name: {$user->name}   \nCompany Name: {$user->company_name}   \nPhone: {$mobile}   \nEmail: {$user->email}",
        $qrImagePath
    );

    list($new_width, $new_height, $new_type, $new_attr) = getimagesize($qrImagePath);
    switch (image_type_to_mime_type($new_type)) {
        case 'image/gif':
            $new = imagecreatefromgif($qrImagePath);
            break;
        case 'image/jpeg':
            $new = imagecreatefromjpeg($qrImagePath);
            break;
        case 'image/png':
            $new = imagecreatefrompng($qrImagePath);
            break;
        default:
            die('Unsupported image type');
    }

    $master = imagecreatefromjpeg(public_path() . "/images/sample-{$type}.jpg");


    imagealphablending($master, false);
    imagesavealpha($master, true);

    // Define the coordinates and dimensions for the QR code on the master image
    $box_x = 320; // Adjust as needed
    $box_y = 810; // Adjust as needed
    $box_w = $new_width; // Adjust as needed
    $box_h = $new_height; // Adjust as needed

    imagecopymerge($master, $new, $box_x, $box_y, 0, 0, $box_w, $box_h, 100);

    // Define text properties
    $text       = $user->name;
    $fontPath   = public_path() . '/fonts/Poppins-Bold.ttf'; // Update with the path to your .ttf font file
    $fontSize   = 50;
    $textColor  = imagecolorallocate($master, 0, 0, 0); // black text

    // Get image dimensions
    $imageWidth = imagesx($master);
    $imageHeight = imagesy($master);

    // Calculate text bounding box
    $bbox = imagettfbbox($fontSize, 0, $fontPath, $text);
    $textWidth = $bbox[2] - $bbox[0];
    $textHeight = $bbox[1] - $bbox[7];

    // Calculate text position to center it
    $textX = ($imageWidth - $textWidth) / 2;
    $textY = ($imageHeight - $textHeight) / 2 - $bbox[7] - 100; // Adjust for vertical alignment

    // Add text to the image
    imagettftext($master, $fontSize, 0, $textX, $textY, $textColor, $fontPath, $text);

    //save image
    // imagepng($master, "file.png");
    header('Content-Type: image/jpeg');
    // header('Content-Disposition: attachment; filename="entry-pass.jpg"');

    // Output the image
    $dir = public_path() . "/images/{$type}/{$user->id}/";
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $fileName = $dir . "entry-pass.jpg";
    imagejpeg($master, $fileName);


    imagedestroy($master);
    imagedestroy($new);
    $message = urlencode("*Welcome and Thank you. Congratulations!* You have got " . $type . " entry pass for *" . env('APP_NAME') . "*");

    $mediaUrl = asset("/images/{$type}/{$user->id}/entry-pass.jpg");

    $whatsappMsg = "https://what.leadlazy.com/api/send?number=91{$mobile}&type=media&message={$message}&media_url={$mediaUrl}&filename=entry-pass.jpg&instance_id=66CC3BFCC115E&access_token=65f551cceb03c";
    file_get_contents($whatsappMsg);

    return $whatsappMsg;
}
