<?php
/** create XML file */ 
$mysqli = new mysqli("localhost", "root", "root", "blog");
/* check connection */
if ($mysqli->connect_errno) {
   echo "Connect failed ".$mysqli->connect_error;
   exit();
}
$query = "select * from blog_posts";
$booksArray = array();
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       array_push($booksArray, $row);
    }
  
    if(count($booksArray)){
         createXMLfile($booksArray);
     }
    /* free result set */
    $result->free();
}
/* close connection */
$mysqli->close();
function createXMLfile($booksArray){
  
   $filePath = 'links.xml';
   $dom     = new DOMDocument('1.0', 'utf-8'); 
   $root      = $dom->createElement('pages'); 
   for($i=0; $i<count($booksArray); $i++){
       
     $bookName = htmlspecialchars($booksArray[$i]['postTitle']);
     //$bookAuthor    =  $booksArray[$i]['postDesc']; 
	 $url= htmlspecialchars($booksArray[$i]['postID']);
	 $bookAuthor    =  'viewpost.php?id='.$url; 
	 //echo $bookAuthor;
     $book = $dom->createElement('link');
     $name     = $dom->createElement('title', $bookName); 
     $book->appendChild($name); 
     $author   = $dom->createElement('url', $bookAuthor); 
     $book->appendChild($author);
 
     $root->appendChild($book);
   }
   $dom->appendChild($root); 
   $dom->save($filePath); 
   //echo $dom->saveXML();
 } 