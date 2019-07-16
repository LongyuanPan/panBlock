<!DOCTYPE html>
<html lang="">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>极验滑块拖动验证码-码农社区-web视频分享网</title>
        <script type="text/javascript" src="imgValidate/tn_code.js?v=35"></script>
          <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="imgValidate/style.css?v=27" />
    <style type="text/css"></style>
</head>
<body style="text-align:center;">
<div class="tncode" style="text-align: center;margin: 100px auto;"></div>
<script type="text/javascript">
    $TN.onsuccess(function(){
        $.ajax({
            type: 'get',
            url: '../test2',
            data: {},
            dataType: 'json',
            success: (res) => {
                if (res.code == 200) {
                    alert(res.msg)
                } else {
                    alert(res.msg)
                }
            },
            complete: () => {
                layer.close(load)
            }
        })
    });
</script> 
</body> 