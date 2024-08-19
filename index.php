<?php
function instagramGetPost()
{
    $token = "IGQWRNNDloZAHl5UnpIc0JlbmhGTnhtTjBBaWRQbF9IVEZAsdlEtSXY1bkljQlJicUVibDBIUHktWE1BQ1d5QkNCRm5XdlJFTWMtYjVBSkljWDhETzhudXhOd3hLVzdoN3VMV2lLZAXRLSTU1RVc2VzdESlhQQmoyWWcZD";
    $url = "https://graph.instagram.com/me/media?fields=thumbnail_url,media_type,media_url,username,permalink,timestamp,caption&access_token=$token";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $request = curl_exec($curl);
    curl_close($curl);
    $request = json_decode($request, true);
    return $request;
}


$media = instagramGetPost();


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>İnstagram Feed</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php foreach ($media['data'] as $k => $v) : ?>
                <div class="col-md-3">
                    <a href="<?php echo $v['permalink'] ?>" target="_blank">
                        <img src="<?= $v['media_url'] ?>" class="w-100">
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>