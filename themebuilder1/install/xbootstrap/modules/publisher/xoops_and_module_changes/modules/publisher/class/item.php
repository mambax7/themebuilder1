<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright       The XUUPS Project http://sourceforge.net/projects/xuups/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         Publisher
 * @since           1.0
 * @author          trabis <lusopoemas@gmail.com>
 * @author          The SmartFactory <www.smartfactory.ca>
 * @version         $Id: item.php 10728 2013-01-09 22:09:22Z trabis $
 */
defined("XOOPS_ROOT_PATH") or die("XOOPS root path not defined");
include_once dirname(__FILE__, 2) . '/include/common.php';

class PublisherItem extends XoopsObject
{
    /**
     * @var PublisherPublisher
     * @access public
     */
    public $publisher = null;
    /**
     * @var PublisherCategory
     * @access public
     */
    public $_category = null;

    /**
     * @param int|null $id
     */
    public function __construct($id = null)
    {
        $this->publisher = PublisherPublisher::getInstance();
        $this->db        = XoopsDatabaseFactory::getDatabaseConnection();
        $this->initVar("itemid", XOBJ_DTYPE_INT, 0);
        $this->initVar("categoryid", XOBJ_DTYPE_INT, 0, false);
        $this->initVar("title", XOBJ_DTYPE_TXTBOX, '', true, 255);
        $this->initVar("subtitle", XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar("summary", XOBJ_DTYPE_TXTAREA, '', false);
        $this->initVar("body", XOBJ_DTYPE_TXTAREA, '', false);
        $this->initVar("uid", XOBJ_DTYPE_INT, 0, false);
        $this->initVar("author_alias", XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar("datesub", XOBJ_DTYPE_INT, '', false);
        $this->initVar("status", XOBJ_DTYPE_INT, -1, false);
        $this->initVar("image", XOBJ_DTYPE_INT, 0, false);
        $this->initVar("images", XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar("counter", XOBJ_DTYPE_INT, 0, false);
        $this->initVar("rating", XOBJ_DTYPE_OTHER, 0, false);
        $this->initVar("votes", XOBJ_DTYPE_INT, 0, false);
        $this->initVar("weight", XOBJ_DTYPE_INT, 0, false);
        $this->initVar("dohtml", XOBJ_DTYPE_INT, 1, true);
        $this->initVar("dosmiley", XOBJ_DTYPE_INT, 1, true);
        $this->initVar("doimage", XOBJ_DTYPE_INT, 1, true);
        $this->initVar("dobr", XOBJ_DTYPE_INT, 1, false);
        $this->initVar("doxcode", XOBJ_DTYPE_INT, 1, true);
        $this->initVar("cancomment", XOBJ_DTYPE_INT, 1, true);
        $this->initVar("comments", XOBJ_DTYPE_INT, 0, false);
        $this->initVar("notifypub", XOBJ_DTYPE_INT, 1, false);
        $this->initVar("meta_keywords", XOBJ_DTYPE_TXTAREA, '', false);
        $this->initVar("meta_description", XOBJ_DTYPE_TXTAREA, '', false);
        $this->initVar("short_url", XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar("item_tag", XOBJ_DTYPE_TXTAREA, '', false);
        // Non consistent values
        $this->initVar("pagescount", XOBJ_DTYPE_INT, 0, false);
        if (isset($id)) {
            $item = $this->publisher->getHandler('item')
                                    ->get($id);
            foreach ($item->vars as $k => $v) {
                $this->assignVar($k, $v['value']);
            }
        }
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        $arg = $args[0] ?? null;
        return $this->getVar($method, $arg);
    }

    /**
     * @return null|PublisherCategory
     */
    public function category()
    {
        if (!isset($this->_category)) {
            $this->_category = $this->publisher->getHandler('category')
                                               ->get($this->getVar('categoryid'));
        }
        return $this->_category;
    }

    /**
     * @param int    $maxLength
     * @param string $format
     *
     * @return mixed|string
     */
    public function title($maxLength = 0, $format = "S")
    {
        $ret = $this->getVar("title", $format);
        if ($maxLength != 0) {
            if (!XOOPS_USE_MULTIBYTES) {
                if (strlen((string) $ret) >= $maxLength) {
                    $ret = publisher_substr($ret, 0, $maxLength);
                }
            }
        }
        return $ret;
    }

    /**
     * @param int    $maxLength
     * @param string $format
     *
     * @return mixed|string
     */
    public function subtitle($maxLength = 0, $format = "S")
    {
        $ret = $this->getVar("subtitle", $format);
        if ($maxLength != 0) {
            if (!XOOPS_USE_MULTIBYTES) {
                if (strlen((string) $ret) >= $maxLength) {
                    $ret = publisher_substr($ret, 0, $maxLength);
                }
            }
        }
        return $ret;
    }

    /**
     * @param int    $maxLength
     * @param string $format
     * @param string $stripTags
     *
     * @return mixed|string
     */
    public function summary($maxLength = 0, $format = "S", $stripTags = '')
    {
        $ret = $this->getVar("summary", $format);
        if (!empty($stripTags)) {
            $ret = strip_tags((string) $ret, $stripTags);
        }
        if ($maxLength != 0) {
            if (!XOOPS_USE_MULTIBYTES) {
                if (strlen((string) $ret) >= $maxLength) {
                    //$ret = publisher_substr($ret , 0, $maxLength);
                    $ret = publisher_truncateTagSafe($ret, $maxLength, $etc = '...', $break_words = false);
                }
            }
        }
        return $ret;
    }

    /**
     * @param int  $maxLength
     * @param bool $fullSummary
     *
     * @return mixed|string
     */
    public function getBlockSummary($maxLength = 0, $fullSummary = false)
    {
        if ($fullSummary) {
            $ret = $this->summary(0, 's', '></ br>');
        } else {
            $ret = $this->summary($maxLength, 's', '></ br>');
        }
        //no summary? get body!
        if (strlen((string) $ret) == 0) {
            $ret = $this->body($maxLength, 's', '></ br>');
        }
        return $ret;
    }

    /**
     * @param string $file_name
     *
     * @return string
     */
    public function wrappage($file_name)
    {
        $content = '';
        $page    = publisher_getUploadDir(true, 'content') . $file_name;
        if (file_exists($page)) {
            // this page uses smarty template
            ob_start();
            include($page);
            $content = ob_get_contents();
            ob_end_clean();
            // Cleaning the content
            $body_start_pos = strpos($content, '<body>');
            if ($body_start_pos) {
                $body_end_pos = strpos($content, '</body>', $body_start_pos);
                $content      = substr($content, $body_start_pos + strlen('<body>'), $body_end_pos - strlen('<body>') - $body_start_pos);
            }
            // Check if ML Hack is installed, and if yes, parse the $content in formatForML
            $myts = MyTextSanitizer::getInstance();
            if (method_exists($myts, 'formatForML')) {
                $content = $myts->formatForML($content);
            }
        }
        return $content;
    }

    /**
     * This method returns the body to be displayed. Not to be used for editing
     *
     * @param int    $maxLength
     * @param string $format
     * @param string $stripTags
     *
     * @return mixed|string
     */
    public function body($maxLength = 0, $format = 'S', $stripTags = '')
    {
        $ret      = $this->getVar('body', $format);
        $wrap_pos = strpos((string) $ret, '[pagewrap=');
        if (!($wrap_pos === false)) {
            $wrap_pages       = [];
            $wrap_code_length = strlen('[pagewrap=');
            while (!($wrap_pos === false)) {
                $end_wrap_pos = strpos((string) $ret, ']', $wrap_pos);
                if ($end_wrap_pos) {
                    $wrap_page_name = substr((string) $ret, $wrap_pos + $wrap_code_length, $end_wrap_pos - $wrap_code_length - $wrap_pos);
                    $wrap_pages[]   = $wrap_page_name;
                }
                $wrap_pos = strpos((string) $ret, '[pagewrap=', $end_wrap_pos - 1);
            }
            foreach ($wrap_pages as $page) {
                $wrap_page_content = $this->wrappage($page);
                $ret               = str_replace("[pagewrap={$page}]", $wrap_page_content, (string) $ret);
            }
        }
        if ($this->publisher->getConfig('item_disp_blocks_summary')) {
            $summary = $this->summary($maxLength, $format, $stripTags);
            if ($summary) {
                $ret = $this->summary() . '' . $ret;
            }
        }
        if (!empty($stripTags)) {
            $ret = strip_tags((string) $ret, $stripTags);
        }
        if ($maxLength != 0) {
            if (!XOOPS_USE_MULTIBYTES) {
                if (strlen((string) $ret) >= $maxLength) {
                    //$ret = publisher_substr($ret , 0, $maxLength);
                    $ret = publisher_truncateTagSafe($ret, $maxLength, $etc = '...', $break_words = false);
                }
            }
        }
        return $ret;
    }

    /**
     * @param string $dateFormat
     * @param string $format
     *
     * @return string
     */
    public function datesub($dateFormat = '', $format = 'S')
    {
        if (empty($dateformat)) {
            $dateFormat = $this->publisher->getConfig('format_date');
        }
        xoops_load('XoopsLocal');
        return XoopsLocal::formatTimestamp($this->getVar('datesub', $format), $dateFormat);
    }

    /**
     * @param int $realName
     *
     * @return string
     */
    public function posterName($realName = -1)
    {
        xoops_load('XoopsUserUtility');
        if ($realName == -1) {
            $realName = $this->publisher->getConfig('format_realname');
        }
        $ret = $this->author_alias();
        if ($ret == '') {
            $ret = XoopsUserUtility::getUnameFromId($this->uid(), $realName);
        }
        return $ret;
    }

    /**
     * @return string
     */
    public function posterAvatar()
    {
        $ret            = 'blank.gif';
        $member_handler = xoops_gethandler('member');
        $thisUser       = $member_handler->getUser($this->uid());
        if (is_object($thisUser)) {
            $ret = $thisUser->getVar('user_avatar');
        }
        return $ret;
    }

    /**
     * @return string
     */
    public function linkedPosterName()
    {
        xoops_load('XoopsUserUtility');
        $ret = $this->author_alias();
        if ($ret == '') {
            $ret = XoopsUserUtility::getUnameFromId($this->uid(), $this->publisher->getConfig('format_realname'), true);
        }
        return $ret;
    }

    /**
     * @return mixed
     */
    public function updateCounter()
    {
        return $this->publisher->getHandler('item')
                               ->updateCounter($this->itemid());
    }

    /**
     * @param bool $force
     *
     * @return bool
     */
    public function store($force = true)
    {
        $isNew = $this->isNew();
        if (!$this->publisher->getHandler('item')
                             ->insert($this, $force)) {
            return false;
        }
        if ($isNew && $this->status() == _PUBLISHER_STATUS_PUBLISHED) {
            // Increment user posts
            $user_handler   = xoops_gethandler('user');
            $member_handler = xoops_gethandler('member');
            $poster         = $user_handler->get($this->uid());
            if (is_object($poster) && !$poster->isNew()) {
                $poster->setVar('posts', $poster->getVar('posts') + 1);
                if (!$member_handler->insertUser($poster, true)) {
                    $this->setErrors('Article created but could not increment user posts.');
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category()
                    ->name();
    }

    /**
     * @return string
     */
    public function getCategoryUrl()
    {
        return $this->category()
                    ->getCategoryUrl();
    }

    /**
     * @return string
     */
    public function getCategoryLink()
    {
        return $this->category()
                    ->getCategoryLink();
    }

    /**
     * @param bool $withAllLink
     *
     * @return string
     */
    public function getCategoryPath($withAllLink = true)
    {
        return $this->category()
                    ->getCategoryPath($withAllLink);
    }

    /**
     * @return string
     */
    public function getCategoryImagePath()
    {
        return publisher_getImageDir('category', false) . $this->category()
                                                               ->image();
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->publisher->getHandler('file')
                               ->getAllFiles($this->itemid(), _PUBLISHER_STATUS_FILE_ACTIVE);
    }

    /**
     * @return string
     */
    public function getAdminLinks()
    {
        global $xoopsConfig, $xoopsUser;
        $adminLinks = '';
        if (is_object($xoopsUser)
            && (publisher_userIsAdmin() || publisher_userIsAuthor($this)
                || $this->publisher->getHandler('permission')
                                   ->isGranted('item_submit', $this->categoryid()))) {
            if (publisher_userIsAdmin() || publisher_userIsAuthor($this) || publisher_userIsModerator($this)) {
                if ($this->publisher->getConfig('perm_edit') || publisher_userIsModerator($this) || publisher_userIsAdmin()) {
                    // Edit button
                    $adminLinks .= "<a href='" . PUBLISHER_URL . "/submit.php?itemid=" . $this->itemid() . "'><img src='" . PUBLISHER_URL . "/images/links/edit.gif'" . " title='" . _CO_PUBLISHER_EDIT . "' alt='" . _CO_PUBLISHER_EDIT . "'/></a>";
                    $adminLinks .= " ";
                }
                if ($this->publisher->getConfig('perm_delete') || publisher_userIsModerator($this) || publisher_userIsAdmin()) {
                    // Delete button
                    $adminLinks .= "<a href='" . PUBLISHER_URL . "/submit.php?op=del&amp;itemid=" . $this->itemid() . "'><img src='" . PUBLISHER_URL . "/images/links/delete.png'" . " title='" . _CO_PUBLISHER_DELETE . "' alt='" . _CO_PUBLISHER_DELETE . "' /></a>";
                    $adminLinks .= " ";
                }
            }
            if ($this->publisher->getConfig('perm_clone') || publisher_userIsModerator($this) || publisher_userIsAdmin()) {
                // Duplicate button
                $adminLinks .= "<a href='" . PUBLISHER_URL . "/submit.php?op=clone&amp;itemid=" . $this->itemid() . "'><img src='" . PUBLISHER_URL . "/images/links/clone.gif'" . " title='" . _CO_PUBLISHER_CLONE . "' alt='" . _CO_PUBLISHER_CLONE . "' /></a>";
                $adminLinks .= " ";
            }
        }
        // PDF button
        $adminLinks .= "<a href='" . PUBLISHER_URL . "/makepdf.php?itemid=" . $this->itemid() . "' rel='nofollow' target='_blank'><img src='" . PUBLISHER_URL . "/images/links/pdf.gif' title='" . _CO_PUBLISHER_PDF . "' alt='" . _CO_PUBLISHER_PDF . "' /></a>";
        $adminLinks .= " ";
        // Print button
        $adminLinks .= "<a href='" . publisher_seo_genUrl("print", $this->itemid(), $this->short_url()) . "' rel='nofollow' target='_blank'><img src='" . PUBLISHER_URL . "/images/links/print.gif' title='" . _CO_PUBLISHER_PRINT . "' alt='" . _CO_PUBLISHER_PRINT . "' /></a>";
        $adminLinks .= " ";
        // Email button
        if (xoops_isActiveModule('tellafriend')) {
            $subject    = sprintf(_CO_PUBLISHER_INTITEMFOUND, $xoopsConfig['sitename']);
            $subject    = $this->_convert_for_japanese($subject);
            $maillink   = publisher_tellafriend($subject);
            $adminLinks .= '<a href="' . $maillink . '"><img src="' . PUBLISHER_URL . '/images/links/friend.gif" title="' . _CO_PUBLISHER_MAIL . '" alt="' . _CO_PUBLISHER_MAIL . '" /></a>';
            $adminLinks .= " ";
        }
        return $adminLinks;
    }

    /**
     * @param array $notifications
     */
    public function sendNotifications($notifications = [])
    {
        $notification_handler  = xoops_gethandler('notification');
        $tags                  = [];
        $tags['MODULE_NAME']   = $this->publisher->getModule()
                                                 ->getVar('name');
        $tags['ITEM_NAME']     = $this->title();
        $tags['ITEM_NAME']     = $this->subtitle();
        $tags['CATEGORY_NAME'] = $this->getCategoryName();
        $tags['CATEGORY_URL']  = PUBLISHER_URL . '/category.php?categoryid=' . $this->categoryid();
        $tags['ITEM_BODY']     = $this->body();
        $tags['DATESUB']       = $this->datesub();
        foreach ($notifications as $notification) {
            switch ($notification) {
                case _PUBLISHER_NOT_ITEM_PUBLISHED :
                    $tags['ITEM_URL'] = PUBLISHER_URL . '/item.php?itemid=' . $this->itemid();
                    $notification_handler->triggerEvent(
                        'global_item', 0, 'published', $tags, [], $this->publisher->getModule()
                                                                                  ->getVar('mid')
                    );
                    $notification_handler->triggerEvent(
                        'category_item', $this->categoryid(), 'published', $tags, [], $this->publisher->getModule()
                                                                                                      ->getVar('mid')
                    );
                    $notification_handler->triggerEvent(
                        'item', $this->itemid(), 'approved', $tags, [], $this->publisher->getModule()
                                                                                        ->getVar('mid')
                    );
                    break;
                case _PUBLISHER_NOT_ITEM_SUBMITTED :
                    $tags['WAITINGFILES_URL'] = PUBLISHER_URL . '/admin/item.php?itemid=' . $this->itemid();
                    $notification_handler->triggerEvent(
                        'global_item', 0, 'submitted', $tags, [], $this->publisher->getModule()
                                                                                  ->getVar('mid')
                    );
                    $notification_handler->triggerEvent(
                        'category_item', $this->categoryid(), 'submitted', $tags, [], $this->publisher->getModule()
                                                                                                      ->getVar('mid')
                    );
                    break;
                case _PUBLISHER_NOT_ITEM_REJECTED :
                    $notification_handler->triggerEvent(
                        'item', $this->itemid(), 'rejected', $tags, [], $this->publisher->getModule()
                                                                                        ->getVar('mid')
                    );
                    break;
                case -1 :
                default:
                    break;
            }
        }
    }

    /**
     * Sets default permissions for this item
     */
    public function setDefaultPermissions()
    {
        $member_handler = xoops_gethandler('member');
        $groups         = $member_handler->getGroupList();
        $j              = 0;
        $group_ids      = [];
        foreach (array_keys($groups) as $i) {
            $group_ids[$j] = $i;
            $j++;
        }
        $this->_groups_read = $group_ids;
    }

    /**
     * @param $group_ids
     * @todo look at this
     *
     */
    public function setPermissions($group_ids)
    {
        if (!isset($group_ids)) {
            $member_handler = xoops_gethandler('member');
            $groups         = $member_handler->getGroupList();
            $j              = 0;
            $group_ids      = [];
            foreach (array_keys($groups) as $i) {
                $group_ids[$j] = $i;
                $j++;
            }
        }
    }

    /**
     * @return bool
     */
    public function notLoaded()
    {
        return $this->getVar('itemid') == -1;
    }

    /**
     * @return string
     */
    public function getItemUrl()
    {
        return publisher_seo_genUrl('item', $this->itemid(), $this->short_url());
    }

    /**
     * @param bool $class
     * @param int  $maxsize
     *
     * @return string
     */
    public function getItemLink($class = false, $maxsize = 0)
    {
        if ($class) {
            return '<a class=' . $class . ' href="' . $this->getItemUrl() . '">' . $this->title($maxsize) . '</a>';
        } else {
            return '<a href="' . $this->getItemUrl() . '">' . $this->title($maxsize) . '</a>';
        }
    }

    /**
     * @return string
     */
    public function getWhoAndWhen()
    {
        $posterName = $this->linkedPosterName();
        $postdate   = $this->datesub();
        return sprintf(_CO_PUBLISHER_POSTEDBY, $posterName, $postdate);
    }

    /**
     * @return string
     */
    public function getWho()
    {
        $posterName = $this->linkedPosterName();
        return $posterName;
    }

    /**
     * @return string
     */
    public function getWhen()
    {
        $postdate = $this->datesub();
        return $postdate;
    }

    /**
     * @param null|string $body
     *
     * @return string
     */
    public function plain_maintext($body = null)
    {
        $ret = '';
        if (!$body) {
            $body = $this->body();
        }
        $ret .= str_replace('[pagebreak]', '<br /><br />', (string) $body);
        return $ret;
    }

    /**
     * @param int         $item_page_id
     * @param null|string $body
     *
     * @return string
     */
    public function buildmaintext($item_page_id = -1, $body = null)
    {
        if (!$body) {
            $body = $this->body();
        }
        $body_parts = explode('[pagebreak]', (string) $body);
        $this->setVar('pagescount', count($body_parts));
        if (count($body_parts) <= 1) {
            return $this->plain_maintext($body);
        }
        $ret = '';
        if ($item_page_id == -1) {
            $ret .= trim($body_parts[0]);
            return $ret;
        }
        if ($item_page_id >= count($body_parts)) {
            $item_page_id = count($body_parts) - 1;
        }
        $ret .= trim($body_parts[$item_page_id]);
        return $ret;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        static $ret;
        $itemid = $this->getVar('itemid');
        if (!isset($ret[$itemid])) {
            $ret[$itemid]['main']   = '';
            $ret[$itemid]['others'] = [];
            $images_ids             = [];
            $image                  = $this->getVar('image');
            $images                 = $this->getVar('images');
            if ($images != '') {
                $images_ids = explode('|', (string) $images);
            }
            if ($image > 0) {
                $images_ids = array_merge($images_ids, [$image]);
            }
            $imageObjs = [];
            if (count($images_ids) > 0) {
                $image_handler = xoops_gethandler('image');
                $criteria      = new CriteriaCompo(new Criteria('image_id', '(' . implode(',', $images_ids) . ')', 'IN'));
                $imageObjs     = $image_handler->getObjects($criteria, true);
                unset($criteria);
            }
            foreach ($imageObjs as $id => $imageObj) {
                if ($id == $image) {
                    $ret[$itemid]['main'] = $imageObj;
                } else {
                    $ret[$itemid]['others'][] = $imageObj;
                }
                unset($imageObj);
            }
            unset($imageObjs);
        }
        return $ret[$itemid];
    }

    /**
     * @param string $display
     * @param int    $max_char_title
     * @param int    $max_char_summary
     * @param bool   $full_summary
     *
     * @return array
     */
    public function ToArraySimple($display = 'default', $max_char_title = 0, $max_char_summary = 0, $full_summary = false)
    {
        $item_page_id = -1;
        if (is_numeric($display)) {
            $item_page_id = $display;
            $display      = 'all';
        }
        $item['itemid']    = $this->itemid();
        $item['itemurl']   = $this->getItemUrl();
        $item['uid']       = $this->uid();
        $item['titlelink'] = $this->getItemLink('titlelink', $max_char_title);
        $item['subtitle']  = $this->subtitle();
        $item['datesub']   = $this->datesub();
        $item['counter']   = $this->counter();
        $item['who']       = $this->getWho();
        $item['when']      = $this->getWhen();
        $item['category']  = $this->getCategoryName();
        $item              = $this->getMainImage($item);
        switch ($display) {
            case 'summary':
            case 'list':
                break;
            case 'full':
            case 'wfsection':
            case 'default':
                $summary = $this->summary($max_char_summary);
                if (!$summary) {
                    $summary = $this->body($max_char_summary);
                }
                $item['summary'] = $summary;
                $item            = $this->toArrayFull($item);
                break;
            case 'all':
                $item = $this->toArrayFull($item);
                $item = $this->toArrayAll($item, $item_page_id);
                break;
        }
        // Highlighting searched words
        $highlight = true;
        if ($highlight && isset($_GET['keywords'])) {
            $myts     = MyTextSanitizer::getInstance();
            $keywords = $myts->htmlSpecialChars(trim(urldecode((string) $_GET['keywords'])));
            $fields   = ['title', 'maintext', 'summary'];
            foreach ($fields as $field) {
                if (isset($item[$field])) {
                    $item[$field] = $this->highlight($item[$field], $keywords);
                }
            }
        }
        return $item;
    }

    /**
     * @param array $item
     *
     * @return array
     */
    public function toArrayFull($item)
    {
        $item['title']        = $this->title();
        $item['clean_title']  = $this->title();
        $item['itemurl']      = $this->getItemUrl();
        $item['cancomment']   = $this->cancomment();
        $item['comments']     = $this->comments();
        $item['adminlink']    = $this->getAdminLinks();
        $item['categoryPath'] = $this->getCategoryPath($this->publisher->getConfig('format_linked_path'));
        $item['who_when']     = $this->getWhoAndWhen();
        $item['who']          = $this->getWho();
        $item['when']         = $this->getWhen();
        $item['category']     = $this->getCategoryName();
        $item                 = $this->getMainImage($item);
        return $item;
    }

    /**
     * @param array $item
     * @param int   $item_page_id
     *
     * @return array
     */
    public function toArrayAll($item, $item_page_id)
    {
        $item['maintext'] = $this->buildmaintext($item_page_id, $this->body());
        $item             = $this->getOtherImages($item);
        return $item;
    }

    /**
     * @param array $item
     *
     * @return array
     */
    public function getMainImage($item = [])
    {
        $images             = $this->getImages();
        $item['image_path'] = '';
        $item['image_name'] = '';
        if (is_object($images['main'])) {
            $dimensions           = getimagesize(XOOPS_ROOT_PATH . '/uploads/' . $images['main']->getVar('image_name'));
            $item['image_width']  = $dimensions[0];
            $item['image_height'] = $dimensions[1];
            $item['image_path']   = XOOPS_URL . '/uploads/' . $images['main']->getVar('image_name');
            // check to see if GD function exist
            if (!function_exists('imagecreatetruecolor')) {
                $item['image_thumb'] = XOOPS_URL . '/uploads/' . $images['main']->getVar('image_name');
            } else {
                $item['image_thumb'] = PUBLISHER_URL . '/thumb.php?src=' . XOOPS_URL . '/uploads/' . $images['main']->getVar('image_name') . '&amp;h=180';
            }
            $item['image_name'] = $images['main']->getVar('image_nicename');
        }
        return $item;
    }

    /**
     * @param array $item
     *
     * @return array
     */
    public function getOtherImages($item = [])
    {
        $images         = $this->getImages();
        $item['images'] = [];
        $i              = 0;
        foreach ($images['others'] as $image) {
            $dimensions                   = getimagesize(XOOPS_ROOT_PATH . '/uploads/' . $image->getVar('image_name'));
            $item['images'][$i]['width']  = $dimensions[0];
            $item['images'][$i]['height'] = $dimensions[1];
            $item['images'][$i]['path']   = XOOPS_URL . '/uploads/' . $image->getVar('image_name');
            // check to see if GD function exist
            if (!function_exists('imagecreatetruecolor')) {
                $item['images'][$i]['thumb'] = XOOPS_URL . '/uploads/' . $image->getVar('image_name');
            } else {
                $item['images'][$i]['thumb'] = PUBLISHER_URL . '/thumb.php?src=' . XOOPS_URL . '/uploads/' . $image->getVar('image_name') . '&amp;w=240';
            }
            $item['images'][$i]['name'] = $image->getVar('image_nicename');
            $i++;
        }
        return $item;
    }

    /**
     * @param string       $content
     * @param string|array $keywords
     *
     * @return Text
     */
    public function highlight($content, $keywords)
    {
        $color = $this->publisher->getConfig('format_highlight_color');
        if (!str_starts_with((string) $color, '#')) {
            $color = '#' . $color;
        }
        include_once __DIR__ . '/highlighter.php';
        $highlighter = new PublisherHighlighter();
        $highlighter->setReplacementString('<span style="font-weight: bolder; background-color: ' . $color . ';">\1</span>');
        return $highlighter->highlight($content, $keywords);
    }

    /**
     *  Create metada and assign it to template
     */
    public function createMetaTags()
    {
        $publisher_metagen = new PublisherMetagen($this->title(), $this->meta_keywords(), $this->meta_description(), $this->_category->_categoryPath);
        $publisher_metagen->createMetaTags();
    }

    /**
     * @param string $str
     *
     * @return string
     */
    public function _convert_for_japanese($str)
    {
        global $xoopsConfig;
        // no action, if not flag
        if (!defined('_PUBLISHER_FLAG_JP_CONVERT')) {
            return $str;
        }
        // no action, if not Japanese
        if ($xoopsConfig['language'] != 'japanese') {
            return $str;
        }
        // presume OS Browser
        $agent   = $_SERVER["HTTP_USER_AGENT"];
        $os      = '';
        $browser = '';
        if (preg_match("/Win/i", (string) $agent)) {
            $os = 'win';
        }
        if (preg_match("/MSIE/i", (string) $agent)) {
            $browser = 'msie';
        }
        // if msie
        if (($os == 'win') && ($browser == 'msie')) {
            // if multibyte
            if (function_exists('mb_convert_encoding')) {
                $str = mb_convert_encoding($str, 'SJIS', 'EUC-JP');
                $str = rawurlencode($str);
            }
        }
        return $str;
    }

    /**
     * @param string $title
     * @param bool   $checkperm
     *
     * @return PublisherItemForm
     */
    public function getForm($title = 'default', $checkperm = true)
    {
        include_once XOOPS_ROOT_PATH . '/modules/publisher/class/form/item.php';
        $form = new PublisherItemForm($title, 'form', xoops_getenv('PHP_SELF'));
        $form->setCheckPermissions($checkperm);
        $form->createElements($this);
        return $form;
    }

    /**
     * Checks if a user has access to a selected item. if no item permissions are
     * set, access permission is denied. The user needs to have necessary category
     * permission as well.
     * Also, the item needs to be Published
     *
     * @return boolean : TRUE if the no errors occured
     */
    public function accessGranted()
    {
        if (publisher_userIsAdmin()) {
            return true;
        }
        if ($this->status() != _PUBLISHER_STATUS_PUBLISHED) {
            return false;
        }
        // Do we have access to the parent category
        if ($this->publisher->getHandler('permission')
                            ->isGranted('category_read', $this->categoryid())) {
            return true;
        }
        return false;
    }

    /**
     * The name says it all
     */
    public function setVarsFromRequest()
    {
        //Required fields
        if (isset($_REQUEST['categoryid'])) {
            $this->setVar('categoryid', PublisherRequest::getInt('categoryid'));
        }
        if (isset($_REQUEST['title'])) {
            $this->setVar('title', PublisherRequest::getString('title'));
        }
        if (isset($_REQUEST['body'])) {
            $this->setVar('body', PublisherRequest::getText('body'));
        }
        //Not required fields
        if (isset($_REQUEST['summary'])) {
            $this->setVar('summary', PublisherRequest::getText('summary'));
        }
        if (isset($_REQUEST['subtitle'])) {
            $this->setVar('subtitle', PublisherRequest::getString('subtitle'));
        }
        if (isset($_REQUEST['item_tag'])) {
            $this->setVar('item_tag', PublisherRequest::getString('item_tag'));
        }
        if (isset($_REQUEST['image_featured'])) {
            $image_item     = PublisherRequest::getArray('image_item');
            $image_featured = PublisherRequest::getString('image_featured');
            //Todo: get a better image class for xoops!
            //Image hack
            $image_item_ids = [];
            global $xoopsDB;
            $sql    = 'SELECT image_id, image_name FROM ' . $xoopsDB->prefix('image');
            $result = $xoopsDB->query($sql, 0, 0);
            while ($myrow = $xoopsDB->fetchArray($result)) {
                $image_name = $myrow['image_name'];
                $id         = $myrow['image_id'];
                if ($image_name == $image_featured) {
                    $this->setVar('image', $id);
                }
                if (in_array($image_name, $image_item)) {
                    $image_item_ids[] = $id;
                }
            }
            $this->setVar('images', implode('|', $image_item_ids));
        }
        if (isset($_REQUEST['uid'])) {
            $this->setVar('uid', PublisherRequest::getInt('uid'));
        } elseif ($this->isnew()) {
            $this->setVar('uid', is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->uid() : 0);
        }
        if (isset($_REQUEST['author_alias'])) {
            $this->setVar('author_alias', PublisherRequest::getString('author_alias'));
            if ($this->getVar('autor_alias') != '') {
                $this->setVar('uid', 0);
            }
        }
        if (isset($_REQUEST['datesub'])) {
            $this->setVar('datesub', strtotime((string) $_REQUEST['datesub']['date']) + $_REQUEST['datesub']['time']);
        } elseif ($this->isnew()) {
            $this->setVar('datesub', time());
        }
        if (isset($_REQUEST['item_short_url'])) {
            $this->setVar('short_url', PublisherRequest::getString('item_short_url'));
        }
        if (isset($_REQUEST['item_meta_keywords'])) {
            $this->setVar('meta_keywords', PublisherRequest::getString('item_meta_keywords'));
        }
        if (isset($_REQUEST['item_meta_description'])) {
            $this->setVar('meta_description', PublisherRequest::getString('item_meta_description'));
        }
        if (isset($_REQUEST['weight'])) {
            $this->setVar('weight', PublisherRequest::getInt('weight'));
        }
        if (isset($_REQUEST['allowcomments'])) {
            $this->setVar('cancomment', PublisherRequest::getInt('allowcomments'));
        } elseif ($this->isnew()) {
            $this->setVar('cancoment', $this->publisher->getConfig('submit_allowcomments'));
        }
        if (isset($_REQUEST['status'])) {
            $this->setVar('status', PublisherRequest::getInt('status'));
        } elseif ($this->isnew()) {
            $this->setVar('status', $this->publisher->getConfig('submit_status'));
        }
        if (isset($_REQUEST['dohtml'])) {
            $this->setVar('dohtml', PublisherRequest::getInt('dohtml'));
        } elseif ($this->isnew()) {
            $this->setVar('dohtml', $this->publisher->getConfig('submit_dohtml'));
        }
        if (isset($_REQUEST['dosmiley'])) {
            $this->setVar('dosmiley', PublisherRequest::getInt('dosmiley'));
        } elseif ($this->isnew()) {
            $this->setVar('dosmiley', $this->publisher->getConfig('submit_dosmiley'));
        }
        if (isset($_REQUEST['doxcode'])) {
            $this->setVar('doxcode', PublisherRequest::getInt('doxcode'));
        } elseif ($this->isnew()) {
            $this->setVar('doxcode', $this->publisher->getConfig('submit_doxcode'));
        }
        if (isset($_REQUEST['doimage'])) {
            $this->setVar('doimage', PublisherRequest::getInt('doimage'));
        } elseif ($this->isnew()) {
            $this->setVar('doimage', $this->publisher->getConfig('submit_doimage'));
        }
        if (isset($_REQUEST['dolinebreak'])) {
            $this->setVar('dobr', PublisherRequest::getInt('dolinebreak'));
        } elseif ($this->isnew()) {
            $this->setVar('dobr', $this->publisher->getConfig('submit_dobr'));
        }
        if (isset($_REQUEST['notify'])) {
            $this->setVar('notifypub', PublisherRequest::getInt('notify'));
        }
    }
}

/**
 * Items handler class.
 * This class is responsible for providing data access mechanisms to the data source
 * of Q&A class objects.
 *
 * @author  marcan <marcan@notrevie.ca>
 * @package Publisher
 */
class PublisherItemHandler extends XoopsPersistableObjectHandler
{
    /**
     * @var PublisherPublisher
     * @access public
     */
    public $publisher = null;

    /**
     * @param null|object $db
     */
    public function __construct(&$db)
    {
        parent::__construct($db, "publisher_items", 'PublisherItem', "itemid", "title");
        $this->publisher = PublisherPublisher::getInstance();
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function &create($isNew = true)
    {
        $obj = parent::create($isNew);
        if ($isNew) {
            $obj->setDefaultPermissions();
        }
        return $obj;
    }

    /**
     * retrieve an item
     *
     * @param int $id itemid of the user
     *
     * @return mixed reference to the {@link PublisherItem} object, FALSE if failed
     */
    public function &get($id)
    {
        $obj = parent::get($id);
        if (is_object($obj)) {
            $obj->assignOtherProperties();
        }
        return $obj;
    }

    /**
     * insert a new item in the database
     *
     * @param object $item reference to the {@link PublisherItem} object
     * @param bool   $force
     *
     * @return bool FALSE if failed, TRUE if already present and unchanged or successful
     */
    public function insert(&$item, $force = false)
    {
        if (!$item->meta_keywords() || !$item->meta_description() || !$item->short_url()) {
            $publisher_metagen = new PublisherMetagen($item->title(), $item->getVar('meta_keywords'), $item->getVar('summary'));
            // Auto create meta tags if empty
            if (!$item->meta_keywords()) {
                $item->setVar('meta_keywords', $publisher_metagen->_keywords);
            }
            if (!$item->meta_description()) {
                $item->setVar('meta_description', $publisher_metagen->_description);
            }
            // Auto create short_url if empty
            if (!$item->short_url()) {
                $item->setVar('short_url', $publisher_metagen->generateSeoTitle($item->getVar('title', 'n'), false));
            }
        }
        if (!parent::insert($item, $force)) {
            return false;
        }
        if (xoops_isActiveModule('tag')) {
            // Storing tags information
            $tag_handler = xoops_getmodulehandler('tag', 'tag');
            $tag_handler->updateByItem($item->getVar('item_tag'), $item->getVar('itemid'), PUBLISHER_DIRNAME, 0);
        }
        return true;
    }

    /**
     * delete an item from the database
     *
     * @param object $item reference to the ITEM to delete
     * @param bool   $force
     *
     * @return bool FALSE if failed.
     */
    public function delete(&$item, $force = false)
    {
        // Deleting the files
        if (!$this->publisher->getHandler('file')
                             ->deleteItemFiles($item)) {
            $item->setErrors('An error while deleting a file.');
        }
        if (!parent::delete($item, $force)) {
            $item->setErrors('An error while deleting.');
            return false;
        }
        // Removing tags information
        if (xoops_isActiveModule('tag')) {
            $tag_handler = xoops_getmodulehandler('tag', 'tag');
            $tag_handler->updateByItem('', $item->getVar('itemid'), PUBLISHER_DIRNAME, 0);
        }
        return true;
    }

    /**
     * retrieve items from the database
     *
     * @param object $criteria {@link CriteriaElement} conditions to be met
     * @param string $id_key   what shall we use as array key ? none, itemid, categoryid
     * @param string $notNullFields
     *
     * @return array array of {@link PublisherItem} objects
     */
    public function &getObjects($criteria = null, $id_key = 'none', $notNullFields = '')
    {
        $ret   = [];
        $limit = $start = 0;
        $sql   = 'SELECT * FROM ' . $this->db->prefix('publisher_items');
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $whereClause = $criteria->renderWhere();
            if ($whereClause != 'WHERE ()') {
                $sql .= ' ' . $criteria->renderWhere();
                if (!empty($notNullFields)) {
                    $sql .= $this->NotNullFieldClause($notNullFields, true);
                }
            } elseif (!empty($notNullFields)) {
                $sql .= " WHERE " . $this->NotNullFieldClause($notNullFields);
            }
            if ($criteria->getSort() != '') {
                $sql .= ' ORDER BY ' . $criteria->getSort() . ' ' . $criteria->getOrder();
            }
            $limit = $criteria->getLimit();
            $start = $criteria->getStart();
        } elseif (!empty($notNullFields)) {
            $sql .= $sql .= " WHERE " . $this->NotNullFieldClause($notNullFields);
        }
        $result = $this->db->query($sql, $limit, $start);
        if (!$result || count($result) == 0) {
            return $ret;
        }
        $theObjects = [];
        while ($myrow = $this->db->fetchArray($result)) {
            $item = new PublisherItem();
            $item->assignVars($myrow);
            $theObjects[$myrow['itemid']] = $item;
            unset($item);
        }
        foreach ($theObjects as $theObject) {
            if ($id_key == 'none') {
                $ret[] = $theObject;
            } elseif ($id_key == 'itemid') {
                $ret[$theObject->itemid()] = $theObject;
            } else {
                $ret[$theObject->getVar($id_key)][$theObject->itemid()] = $theObject;
            }
            unset($theObject);
        }
        return $ret;
    }

    /**
     * count items matching a condition
     *
     * @param object $criteria {@link CriteriaElement} to match
     * @param string $notNullFields
     *
     * @return int count of items
     */
    public function getCount($criteria = null, $notNullFields = '')
    {
        $sql = 'SELECT COUNT(*) FROM ' . $this->db->prefix('publisher_items');
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $whereClause = $criteria->renderWhere();
            if ($whereClause != 'WHERE ()') {
                $sql .= ' ' . $criteria->renderWhere();
                if (!empty($notNullFields)) {
                    $sql .= $this->NotNullFieldClause($notNullFields, true);
                }
            } elseif (!empty($notNullFields)) {
                $sql .= " WHERE " . $this->NotNullFieldClause($notNullFields);
            }
        } elseif (!empty($notNullFields)) {
            $sql .= " WHERE " . $this->NotNullFieldClause($notNullFields);
        }
        $result = $this->db->query($sql);
        if (!$result) {
            return 0;
        }
        [$count] = $this->db->fetchRow($result);
        return $count;
    }

    /**
     * @param        $categoryid
     * @param string $status
     * @param string $notNullFields
     *
     * @return int
     */
    public function getItemsCount($categoryid = -1, $status = '', $notNullFields = '')
    {
        global $publisher_isAdmin;
        if (!$publisher_isAdmin) {
            $criteriaPermissions = new CriteriaCompo();
            // Categories for which user has access
            $categoriesGranted = $this->publisher->getHandler('permission')
                                                 ->getGrantedItems('category_read');
            if (!empty($categoriesGranted)) {
                $grantedCategories = new Criteria('categoryid', "(" . implode(',', $categoriesGranted) . ")", 'IN');
                $criteriaPermissions->add($grantedCategories, 'AND');
            } else {
                return 0;
            }
        }
        if (isset($categoryid) && $categoryid != -1) {
            $criteriaCategory = new criteria('categoryid', $categoryid);
        }
        $criteriaStatus = new CriteriaCompo();
        if (!empty($status) && is_array($status)) {
            foreach ($status as $v) {
                $criteriaStatus->add(new Criteria('status', $v), 'OR');
            }
        } elseif (!empty($status) && $status != -1) {
            $criteriaStatus->add(new Criteria('status', $status), 'OR');
        }
        $criteria = new CriteriaCompo();
        if (!empty($criteriaCategory)) {
            $criteria->add($criteriaCategory);
        }
        if (!empty($criteriaPermissions)) {
            $criteria->add($criteriaPermissions);
        }
        if (!empty($criteriaStatus)) {
            $criteria->add($criteriaStatus);
        }
        return $this->getCount($criteria, $notNullFields);
    }

    /**
     * @param int    $limit
     * @param int    $start
     * @param int    $categoryid
     * @param string $sort
     * @param string $order
     * @param string $notNullFields
     * @param bool   $asobject
     * @param string $id_key
     *
     * @return array
     */
    public function getAllPublished($limit = 0, $start = 0, $categoryid = -1, $sort = 'datesub', $order = 'DESC', $notNullFields = '', $asobject = true, $id_key = 'none')
    {
        $otherCriteria = new Criteria('datesub', time(), '<=');
        return $this->getItems($limit, $start, [_PUBLISHER_STATUS_PUBLISHED], $categoryid, $sort, $order, $notNullFields, $asobject, $otherCriteria, $id_key);
    }

    /**
     * @param PublisherItem $obj
     *
     * @return bool
     */
    public function getPreviousPublished($obj)
    {
        $ret           = false;
        $otherCriteria = new CriteriaCompo();
        $otherCriteria->add(new Criteria('datesub', $obj->getVar('datesub'), '<'));
        $objs = $this->getItems(1, 0, [_PUBLISHER_STATUS_PUBLISHED], $obj->getVar('categoryid'), 'datesub', 'DESC', '', true, $otherCriteria, 'none');
        if (count($objs) > 0) {
            $ret = $objs[0];
        }
        return $ret;
    }

    /**
     * @param PublisherItem $obj
     *
     * @return bool
     */
    public function getNextPublished($obj)
    {
        $ret           = false;
        $otherCriteria = new CriteriaCompo();
        $otherCriteria->add(new Criteria('datesub', $obj->getVar('datesub'), '>'));
        $otherCriteria->add(new Criteria('datesub', time(), '<='));
        $objs = $this->getItems(1, 0, [_PUBLISHER_STATUS_PUBLISHED], $obj->getVar('categoryid'), 'datesub', 'ASC', '', true, $otherCriteria, 'none');
        if (count($objs) > 0) {
            $ret = $objs[0];
        }
        return $ret;
    }

    /**
     * @param int    $limit
     * @param int    $start
     * @param int    $categoryid
     * @param string $sort
     * @param string $order
     * @param string $notNullFields
     * @param bool   $asobject
     * @param string $id_key
     *
     * @return array
     */
    public function getAllSubmitted($limit = 0, $start = 0, $categoryid = -1, $sort = 'datesub', $order = 'DESC', $notNullFields = '', $asobject = true, $id_key = 'none')
    {
        return $this->getItems($limit, $start, [_PUBLISHER_STATUS_SUBMITTED], $categoryid, $sort, $order, $notNullFields, $asobject, null, $id_key);
    }

    /**
     * @param int    $limit
     * @param int    $start
     * @param int    $categoryid
     * @param string $sort
     * @param string $order
     * @param string $notNullFields
     * @param bool   $asobject
     * @param string $id_key
     *
     * @return array
     */
    public function getAllOffline($limit = 0, $start = 0, $categoryid = -1, $sort = 'datesub', $order = 'DESC', $notNullFields = '', $asobject = true, $id_key = 'none')
    {
        return $this->getItems($limit, $start, [_PUBLISHER_STATUS_OFFLINE], $categoryid, $sort, $order, $notNullFields, $asobject, null, $id_key);
    }

    /**
     * @param int    $limit
     * @param int    $start
     * @param int    $categoryid
     * @param string $sort
     * @param string $order
     * @param string $notNullFields
     * @param bool   $asobject
     * @param string $id_key
     *
     * @return array
     */
    public function getAllRejected($limit = 0, $start = 0, $categoryid = -1, $sort = 'datesub', $order = 'DESC', $notNullFields = '', $asobject = true, $id_key = 'none')
    {
        return $this->getItems($limit, $start, [_PUBLISHER_STATUS_REJECTED], $categoryid, $sort, $order, $notNullFields, $asobject, null, $id_key);
    }

    /**
     * @param int    $limit
     * @param int    $start
     * @param string $status
     * @param int    $categoryid
     * @param string $sort
     * @param string $order
     * @param string $notNullFields
     * @param bool   $asobject
     * @param null   $otherCriteria
     * @param string $id_key
     *
     * @return array
     */
    public function getItems($limit = 0, $start = 0, $status = '', $categoryid = -1, $sort = 'datesub', $order = 'DESC', $notNullFields = '', $asobject = true, $otherCriteria = null, $id_key = 'none')
    {
        global $publisher_isAdmin;
        if (!$publisher_isAdmin) {
            $criteriaPermissions = new CriteriaCompo();
            // Categories for which user has access
            $categoriesGranted = $this->publisher->getHandler('permission')
                                                 ->getGrantedItems('category_read');
            if (!empty($categoriesGranted)) {
                $grantedCategories = new Criteria('categoryid', "(" . implode(',', $categoriesGranted) . ")", 'IN');
                $criteriaPermissions->add($grantedCategories, 'AND');
            } else {
                return [];
            }
        }
        if (isset($categoryid) && ($categoryid != -1)) {
            $criteriaCategory = new criteria('categoryid', $categoryid);
        }
        if (!empty($status) && is_array($status)) {
            $criteriaStatus = new CriteriaCompo();
            foreach ($status as $v) {
                $criteriaStatus->add(new Criteria('status', $v), 'OR');
            }
        } elseif (!empty($status) && $status != -1) {
            $criteriaStatus = new CriteriaCompo();
            $criteriaStatus->add(new Criteria('status', $status), 'OR');
        }
        $criteria = new CriteriaCompo();
        if (!empty($criteriaCategory)) {
            $criteria->add($criteriaCategory);
        }
        if (!empty($criteriaPermissions)) {
            $criteria->add($criteriaPermissions);
        }
        if (!empty($criteriaStatus)) {
            $criteria->add($criteriaStatus);
        }
        if (!empty($otherCriteria)) {
            $criteria->add($otherCriteria);
        }
        $criteria->setLimit($limit);
        $criteria->setStart($start);
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $ret = $this->getObjects($criteria, $id_key, $notNullFields);
        return $ret;
    }

    /**
     * @param string $field
     * @param string $status
     * @param int    $categoryId
     *
     * @return bool
     */
    public function getRandomItem($field = '', $status = '', $categoryId = -1)
    {
        $ret           = false;
        $notNullFields = $field;
        // Getting the number of published Items
        $totalItems = $this->getItemsCount($categoryId, $status, $notNullFields);
        if ($totalItems > 0) {
            $totalItems = $totalItems - 1;
            mt_srand((double)microtime() * 1000000);
            $entrynumber = mt_rand(0, $totalItems);
            $item        = $this->getItems(1, $entrynumber, $status, $categoryId, $sort = 'datesub', $order = 'DESC', $notNullFields);
            if ($item) {
                $ret = $item[0];
            }
        }
        return $ret;
    }

    /**
     * delete Items matching a set of conditions
     *
     * @param object $criteria {@link CriteriaElement}
     *
     * @return bool FALSE if deletion failed
     */
    public function deleteAll($criteria = null)
    {
        //todo resource consuming, use get list instead?
        $items = $this->getObjects($criteria);
        foreach ($items as $item) {
            $this->delete($item);
        }
        return true;
    }

    /**
     * @param $itemid
     *
     * @return bool
     */
    public function updateCounter($itemid)
    {
        $sql = "UPDATE " . $this->db->prefix("publisher_items") . " SET counter=counter+1 WHERE itemid = " . $itemid;
        if ($this->db->queryF($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string|array $notNullFields
     * @param bool         $withAnd
     *
     * @return string
     */
    public function NotNullFieldClause($notNullFields = '', $withAnd = false)
    {
        $ret = '';
        if ($withAnd) {
            $ret .= " AND ";
        }
        if (!empty($notNullFields) && (is_array($notNullFields))) {
            foreach ($notNullFields as $v) {
                $ret .= " ($v IS NOT NULL AND $v <> ' ' )";
            }
        } elseif (!empty($notNullFields)) {
            $ret .= " ($notNullFields IS NOT NULL AND $notNullFields <> ' ' )";
        }
        return $ret;
    }

    /**
     * @param array  $queryarray
     * @param string $andor
     * @param int    $limit
     * @param int    $offset
     * @param int    $userid
     * @param array  $categories
     * @param int    $sortby
     * @param string $searchin
     * @param string $extra
     *
     * @return array
     */
    public function getItemsFromSearch($queryarray = [], $andor = 'AND', $limit = 0, $offset = 0, $userid = 0, $categories = [], $sortby = 0, $searchin = "", $extra = "")
    {
        global $xoopsUser, $publisher_isAdmin;
        $ret           = [];
        $gperm_handler = &xoops_gethandler('groupperm');
        $groups        = is_object($xoopsUser) ? ($xoopsUser->getGroups()) : XOOPS_GROUP_ANONYMOUS;
        $searchin      = empty($searchin) ? ["title", "body", "summary"] : (is_array($searchin) ? $searchin : [$searchin]);
        if (in_array("all", $searchin) || count($searchin) == 0) {
            $searchin = ["title", "subtitle", "body", "summary", "meta_keywords"];
        }
        if (is_array($userid) && count($userid) > 0) {
            $userid       = array_map("intval", $userid);
            $criteriaUser = new CriteriaCompo();
            $criteriaUser->add(new Criteria('uid', '(' . implode(',', $userid) . ')', 'IN'), 'OR');
        } elseif (is_numeric($userid) && $userid > 0) {
            $criteriaUser = new CriteriaCompo();
            $criteriaUser->add(new Criteria('uid', $userid), 'OR');
        }
        $count = count($queryarray);
        if (is_array($queryarray) && $count > 0) {
            $criteriaKeywords = new CriteriaCompo();
            for ($i = 0; $i < count($queryarray); $i++) {
                $criteriaKeyword = new CriteriaCompo();
                if (in_array('title', $searchin)) {
                    $criteriaKeyword->add(new Criteria('title', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
                }
                if (in_array('subtitle', $searchin)) {
                    $criteriaKeyword->add(new Criteria('subtitle', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
                }
                if (in_array('body', $searchin)) {
                    $criteriaKeyword->add(new Criteria('body', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
                }
                if (in_array('summary', $searchin)) {
                    $criteriaKeyword->add(new Criteria('summary', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
                }
                if (in_array('meta_keywords', $searchin)) {
                    $criteriaKeyword->add(new Criteria('meta_keywords', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
                }
                $criteriaKeywords->add($criteriaKeyword, $andor);
                unset($criteriaKeyword);
            }
        }
        if (!$publisher_isAdmin && (count($categories) > 0)) {
            $criteriaPermissions = new CriteriaCompo();
            // Categories for which user has access
            $categoriesGranted = $gperm_handler->getItemIds(
                'category_read', $groups, $this->publisher->getModule()
                                                          ->getVar('mid')
            );
            if (count($categories) > 0) {
                $categoriesGranted = array_intersect($categoriesGranted, $categories);
            }
            if (count($categoriesGranted) == 0) {
                return $ret;
            }
            $grantedCategories = new Criteria('categoryid', "(" . implode(',', $categoriesGranted) . ")", 'IN');
            $criteriaPermissions->add($grantedCategories, 'AND');
        } elseif (count($categories) > 0) {
            $criteriaPermissions = new CriteriaCompo();
            $grantedCategories   = new Criteria('categoryid', "(" . implode(',', $categories) . ")", 'IN');
            $criteriaPermissions->add($grantedCategories, 'AND');
        }
        $criteriaItemsStatus = new CriteriaCompo();
        $criteriaItemsStatus->add(new Criteria('status', _PUBLISHER_STATUS_PUBLISHED));
        $criteria = new CriteriaCompo();
        if (!empty($criteriaUser)) {
            $criteria->add($criteriaUser, 'AND');
        }
        if (!empty($criteriaKeywords)) {
            $criteria->add($criteriaKeywords, 'AND');
        }
        if (!empty($criteriaPermissions)) {
            $criteria->add($criteriaPermissions);
        }
        if (!empty($criteriaItemsStatus)) {
            $criteria->add($criteriaItemsStatus, 'AND');
        }
        $criteria->setLimit($limit);
        $criteria->setStart($offset);
        if (empty($sortby)) {
            $sortby = "datesub";
        }
        $criteria->setSort($sortby);
        $order = 'ASC';
        if ($sortby == "datesub") {
            $order = 'DESC';
        }
        $criteria->setOrder($order);
        $ret = $this->getObjects($criteria);
        return $ret;
    }

    /**
     * @param array $categoriesObj
     * @param array $status
     *
     * @return array
     */
    public function getLastPublishedByCat($categoriesObj, $status = [_PUBLISHER_STATUS_PUBLISHED])
    {
        $ret    = [];
        $catIds = [];
        foreach ($categoriesObj as $parentid) {
            foreach ($parentid as $category) {
                $catId          = $category->getVar('categoryid');
                $catIds[$catId] = $catId;
            }
        }
        if (empty($catIds)) {
            return $ret;
        }
        /*$cat = array();

        $sql = "SELECT categoryid, MAX(datesub) as date FROM " . $this->db->prefix('publisher_items') . " WHERE status IN (" . implode(',', $status) . ") GROUP BY categoryid";
        $result = $this->db->query($sql);
        while ($row = $this->db->fetchArray($result)) {
            $cat[$row['categoryid']] = $row['date'];
        }
        if (count($cat) == 0) return $ret;
        $sql = "SELECT categoryid, itemid, title, short_url, uid, datesub FROM " . $this->db->prefix('publisher_items');
        $criteriaBig = new CriteriaCompo();
        foreach ($cat as $id => $date) {
            $criteria = new CriteriaCompo(new Criteria('categoryid', $id));
            $criteria->add(new Criteria('datesub', $date));
            $criteriaBig->add($criteria, 'OR');
            unset($criteria);
        }
        $sql .= " " . $criteriaBig->renderWhere();
        $result = $this->db->query($sql);
        while ($row = $this->db->fetchArray($result)) {
            $item = new PublisherItem();
            $item->assignVars($row);
            $ret[$row['categoryid']] = $item;
            unset($item);
        }
        */
        $sql    = "SELECT mi.categoryid, mi.itemid, mi.title, mi.short_url, mi.uid, mi.datesub";
        $sql    .= " FROM (SELECT categoryid, MAX(datesub) AS date FROM " . $this->db->prefix('publisher_items');
        $sql    .= " WHERE status IN (" . implode(',', $status) . ")";
        $sql    .= " AND categoryid IN (" . implode(',', $catIds) . ")";
        $sql    .= " GROUP BY categoryid)mo";
        $sql    .= " JOIN " . $this->db->prefix('publisher_items') . " mi ON mi.datesub = mo.date";
        $result = $this->db->query($sql);
        while ($row = $this->db->fetchArray($result)) {
            $item = new PublisherItem();
            $item->assignVars($row);
            $ret[$row['categoryid']] = $item;
            unset($item);
        }
        return $ret;
    }

    /**
     * @param int    $parentid
     * @param int    $catsCount
     * @param string $spaces
     *
     * @return int
     */
    public function countArticlesByCat($parentid, &$catsCount, $spaces = '')
    {
        global $resultCatCounts;
        $newspaces = $spaces . '--';
        $thecount  = 0;
        foreach ($catsCount[$parentid] as $subCatId => $count) {
            $thecount                   = $thecount + $count;
            $resultCatCounts[$subCatId] = $count;
            if (isset($catsCount[$subCatId])) {
                $thecount                   = $thecount + $this->countArticlesByCat($subCatId, $catsCount, $newspaces);
                $resultCatCounts[$subCatId] = $thecount;
            }
        }
        return $thecount;
    }

    /**
     * @param int   $cat_id
     * @param array $status
     * @param bool  $inSubCat
     *
     * @return array
     */
    public function getCountsByCat($status, $cat_id = 0, $inSubCat = false)
    {
        global $resultCatCounts;
        $ret       = [];
        $catsCount = [];
        $sql       = 'SELECT c.parentid, i.categoryid, COUNT(*) AS count FROM ' . $this->db->prefix('publisher_items') . ' AS i INNER JOIN ' . $this->db->prefix('publisher_categories') . ' AS c ON i.categoryid=c.categoryid';
        if (intval($cat_id) > 0) {
            $sql .= ' WHERE i.categoryid = ' . intval($cat_id);
            $sql .= ' AND i.status IN (' . implode(',', $status) . ')';
        } else {
            $sql .= ' WHERE i.status IN (' . implode(',', $status) . ')';
        }
        $sql    .= ' GROUP BY i.categoryid ORDER BY c.parentid ASC, i.categoryid ASC';
        $result = $this->db->query($sql);
        if (!$result) {
            return $ret;
        }
        if (!$inSubCat) {
            while ($row = $this->db->fetchArray($result)) {
                $catsCount[$row['categoryid']] = $row['count'];
            }
            return $catsCount;
        }
        while ($row = $this->db->fetchArray($result)) {
            $catsCount[$row['parentid']][$row['categoryid']] = $row['count'];
        }
        $resultCatCounts = [];
        foreach ($catsCount[0] as $subCatId => $count) {
            $resultCatCounts[$subCatId] = $count;
            if (isset($catsCount[$subCatId])) {
                $resultCatCounts[$subCatId] = $resultCatCounts[$subCatId] + $this->countArticlesByCat($subCatId, $catsCount);
            }
        }
        return $resultCatCounts;
    }
}
