<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/travelsoft.jquery.js");
?>
<main>

    <div class="background-img-container section-pt-10">
        <?if(!empty($APPLICATION->GetDirProperty("URL_BG_TITLE_BLOCK"))):?>
            <picture>
                <img loading="lazy" src="<?=$APPLICATION->GetDirProperty("URL_BG_TITLE_BLOCK")?>" class="background-img-fixed" style="z-index: -1;" alt="">
            </picture>

        <?else:?>
            <picture>
                <img loading="lazy" src="<?= SITE_TEMPLATE_PATH ?>/img/4.png" class="background-img-fixed" style="z-index: -1;" alt="">
            </picture>

        <?endif;?>

        <div class="row section-py-10">
            <div class="container">
                <h1 class="h1 mb-0 text-center  text-white">
                    <?= $APPLICATION->ShowTitle(false) ?>
                </h1>
                <h1 class="theme-page-header-title"></h1>

                <div class="mx-auto d-flex w-50 align-items-center justify-content-center mb-2 flex-column flex-lg-row">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "template2",
                        array(
                                "VAR" => "hell world",
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => "0",
                            "COMPONENT_TEMPLATE" => "template",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",

                        ),
                        false
                    );?>

                </div>

            </div>
        </div>
        <div class="row bg-white py-5">
            <div class="container">
                <div class="row justify-content-center">


                        <?
                        $template = "blog";
                        ?>
                        <?$APPLICATION->IncludeComponent(
                            "travelsoft:travelsoft.news.list",
                            $arParams["TEMPLATE_LIST"],
                            Array(
                                "_REQUEST" => $_REQUEST,
                                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                                "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                                "SORT_BY1" => $arParams["SORT_BY1"],
                                "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                                "SORT_BY2" => $arParams["SORT_BY2"],
                                "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                                "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                                "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                                "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                                "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                                "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                                "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                                "SET_TITLE" => $arParams["SET_TITLE"],
                                "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                                "MESSAGE_404" => $arParams["MESSAGE_404"],
                                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                                "SHOW_404" => $arParams["SHOW_404"],
                                "FILE_404" => $arParams["FILE_404"],
                                "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                                "CACHE_TIME" => $arParams["CACHE_TIME"],
                                "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                                "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                                "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                                "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                                "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                                "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                                "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => 0,
                                "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                                "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                                "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                                "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                                "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                                "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                                "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                                "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                                "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                                "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                                "FILTER_NAME" => $arParams["FILTER_NAME"],
                                "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                                "CHECK_DATES" => $arParams["CHECK_DATES"],
                            ),
                            $component
                        );?>


            </div>
        </div>
    </div>
</main>



