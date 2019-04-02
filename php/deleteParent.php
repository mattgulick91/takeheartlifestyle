<?php
//Get title of current blog
$currentBlogName = $_POST['title'];

//Get content of current blog using title
$html = file_get_contents('../pages/blogs/'.$currentBlogName.'.php');

$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($html);

//Get id of parent node
$parentId = $_POST['parent-id'];

$xPath = new DOMXPath($dom);
$nodes = $xPath->query('//*[@id=' . $parentId . ']');

//Remove child if it's the first child of parentNode
if($nodes->item(0)) {
    $nodes->item(0)->parentNode->removeChild($nodes->item(0));
}

$newContent = $dom->saveHTML();

file_put_contents('../pages/blogs/'.$currentBlogName.'.php', $newContent);

header('Location: ../pages/blogs/'.$currentBlogName.'.php');
 ?>
