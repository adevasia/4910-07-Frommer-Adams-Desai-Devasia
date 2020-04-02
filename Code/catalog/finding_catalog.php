<?php
include('../server.php');
//--------------Sponsor's catalog---------------------------//

// initializing variables
$category1 = "";
$category2 = "";
$category3 = "";
$category4 = ""; 
$categoryArr = array();
$maxPrice = "";
$minPrice = "";

// connect to the database
$db = mysqli_connect("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

// check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

// Store the categories into the database
if (isset($_POST['sponsor_done'])) {
	/*
	$username = $_SESSION['username'];
	
	$user_id = "SELECT id FROM users WHERE username='$username'";
	$company_id = "SELECT id FROM company WHERE name='Taco Bell'"; 	
	$query = "INSERT INTO users_has_company (users_id, company_id) VALUES('$user_id','$company_id')";
	//mysqli_query($db, $query);
	*/
	
	$categoryArr = $_POST["Category"];	
	$_SESSION['category1'] = $categoryArr[0];
	$_SESSION['category2'] = $categoryArr[1];
	$_SESSION['category3'] = $categoryArr[2];
	$_SESSION['category4'] = $categoryArr[3];
	
	$_SESSION['maxPrice'] = $_POST["Max"];
	$_SESSION['minPrice'] = $_POST["Min"];

	
	$category1 = $categoryArr[0];
	$category2 = $categoryArr[1];
	$category3 = $categoryArr[2];
	$category4 = $categoryArr[3];
	
	/*
	$company_id = "SELECT id FROM company WHERE name='$company_name'";
	
	$query = "UPDATE company SET name = '$company_name', categoryone='$category1',categorytwo='$category2',categorythree='$category3',categoryfour='$category4' WHERE ID=$company_id"; 
	*/
	/*
	$query = "INSERT INTO company (name, categoryone, categorytwo, categorythree, categoryfour) VALUES('$company_name',$category1','$category2','$category3','$category4')";
	  */
	mysqli_query($db, $query);
	header('location: ../catalog/catalog_home.php');
}



//-------------------------Finding API--------------------///


error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call for finding api
$shop_endpoint = 'http://open.api.ebay.com/shopping';


$version = '1.0.0';  // API version supported by your application
$appid = 'AliciaDe-Finding-PRD-0ca8111fb-2e400c91';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)



$min = $_SESSION['minPrice'];
$max = $_SESSION['maxPrice'];

// Create a PHP array of the item filters you want to use in your request
$i = '0';  // Initialize the item filter index to 0
$filterarray =
  array(
    array(
    'name' => 'MaxPrice',
    'value' => $max,
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
	array(
    'name' => 'MinPrice',
    'value' => $min,
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
    array(
    'name' => 'FreeShippingOnly',
    'value' => 'true',
    'paramName' => '',
    'paramValue' => ''),
    array(
    'name' => 'ListingType',
    'value' => array('AuctionWithBIN','FixedPrice'),
    'paramName' => '',
    'paramValue' => ''),
  );
// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
    global $urlfilter;
    global $i;
    // Iterate through each filter in the array
    foreach($filterarray as $itemfilter) {
      // Iterate through each key in the filter
      foreach ($itemfilter as $key =>$value) {
        if(is_array($value)) {
          foreach($value as $j => $content) { // Index the key for each value
            $urlfilter .= "&itemFilter($i).$key($j)=$content";
          }
        }
        else {
          if($value != "") {
            $urlfilter .= "&itemFilter($i).$key=$value";
          }
        }
      }
      $i++;
    }
    return "$urlfilter";
  } // End of buildURLArray function
  
  // Build the indexed item filter URL snippet
buildURLArray($filterarray);


// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";

$cat_now = "";

	$query= $_SESSION['category1'];   // You may want to supply your own query
	$safequery = urlencode($query);  // Make the query URL-friendly
	$apicall .= "&keywords=$safequery";

//Searching 
if (isset($_POST['search'])) {
	$query= $_POST['search2'];   // You may want to supply your own query
	$safequery = urlencode($query);  // Make the query URL-friendly
	$apicall .= "&keywords=$safequery";
}

//Categories 
if(isset($_POST['cat'])){
	$query = $_POST['cat'];
	$safequery = urlencode($query);  // Make the query URL-friendly
	$apicall .= "&keywords=$safequery";
}


	$apicall .= "&paginationInput.entriesPerPage=25";
	
	$apicall .= "$urlfilter";
	
	// Load the call and capture the document returned by eBay API
	$resp = simplexml_load_file($apicall);
	// Check to see if the request was successful, else print an error
	if ($resp->ack == "Success") {
		$results = '';
		$i = 0;
			foreach($resp->searchResult->item as $item){
				$pic   = $item->galleryURL;
				$link  = $item->viewItemURL;
				$title = $item->title;
				$category = $item->condition->conditionDisplayName;
				$price = "$";
				$price .= $item->sellingStatus->convertedCurrentPrice;
				$shippingInfo = $item->shippingInfo->shippingType;
				$shippingInfo .= " Shipping";
			//	$available = $item->listingInfo->buyItNowAvailable;

				$results .= "<tr>
							 <td><img src=\"$pic\"></td>
							 <td><a href=\"$link\">$title</a><br>
							 $price<br>$category<br>$shippingInfo
							</td></tr>";
				$i++;

			}
	}
	// If the response does not indicate 'Success,' print an error
	else {
		$results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
		$results .= "AppID for the Production environment.</h3>";
	}
?>