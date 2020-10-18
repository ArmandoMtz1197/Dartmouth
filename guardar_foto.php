<?php
//Carga imagen
$imagenCodificada = file_get_contents("php://input");
if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
$imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));

$imagenDecodificada = base64_decode($imagenCodificadaLimpia);

$nombreImagenGuardada = "foto.jpg";
file_put_contents($nombreImagenGuardada, $imagenDecodificada);

include_once 'aws/aws-autoloader.php';
$bucket = 'bucket';
$credentials = new Aws\Credentials\Credentials('key', 'key');

//S3
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
try {
	$s3 = new Aws\S3\S3Client([
    	'version'     => 'latest',
    	'region'      => 'us-east-2',
    	'credentials' => $credentials
	]);

    $result = $s3->putObject([
        'Bucket' => $bucket,
        'Key'    => "foto",
        'SourceFile' => 'C:\xampp\htdocs\bbva\foto.jpg',
    ]);
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

//Rekognition
use Aws\Rekognition\RekognitionClient;
use Aws\Rekognition\Exception;
try {
	$client = new Aws\Rekognition\RekognitionClient([
    	'version'     => 'latest',
    	'region'      => 'us-east-2',
    	'credentials' => $credentials
	]);

    $result = $client->searchFacesByImage([
	    'CollectionId' => 'bbva-faces', 
	    'FaceMatchThreshold' => 80,
	    'Image' => [
	        'S3Object' => [
	            'Bucket' => $bucket,
	            'Name' => 'foto',
	        ],
	    ],
	    'QualityFilter' => 'MEDIUM',
	]);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

$data = $result['FaceMatches'];
exit($data[0]['Face']['ExternalImageId']);
?>