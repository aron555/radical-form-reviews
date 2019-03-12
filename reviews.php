<?php
defined('_JEXEC') or die;

date_default_timezone_set('Europe/Moscow');

if(isset($source['uniq']))
{
    $uniq=$source['uniq'];
}

$root = $_SERVER['DOCUMENT_ROOT'];

// videoreview
if(isset($source['name']))
{
    $name=$source['name'];
}
if(isset($source['review']))
{
    $review=$source['review'];
}

if(isset($source['videoreview']) && isset($file)) {

    $tmp_dir = '/tmp/rf-'.$uniq.'/video/';
    $uploads_dir = '/images/reviews/video/';

    $video = basename($file);
    copy($root.$tmp_dir.$video, $root.$uploads_dir.$uniq.$video);
    $vid_src = $uploads_dir.$uniq.$video;

} else {
    $video_src = 'https://youtu.be/60VYXd9RVJ0';
}

if(isset($source['links']))
{
    $links_tmp=$source['links'];
    function remove_http($links_tmp) {
        $disallowed = array('http://', 'https://', 'www.');
        foreach($disallowed as $d) {
            if(strpos($links_tmp, $d) === 0) {
                return str_replace($d, '', $links_tmp);
            }
        }
        return $links_tmp;
    }
    $links_tmp = remove_http($links_tmp);
    $links = "https://".$links_tmp;

}

if(isset($vid_src)) {
    $video_src = $vid_src;
} elseif (isset($links)) {
    $video_src = $links;
} else {
    $video_src = 'https://youtu.be/60VYXd9RVJ0';
}

// textreview
if(isset($source['email']))
{
    $email=$source['email'];
}
if(isset($source['city']))
{
    $city=$source['city'];
}
if(isset($source['homepage']))
{
    $hp=$source['homepage'];
    function remove_http($hp) {
        $disallowed = array('http://', 'https://', 'www.');
        foreach($disallowed as $d) {
            if(strpos($hp, $d) === 0) {
                return str_replace($d, '', $hp);
            }
        }
        return $hp;
    }
    $hp = remove_http($hp);
    $homepage = "https://".$hp;

}

if(isset($source['textreview']) && isset($file))
{
    $tmp_dir = '/tmp/rf-'.$uniq.'/avatar/';
    $uploads_dir = '/images/reviews/avatar/';

    $avatar = basename($file);
    copy($root.$tmp_dir.$avatar, $root.$uploads_dir.$uniq.$avatar);
    $avatar_src = $uploads_dir.$uniq.$avatar;
} else {
    $avatar_src = '/images/avatar_default.png';
}
if(isset($source['comment']))
{
    $comment=$source['comment'];
}

$date = date("d.m.Y");

if(isset($source['videoreview'])) {
    $html = '<div uk-grid><div class="uk-width-1-5@m"><div class="uk-card uk-card-primary"><div class="uk-card-header"><h3 class="uk-card-title">'.$name.'</h3></div><div class="uk-card-body"><p class="uk-text-small tm-italic">'.$review.'</p></div><div class="uk-card-footer"><p class="uk-text-right tm-date">'.$date.'</p></div></div></div><div class="uk-width-4-5@m"><iframe src="'.$video_src.'" width="854" height="480" frameborder="0" allowfullscreen uk-responsive uk-video="automute: true"></iframe></div></div>';
}

if(isset($source['textreview'])) {
    $html = '<div class="" uk-grid>';
    $html .= '<div class="uk-width-1-6@s comment-avatar"><img height="250px" data-src="'.$avatar_src.'" uk-img /></div>';
        $html .= '<div class="uk-width-expand@s tm-comment">';
            $html .= '<div class="uk-position-relative">';
                $html .= '<span class="uk-position-center-left-out tm-comment-arrow" uk-icon="icon: triangle-left; ratio: 2"></span>';
                $html .= '<div class="rbox uk-card uk-card-secondary">';
                    $html .= '<div class="comment-head uk-card-header">';
                        $html .= '<div class="comment-author-date uk-child-width-expand@s" uk-grid>';
                            $html .= '<div>';
                                if(isset($homepage)){
                                    $html .= '<a href="'.$homepage.'" class="author-homepage uk-icon-button" rel="nofollow" title="'.$name.'" target="_blank">';
                                        $html .= '<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="vk-button" d="M19.9,14.6c0-0.1,0-0.1-0.1-0.1c-0.3-0.6-1-1.4-2-2.3l0,0l0,0l0,0h0c-0.4-0.4-0.7-0.7-0.8-0.9c-0.2-0.3-0.3-0.6-0.1-0.8
                                            c0.1-0.2,0.4-0.7,0.9-1.4c0.3-0.4,0.5-0.7,0.7-0.9c1.2-1.6,1.7-2.6,1.6-3.1L19.9,5c0-0.1-0.1-0.1-0.3-0.2c-0.2-0.1-0.4-0.1-0.7,0
                                            l-3,0c0,0-0.1,0-0.2,0c-0.1,0-0.1,0-0.1,0l-0.1,0l0,0c0,0-0.1,0.1-0.1,0.1c0,0.1-0.1,0.1-0.1,0.2c-0.3,0.8-0.7,1.6-1.1,2.3
                                            c-0.3,0.4-0.5,0.8-0.7,1.1C13.2,9,13,9.2,12.9,9.4c-0.1,0.1-0.3,0.3-0.4,0.4c-0.1,0.1-0.2,0.1-0.3,0.1c-0.1,0-0.1,0-0.2,0
                                            c-0.1-0.1-0.2-0.1-0.2-0.3c-0.1-0.1-0.1-0.2-0.1-0.4c0-0.2,0-0.3,0-0.4c0-0.1,0-0.3,0-0.5c0-0.2,0-0.4,0-0.4c0-0.3,0-0.6,0-0.9
                                            c0-0.3,0-0.6,0-0.7c0-0.2,0-0.4,0-0.6c0-0.2,0-0.4,0-0.5c0-0.1-0.1-0.2-0.1-0.3c0-0.1-0.1-0.2-0.2-0.2c-0.1-0.1-0.2-0.1-0.3-0.1
                                            c-0.4-0.1-0.8-0.1-1.4-0.1c-1.3,0-2.1,0.1-2.5,0.3C7,4.6,6.9,4.7,6.7,4.9C6.6,5,6.6,5.1,6.7,5.1c0.4,0.1,0.7,0.2,0.9,0.4l0.1,0.1
                                            c0,0.1,0.1,0.2,0.1,0.5c0,0.2,0.1,0.5,0.1,0.8c0,0.5,0,0.9,0,1.3c0,0.4-0.1,0.6-0.1,0.8c0,0.2-0.1,0.4-0.1,0.5
                                            C7.6,9.7,7.5,9.8,7.5,9.8c0,0,0,0-0.1,0.1c-0.1,0-0.2,0.1-0.3,0.1c-0.1,0-0.2,0-0.4-0.1C6.7,9.6,6.5,9.5,6.4,9.3
                                            C6.2,9.2,6.1,8.9,5.9,8.6C5.7,8.3,5.5,8,5.3,7.5L5.1,7.2C5,7,4.9,6.8,4.7,6.4C4.5,6,4.4,5.7,4.2,5.3C4.2,5.2,4.1,5.1,4,5L3.9,5
                                            c0,0-0.1-0.1-0.2-0.1c-0.1,0-0.2-0.1-0.2-0.1l-2.9,0C0.4,4.8,0.2,4.9,0.1,5l0,0.1c0,0,0,0.1,0,0.2c0,0.1,0,0.2,0.1,0.3
                                            c0.4,1,0.9,1.9,1.4,2.8s0.9,1.6,1.3,2.2c0.4,0.6,0.7,1.1,1.1,1.6c0.4,0.5,0.6,0.8,0.7,0.9c0.1,0.1,0.2,0.2,0.3,0.3l0.3,0.2
                                            c0.2,0.2,0.4,0.4,0.7,0.6c0.3,0.2,0.7,0.5,1.1,0.7c0.4,0.2,0.8,0.4,1.4,0.6c0.5,0.1,1,0.2,1.5,0.2H11c0.2,0,0.4-0.1,0.6-0.2l0-0.1
                                            c0,0,0.1-0.1,0.1-0.2c0-0.1,0-0.2,0-0.3c0-0.3,0-0.6,0.1-0.8c0.1-0.2,0.1-0.4,0.2-0.5c0.1-0.1,0.1-0.2,0.2-0.3
                                            c0.1-0.1,0.1-0.1,0.2-0.2c0,0,0.1,0,0.1,0c0.2-0.1,0.4,0,0.6,0.2c0.2,0.2,0.4,0.4,0.6,0.6c0.2,0.2,0.4,0.5,0.7,0.8
                                            c0.3,0.3,0.5,0.5,0.7,0.7l0.2,0.1c0.1,0.1,0.3,0.2,0.5,0.2c0.2,0.1,0.4,0.1,0.6,0.1l2.7,0c0.3,0,0.5,0,0.6-0.1
                                            c0.1-0.1,0.2-0.2,0.3-0.3c0-0.1,0-0.2,0-0.4C19.9,14.7,19.9,14.7,19.9,14.6z"></path></svg>';
                                    $html .= '</a>';
                                }
                                $html .= '<span class="uk-margin-small-left tm-author tm-regular">';
                                if(isset($homepage)){
                                    $html .= '<a href="'.$homepage.'" class="uk-link-text" rel="nofollow" title="'.$name.'" target="_blank">';
                                }
                                    $html .= $name;
                                if(isset($homepage)){
                                    $html .= '</a>';
                                }
                                $html .= '</span>';
                            $html .= '</div>';
                            $html .= '<div class="anchor-vote uk-display-inline-block uk-float-right">';
                                $html .= '<div class="comment-date uk-text-right@s"><span uk-icon="icon: clock; ratio: 0.8"></span>';
                                $html .= date("d.m.Y");
                                $html .= '</div>';
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';
                    $html .= '<div class="comment-box uk-card-body">';
                        $html .= '<div class="comment-body">';
                            $html .= '<div class="comment-title">'.$city.'</div>';
                        $html .= $comment;
                        $html .= '</div>';
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';
}

//$userid = JFactory::getUser()->guest ? 900 : JFactory::getUser()->id;

$user = JFactory::getUser();
$isroot = $user->authorise('core.admin');
if ($isroot) {
    $userid = "17";
} else {
    $userid = "21";
}


$article = JTable::getInstance('content');

$article->title = $name . ': '. date("d.m.Y H:i:s");

// Set alias
if (trim($article->alias) == '')
{
    $article->alias = $article->title.$uniq;
}

$article->alias = JApplicationHelper::stringURLSafe($article->alias, $article->language);

if (trim(str_replace('-', '', $article->alias)) == '')
{
    $article->alias = JFactory::getDate()->format('Y-m-d-H-i-s').$uniq;
}

$article->language = '*';

$article->introtext = $html;
$article->catid = 9;
$article->created = JFactory::getDate()->toSQL();  //2019-02-22 20:19:18
$article->created_by = $userid;
if (!$isroot) {
    $article->created_by_alias = 'GUEST';
}
$article->state = 1;
$article->access = 1;
$article->images = '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}';
$article->urls = '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}';
$article->attribs = '{"article_layout":"","show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","info_block_show_title":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_associations":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_page_title":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';
$article->metadata = '{"robots":"","author":"","rights":"","xreference":""}';

/*$article->check();
if (!$article->check()) {
    return FALSE;
}*/

$article->store();
/*if (!$article->store(TRUE)) {
    return FALSE;
}*/

