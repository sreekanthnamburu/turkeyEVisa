<!DOCTYPE HTML>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if !IE]><!--><html lang="en-US"><!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
<title>Contact form</title>
<link rel="stylesheet" type="text/css" href="css/pagestyles.css" />
<link rel="stylesheet" type="text/css" href="css/standard.css" />
</head>
<body>
<div class="outside">
    <div class="iphorm-outer">
        <div class="iphorm-wrapper">
            <div class="iphorm-inner">
                <?php if (isset($result) && is_array($result) && array_key_exists('type', $result)) : ?>
                    <?php if ($result['type'] == 'error') : ?>
                        <div class="form-title">Please go back and correct these errors</div>
                        <ul class="errors-no-js">
                            <?php foreach ($result['data'] as $name => $info) : ?>
                                <?php if (count($info['errors']) > 0) :  ?>
                                    <li><?php echo $this->escape($info['label']); ?><ul><li><?php echo $this->escape($info['errors'][0]); ?></li></ul></li>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    <?php elseif ($result['type'] == 'message' || $result['type'] == 'success') : ?>
                        <?php echo $result['data']; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
         </div>
    </div>
</div>
</body>
</html>