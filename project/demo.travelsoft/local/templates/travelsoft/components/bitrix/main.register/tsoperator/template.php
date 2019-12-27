<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */
/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

CJSCore::Init(['popup', 'ajax', 'date']);
?>
<div class="bx-auth-reg">

    <? if ($USER->IsAuthorized()): ?>

        <p><? echo GetMessage("MAIN_REGISTER_AUTH") ?></p>

    <? else: ?>
        <?
        if (count($arResult["ERRORS"]) > 0):
            foreach ($arResult["ERRORS"] as $key => $error)
                if (intval($key) == 0 && $key !== 0)
                    $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);

            ShowError(implode("<br />", $arResult["ERRORS"]));

        elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
            ?>
            <p><? echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT") ?></p>
        <? endif ?>

            <form method="post" action="<?= $APPLICATION->GetCurPageParam('', ['backurl'])?>" id="regform" name="regform" enctype="multipart/form-data">

                <input type="hidden" name="backurl" value="/tspersonal/profile/" />

            <div class="form-group">
                <div class="radio">
                    <label>Я клиент <input <? if (!$_REQUEST["is_agent"] || $_REQUEST["is_agent"] !== "N"): ?>checked=""<? endif ?> type="radio" name="is_agent" value="N"></label>
                </div>
                <div class="radio">
                    <label>Я агент <input  <? if ($_REQUEST["is_agent"] && $_REQUEST["is_agent"] === 'Y'): ?>checked=""<? endif ?> type="radio" name="is_agent" value="Y"></label>
                </div>
            </div>
            <div id="agent-fields-box" <? if (!$_REQUEST["is_agent"] || $_REQUEST["is_agent"] !== "Y"): ?>class="hidden"<? endif ?>>
                <div class="form-group ">

                    <?
                    Bitrix\Main\Loader::includeModule('travelsoft.travelbooking');
                    ?>
                    <input name="UF_AGENCY" value="<?= ($_POST['UF_AGENCY'] ? intval($_POST['UF_AGENCY']) : '') ?>" type="hidden">

                    <label><?= GetMessage('REGISTER_AGENCY_UNP_TITLE') ?> <span class="starrequired">*</span></label>:
                    <input data-ajax-url="<?= $templateFolder ?>/ajax.php" name="AGENCY_UNP" value="<?= ($_POST['AGENCY_UNP'] ? $_POST['AGENCY_UNP'] : '') ?>" type="text" class="form-control">
                    <div id="agency-name-block" <? if (!$_POST['UF_AGENCY']): ?>class="hidden"<? endif ?>>
                        <label><?= GetMessage('REGISTER_AGENCY_NAME_TITLE') ?> <span class="starrequired">*</span></label>:
                        <input data-ajax-url="<?= $templateFolder ?>/ajax.php" name="AGENCY_NAME" value="<?= ($_POST['AGENCY_NAME'] ? $_POST['AGENCY_NAME'] : '') ?>" type="text" class="form-control">
                    </div>
                    <b class="agency-name"></b>
                </div>
            </div>
            <?
            $key_email = array_search("EMAIL", $arResult["SHOW_FIELDS"]);
            if ($key_email !== false) {
                unset($arResult["SHOW_FIELDS"][$key_email]);
                array_unshift($arResult["SHOW_FIELDS"], "EMAIL");
            }
            foreach ($arResult["SHOW_FIELDS"] as $FIELD):
                ?>
                <? if ($FIELD === "LOGIN"): ?>
                    <input name="REGISTER[LOGIN]" value="<?= $arResult["VALUES"][$FIELD] ?>" type="hidden">
                    <?
                    continue;
                endif
                ?>

                <div class="form-group">
                    <label><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:<? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?><span class="starrequired">*</span><? endif ?></label>
                    <?
                    switch ($FIELD) {
                        case "PASSWORD":
                            ?><input size="30" type="password" name="REGISTER[<?= $FIELD ?>]" value="<?= $arResult["VALUES"][$FIELD] ?>" autocomplete="off" class="form-control bx-auth-input" />
                            <? if ($arResult["SECURE_AUTH"]): ?>
                                <span class="bx-auth-secure" id="bx_auth_secure" title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
                                    <div class="bx-auth-secure-icon"></div>
                                </span>
                                <noscript>
                                <span class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
                                    <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                </span>
                                </noscript>
                                <script type="text/javascript">
                                    document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                </script>
                            <? endif ?>
                            <?
                            break;
                        case "CONFIRM_PASSWORD":
                            ?><input class="form-control" size="30" type="password" name="REGISTER[<?= $FIELD ?>]" value="<?= $arResult["VALUES"][$FIELD] ?>" autocomplete="off" /><?
                            break;

                        case "PERSONAL_GENDER":
                            ?><select class="form-control" name="REGISTER[<?= $FIELD ?>]">
                                <option value=""><?= GetMessage("USER_DONT_KNOW") ?></option>
                                <option value="M"<?= $arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : "" ?>><?= GetMessage("USER_MALE") ?></option>
                                <option value="F"<?= $arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : "" ?>><?= GetMessage("USER_FEMALE") ?></option>
                            </select><?
                            break;

                        case "PERSONAL_COUNTRY":
                        case "WORK_COUNTRY":
                            ?><select class="form-control" name="REGISTER[<?= $FIELD ?>]"><?
                            foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value) {
                                ?><option value="<?= $value ?>"<? if ($value == $arResult["VALUES"][$FIELD]): ?> selected="selected"<? endif ?>><?= $arResult["COUNTRIES"]["reference"][$key] ?></option>
                                    <?
                                }
                                ?></select><?
                            break;

                        case "PERSONAL_PHOTO":
                        case "WORK_LOGO":
                            ?><input class="form-control" size="30" type="file" name="REGISTER_FILES_<?= $FIELD ?>" /><?
                                break;

                            case "PERSONAL_NOTES":
                            case "WORK_NOTES":
                                ?><textarea class="form-control" cols="30" rows="5" name="REGISTER[<?= $FIELD ?>]"><?= $arResult["VALUES"][$FIELD] ?></textarea><?
                            break;
                        default:
                            if ($FIELD == "PERSONAL_BIRTHDAY"):
                                ?><small><?= $arResult["DATE_FORMAT"] ?></small><br /><? endif;
                            ?><input <? if ($FIELD === "PERSONAL_PHONE"): ?>data-alert-text="<?= GetMessage("REGISTER_WRONG_FRONT_PHONE") ?>" data-phone-reg="<?
                                \Bitrix\Main\Loader::includeModule("travelsoft.travelbooking");
                                echo str_replace("#", "", travelsoft\booking\Settings::PHONE_REG)
                                ?>" type="phone" placeholder="+375(xx) xxx xx xx"<? elseif ($FIELD === "EMAIL"): ?>type="email" data-alert-text="<?= GetMessage("REGISTER_WRONG_FRONT_EMAIL") ?>"<? else: ?>type="text"<? endif ?> class="form-control" size="30" name="REGISTER[<?= $FIELD ?>]" value="<?= $arResult["VALUES"][$FIELD] ?>" /><?
                                                                          if ($FIELD == "PERSONAL_BIRTHDAY")
                                                                              $APPLICATION->IncludeComponent(
                                                                                      'bitrix:main.calendar', '', array(
                                                                                  'SHOW_INPUT' => 'N',
                                                                                  'FORM_NAME' => 'regform',
                                                                                  'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
                                                                                  'SHOW_TIME' => 'N'
                                                                                      ), null, array("HIDE_ICONS" => "Y")
                                                                              );
                                                                          ?><? }
                                                                  ?>
                </div>
            <? endforeach ?>

            <?
            /* CAPTCHA */
            if ($arResult["USE_CAPTCHA"] == "Y") {
                ?>
                <div class="form-group">
                    <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>" />
                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" />
                    <br>
                    <label><?= GetMessage("REGISTER_CAPTCHA_PROMT") ?>:<span class="starrequired">*</span></label>
                    <input class="form-control" type="text" name="captcha_word" maxlength="50" value="">
                </div>
                <?
            }
            /* !CAPTCHA */
            ?>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="register_submit_button" value="<?= GetMessage("AUTH_REGISTER") ?>" /><?= GetMessage("AUTH_REGISTER") ?></button>
            </div>
            <p><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>
            <p><span class="starrequired">*</span><?= GetMessage("AUTH_REQ") ?></p>

        </form>
    <? endif ?>
</div>