<?php
defined('is_running') or die('Not an entry point...');
$fileVersion = '4.3.4';
$fileModTime = '1425208319';
$file_stats = array (
  'created' => 1425205879,
  'gpversion' => '4.3.4',
  'modified' => 1425208319,
  'username' => 'Kotek',
);

$config = array (
  'language' => 'pl',
  'toemail' => 'adriannakoszowska@gmail.com',
  'gpLayout' => 'default',
  'title' => 'Portfolio Adrianna Koszowska',
  'keywords' => 'portfolio, graphic, design, identity, brand, branding, identyfikacja, logotype, logo, ',
  'desc' => 'Grafiką zajmuję się od wielu lat, począwszy od prostych elementów w pakiecie Adobe takich jak przeróbka zdjęć i poszerzanie wiedzy o grafice rastrowej, ostatecznie dochodząc do umiejętności i fascynacji tworzeniem grafiki wektorowej. Zdobyta wiedza pozwala mi na: projektowanie logotypów, wizytówek i elementów identyfikacyjnych firm i osób prywatnych. Wszystkie prace tworzę sumiennie i rzetelnie, co zapewnia zadowolenie klientów. ',
  'timeoffset' => '0',
  'langeditor' => 'pl',
  'dateformat' => '%m/%d/%y - %I:%M %p',
  'gpversion' => '4.3.4',
  'passhash' => 'sha512',
  'gpuniq' => 's8VmlTnV344sxjZTW3V0',
  'combinecss' => true,
  'combinejs' => true,
  'etag_headers' => true,
  'file_count' => 6,
  'maximgarea' => '691200',
  'maxthumbsize' => '100',
  'check_uploads' => false,
  'colorbox_style' => 'example2',
  'customlang' => 
  array (
  ),
  'showgplink' => true,
  'showsitemap' => true,
  'showlogin' => true,
  'auto_redir' => '90',
  'resize_images' => true,
  'jquery' => 'local',
  'addons' => 
  array (
    'msa96vk' => 
    array (
      'code_folder_part' => '/data/_addoncode/msa96vk',
      'data_folder' => 'msa96vk',
      'name' => 'Nivo Slider for gp|Easy',
      'version' => '1.0.4',
      'id' => '166',
      'remote_install' => true,
    ),
    'f6g8rxb' => 
    array (
      'code_folder_part' => '/data/_addoncode/f6g8rxb',
      'data_folder' => 'f6g8rxb',
      'name' => 'EasyNewsLetter',
      'version' => '1.1.1',
      'id' => '258',
      'remote_install' => true,
      'editable_text' => 'Text.php',
    ),
  ),
  'themes' => 
  array (
  ),
  'gadgets' => 
  array (
    'Contact' => 
    array (
      'script' => '/include/special/special_contact.php',
      'class' => 'special_contact_gadget',
    ),
    'Search' => 
    array (
      'script' => '/include/special/special_search.php',
      'method' => 
      array (
        0 => 'special_gpsearch',
        1 => 'gadget',
      ),
    ),
    'Nivo_Slider' => 
    array (
      'addon' => 'msa96vk',
      'script' => '/data/_addoncode/msa96vk/Gadget.php',
      'class' => 'Gadget_Nivo_Slider',
      'disabled' => true,
    ),
    'EasyNewsLetter' => 
    array (
      'addon' => 'f6g8rxb',
      'script' => '/data/_addoncode/f6g8rxb/Gadget/Subscribe.php',
      'class' => 'EasyNewsLetter_Subscribe_Gadget',
      'disabled' => true,
    ),
  ),
  'hooks' => 
  array (
    'GetHead' => 
    array (
      'f6g8rxb' => 
      array (
        'addon' => 'f6g8rxb',
        'script' => '/data/_addoncode/f6g8rxb/Hook/GetHead.php',
        'class' => 'EasyNewsLetter_GetHead',
      ),
    ),
  ),
  'homepath_key' => 'a',
  'homepath' => 'Home',
  'HTML_Tidy' => '',
  'Report_Errors' => false,
  'toname' => 'Adrianna',
  'from_address' => 'adriannakoszowska@gmail.com',
  'from_name' => 'Adrianna Koszowska',
  'from_use_user' => true,
  'require_email' => 'email',
  'mail_method' => 'smtp',
  'sendmail_path' => '',
  'smtp_hosts' => 'ssl://smtp.gmail.com:465',
  'smtp_user' => 'adriannakoszowska@gmail.com',
  'smtp_pass' => 'szokowska1312',
  'recaptcha_public' => '',
  'recaptcha_private' => '',
  'recaptcha_language' => 'inherit',
  'admin_links' => 
  array (
    'Admin_Nivo_Slider' => 
    array (
      'label' => 'Nivo Slider Config',
      'addon' => 'msa96vk',
      'script' => '/data/_addoncode/msa96vk/Admin.php',
      'class' => 'Admin_Nivo_Slider',
    ),
    'Admin_EasyNewsLetter_EditConfig' => 
    array (
      'label' => 'Edit Config',
      'addon' => 'f6g8rxb',
      'script' => '/data/_addoncode/f6g8rxb/Admin/EditConfig/EditConfig.php',
      'class' => 'EasyNewsLetter_EditConfig',
    ),
    'Admin_EasyNewsLetter_EmailList' => 
    array (
      'label' => 'Email List',
      'addon' => 'f6g8rxb',
      'script' => '/data/_addoncode/f6g8rxb/Admin/EmailList/EmailList.php',
      'class' => 'EasyNewsLetter_EmailList',
    ),
    'Admin_EasyNewsLetter_Mailing' => 
    array (
      'label' => 'Mailing Form',
      'addon' => 'f6g8rxb',
      'script' => '/data/_addoncode/f6g8rxb/Admin/Mailing/Mailing.php',
      'class' => 'EasyNewsLetter_Mailing',
    ),
  ),
);

