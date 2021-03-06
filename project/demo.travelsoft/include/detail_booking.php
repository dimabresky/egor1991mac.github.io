
<?$GLOBALS["arFilterStaff"] = array("ID"=>$GLOBALS['manager']);?>
<?$APPLICATION->IncludeComponent(
	"travelsoft:travelsoft.news.list",
	"staff_detail",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AFP_106" => "",
		"AFP_107" => "",
		"AFP_108" => "",
		"AFP_110" => "",
		"AFP_113" => "",
		"AFP_114" => "",
		"AFP_116" => "",
		"AFP_124" => "",
		"AFP_125" => "",
		"AFP_137" => "",
		"AFP_197" => "",
		"AFP_ID" => "",
		"AFP_MAX_111" => "",
		"AFP_MAX_112" => "",
		"AFP_MAX_117" => "",
		"AFP_MAX_130" => "",
		"AFP_MIN_111" => "",
		"AFP_MIN_112" => "",
		"AFP_MIN_117" => "",
		"AFP_MIN_130" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "Y",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "staff_detail",
		"DESCRIPTION_LINK" => "/blog/",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "DETAIL_TEXT",
			3 => "SHOW_COUNTER",
			4 => "DATE_CREATE",
			5 => "",
		),
		"FILTER_NAME" => "arFilterStaff",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "20",
		"IBLOCK_TYPE" => "company",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Блог",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "PHONE",
			1 => "POSITION",
			2 => "OFFICE",
			3 => "PICTURES",
			4 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"TEXT_DESCRIPTION" => "",
		"TEXT_TITLE" => "Блог",
		"AFP_280" => array(
		)
	),
	false
);?>


<!--            <noindex>-->
<!--               --><?//
//                  $APPLICATION->IncludeComponent("bitrix:main.share", "flat", array(
//                  			"SHARE_HANDLERS" => array(
//                  				0 => "facebook",
//                  				1 => "vk",
//                  			),
//                  		"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
//                  		"PAGE_TITLE" => $arResult["~NAME"],
//                  		"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
//                  		"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
//                  		"HIDE" => $arParams["SHARE_HIDE"],
//                  	),
//                  	$component,
//                  	array("HIDE_ICONS" => "Y")
//                  );
//                  ?>
<!--            </noindex>-->