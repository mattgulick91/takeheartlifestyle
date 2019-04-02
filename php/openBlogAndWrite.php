<?php

//Open current blog, write POST data to new div that appends as a child to blog-content div

$currentBlog = $_POST['current-blog'];
$html = file_get_contents("../pages/blogs/".$currentBlog.'.php');
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($html);
$uniqueId = time();

//Create new div with unique id and append to blog-content div
$appendTo = $doc->getElementById('blog-content');
$newNode = $doc->createElement('div');
$newNode->setAttribute('id', $uniqueId);
$appendTo->appendChild($newNode);

//append POST data to new div
$fragment = $doc->createDocumentFragment();
$fragment->appendXML($_POST['editor1']);
$newNode->appendChild($fragment);

//append a form to div
$formNode = $doc->createElement('form');
$formNode->setAttribute('action', '../../php/deleteParent.php');
$formNode->setAttribute('method', 'post');
$newNode->appendChild($formNode);

//append delete button to div
$inputNode = $doc->createElement('input');
$inputNode->setAttribute('type', 'submit');
$inputNode->setAttribute('class', 'btn btn-danger mb-3');
$inputNode->setAttribute('value', 'Delete');
$formNode->appendChild($inputNode);

//append hidden value with the unique div id
$inputTwoNode = $doc->createElement('input');
$inputTwoNode->setAttribute('type', 'hidden');
$inputTwoNode->setAttribute('name', 'parent-id');
$inputTwoNode->setAttribute('value', $uniqueId);
$formNode->appendChild($inputTwoNode);

//append hidden value with current blog title
$inputThreeNode = $doc->createElement('input');
$inputThreeNode->setAttribute('type', 'hidden');
$inputThreeNode->setAttribute('name', 'title');
$inputThreeNode->setAttribute('value', $currentBlog);
$formNode->appendChild($inputThreeNode);

//save current blog
 echo $doc->saveHTMLFile('../pages/blogs/'.$currentBlog.'.php');

//clear out POST data
 $_POST['editor1'] = array();

//redirect to current blog
 header('Location: ../pages/blogs/'.$currentBlog.'.php');
 ?>
