<?php
error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

// API request variables
$endpoint = 'http://open.api.ebay.com/shopping';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'AliciaDe-PRD-0ca8111fb-2e400c91';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)



      
$testing = 'in shopping api';
// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&callname={'findItemsByCategory'}";
$apicall .= "&responseencoding=JSON";
$apicall .= "&siteid=0";
$apicall .= "&version=1099";
$apicall .= "&categoryId={'Smart Watch'}";
        $apicall .= "&outputSelector(0)=SellerInfo";
        $apicall .= "&outputSelector(1)=GalleryInfo";

        $apicall .= "&itemFilter(0).name=HideDuplicateItems";
        $apicall .= "&itemFilter(0).value=1";
$apicall .= "$urlfilter";


// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $shop_results = '';
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;

    // For each SearchResultItem node, build a link and append it to $shop_results
    $shop_shop_results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td></tr>";
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $shop_results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $shop_results .= "AppID for the Production environment.</h3>";
}

?>