<?php
/******************************************************************************/
//                                                                            //
//                           InstantCMS v1.10.6                               //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2015                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

session_start();

if (!isset($_SESSION['p_kcaptcha'])) { $_SESSION['p_kcaptcha'] = array(); }

if (!isset($_GET['id'])){ die; }
$captcha_id = trim($_GET['id']);

if (!preg_match('/^[0-9a-f]{32}$/i', $captcha_id)){ die; }

include('kcaptcha.php');
$captcha = new KCAPTCHA();

$_SESSION['p_kcaptcha'][$captcha_id] = $captcha->getKeyString();