<?php
/* ------------------------------------------------------------------------
  # Jootstrap - Twitter's Bootstrap for Joomla (with RocketTheme's Gantry administration)
  # ------------------------------------------------------------------------
  # author    Prieco S.A.
  # copyright Copyright (C) 2012 Prieco.com. All Rights Reserved.
  # @license - http://http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
  # Websites: http://www.prieco.com
  # Technical Support:  Forum - http://www.prieco.com/en/forum/index.html
  ------------------------------------------------------------------------- */


// no direct access
defined('_JEXEC') or die('Restricted index access');

$jspath = $this->baseurl . '/templates/' . $this->template . '/js';
$imgpath = $this->baseurl . '/templates/' . $this->template . '/images';
$lesspath = $this->baseurl . '/templates/' . $this->template . '/css/less';

$gridsystem = $gantry->get('gridsystem');
$gridrows = ($gridsystem == '' ? 9 : 12);

$responsive = $gantry->get('responsive');

$lesscompiler = $gantry->get('lesscompiler');

$docscss = $gantry->get('docscss');

$minified = $gantry->get('minified');

$jquery = $gantry->get('jquery');
$gantry->displayHead();

$cssfiles = ($minified ? array('bootstrap.min.css') : array('bootstrap.css'));
if ($gridrows == 12) {
    $cssfiles[] = ($minified ? 'bootstrap-responsive.min.css' : 'bootstrap-responsive.css');
}

if ($responsive) {
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>\n";
}

if ($docscss)
    $cssfiles[] = ($minified ? 'docs.min.css' : 'docs.css');

//bootstrap files should be included before *-override.css (priority < 5)
$gantry->addStyles($cssfiles, 4);
?>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src=\\"//html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->

<link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link rel="apple-touch-icon" href="<?php echo $imgpath; ?>/apple-touch-icon-iphone.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $imgpath; ?>/apple-touch-icon-ipad.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $imgpath; ?>/apple-touch-icon-114x114.png"/>
<?php
if ($lesscompiler) {
    echo "<link rel=\"stylesheet/less\" type=\"text/css\" href=\"" . $lesspath . "/styles.less\"/>\n";
    echo "<script src=\"" . $jspath . "/less.min.js\" type=\"text/javascript\"></script>";
}
