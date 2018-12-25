<!DOCTYPE html>
<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx94937c2efc6f254e", "f2b2706e6bf74267258d92ba0793c91d");
$signPackage = $jssdk->GetSignPackage();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>北京天气</title> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>

</head>
<body>

<div data-role="page" id="pageone" data-theme="a">
  <div data-role="header" data-theme="b">
    <h1>北京天气</h1>
  </div> 
  <div data-role="content">
    <div class="ui-grid-a">
     <div class="ui-block-a">
       <img src="sun3.png" >
     </div>
     <div class="ui-block-b">
       <h2>今天 星期二</h2>
       <h1>-5℃～11℃</h1>
       <h2>晴朗</h2>
       <h2>微风</h2>
       <p>今天15:13发布</p>
       <p>湿度:57%</p>
     </div>
   </div>
   </div>
</div> 

</body>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
    'getLocation'
    ]
  });
  
    var latitude = 0.0;
    var longitude = 0.0;

  wx.ready(function () {
    // 在这里调用 API
	wx.getLocation({
            type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
            success: function (res) {
                latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                alert("latitude:" + latitude + "longitude:" + longitude);
            }
        });
    });

</script>
</html>
