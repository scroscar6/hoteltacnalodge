<head>
<meta charSet="utf-8"/>
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" data-testid="viewport"/>
<title><?php echo $ssTitle;?></title>
<meta name="description" content="<?php echo empty($ssMetaDesc) ? $Config_MetaDesc : $ssMetaDesc.".";?>">
<meta name="keywords" content="<?php echo $ssTitle;?>">
<meta name="author" content="<?php echo $ssTitle;?>">
<meta name="robots" content="INDEX,FOLLOW">
<link rel="stylesheet" type="text/css" href="<?php echo $URLBase;?>/core.css">
<link rel="icon" type="image/png" href="<?php echo $URLBase;?>/favicon.png" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php if (false): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js" integrity="sha512-5pjEAV8mgR98bRTcqwZ3An0MYSOleV04mwwYj2yw+7PBhFVf/0KcE+NEox0XrFiU5+x5t5qidmo5MgBkDD9hEw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php endif ?>


<link href="<?php echo $URLBase; ?>/js/lobibox-master/dist/css/lobibox.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $URLBase; ?>/js/formvalidation/dist/css/formValidation.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $URLBase; ?>/js/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $URLBase; ?>/js/rrsb/dist/social-buttons.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $URLBase; ?>/js/jquery-steps-master/demo/css/jquery.steps.css" rel="stylesheet" type="text/css" />
<!--
<link type="text/css" rel="stylesheet" href="<?php echo $URLBase;?>/js/sweetalert-master/dist/sweetalert.css">

<script type="text/javascript" src="<?php echo $URLBase;?>/js/sweetalert-master/dist/sweetalert.min.js"></script>-->
<script src="<?php echo $URLBase; ?>/js/lobibox-master/dist/js/lobibox.min.js" type="text/javascript"></script>
<script src="<?php echo $URLBase; ?>/js/lobibox-master/dist/js/messageboxes.min.js" type="text/javascript"></script>
<script src="<?php echo $URLBase; ?>/js/lobibox-master/dist/js/notifications.min.js" type="text/javascript"></script>
<script src="<?php echo $URLBase; ?>/js/formvalidation/dist/js/formValidation.min.js" type="text/javascript"></script>
<script src="<?php echo $URLBase; ?>/js/formvalidation/dist/js/framework/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $URLBase; ?>/js/formvalidation/dist/js/language/es_ES.js" type="text/javascript"></script>
<script src="<?php echo $URLBase; ?>/js/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo $URLBase; ?>/js/rrsb/dist/social-buttons.js" type="text/javascript" charset="utf-8" ></script>

<link rel="stylesheet" type="text/css" href="<?php echo $URLBase;?>/style.css">


<link href="<?php echo $URLBase; ?>/js/air/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo $URLBase; ?>/js/air/dist/js/datepicker.min.js"></script>
<script src="<?php echo $URLBase; ?>/js/air/dist/js/i18n/datepicker.es.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="<?php echo $URLBase; ?>/js/wan-spinner.js"></script>

<script>let URLBASE = '<?php echo $URLBase;?>';</script>

<meta property="fb:app_id" content=""/>
<meta property="og:type"  content="website" />
<meta property="og:image" content="<?php echo $ogimage;?>" />
<meta property="og:title" content="<?php echo $ssTitle;?>" />
<meta property="og:description" content="<?php echo empty($ssMetaDesc) ? $Config_MetaDesc : $ssMetaDesc.".";?>" />
<meta property="og:url" content="<?php echo dameURL();?>" />
<meta property="og:site_name" content="<?php echo $Config_NombreSitio;?>" />
<?php
$ObjConfig =  new ClsConfig();
$ObjConfig->ActualizarVisitas();
?>

</head>