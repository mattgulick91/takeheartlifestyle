<?php

//Append an image to blog-content div

$blogTitle = $_POST['current-blog-image'];
$html = file_get_contents('../pages/blogs/'.$blogTitle.'.php');
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($html);
$uniqueId = time();

//append new div with unique id to blog-content div
$appendTo = $doc->getElementById('blog-content');
$newNode = $doc->createElement('div');
$newNode->setAttribute('id', $uniqueId);
$appendTo->appendChild($newNode);

//create an image tag with POST data as source and append to div
$imageNode = $doc->createElement('img');
$imageNode->setAttribute('src', $_POST['fileName']);
$imageNode->setAttribute('class', 'img-fluid');
$newNode->appendChild($imageNode);

//append a form to div
$formNode = $doc->createElement('form');
$formNode->setAttribute('action', '../../php/deleteParent.php');
$formNode->setAttribute('method', 'post');
$newNode->appendChild($formNode);

//append delete button to div
$inputNode = $doc->createElement('input');
$inputNode->setAttribute('type', 'submit');
$inputNode->setAttribute('class', 'btn btn-danger');
$inputNode->setAttribute('value', 'Delete');
$formNode->appendChild($inputNode);

//append hidden value with unique id to div
$inputTwoNode = $doc->createElement('input');
$inputTwoNode->setAttribute('type', 'hidden');
$inputTwoNode->setAttribute('name', 'parent-id');
$inputTwoNode->setAttribute('value', $uniqueId);
$formNode->appendChild($inputTwoNode);

//append hidden value with current blog title to div
$inputThreeNode = $doc->createElement('input');
$inputThreeNode->setAttribute('type', 'hidden');
$inputThreeNode->setAttribute('name', 'title');
$inputThreeNode->setAttribute('value', $blogTitle);
$formNode->appendChild($inputThreeNode);

//save current blog file
echo $doc->saveHTMLFile('../pages/blogs/'.$blogTitle.'.php');

//clear out POST data
$_POST['fileName'] = array();
$_POST['editor1'] = array();

//redirect to current blog
header('Location: ../pages/blogs/'.$blogTitle.'.php');
?>
