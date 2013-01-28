<?php
include 'class/zip.class.php';
#Declare your variables
define('CURDIR', getcwd());
define('buildFolder', '/build'); //Make sure the folder exists first. If not...
if(!is_dir(CURDIR . buildFolder))
	mkdir(CURDIR . buildFolder);

$version = $_GET['version']; // Defines the version in the build file
$branch = $_GET['branch']; // Goes in Alpha, Beta, RC, etc branch
$stable = $_GET['stable'] ? 'stable' : 'unstable'; //If it is unstable or stable. I will show later in the documentation how to determine this
$product = $_GET['product']; //You can make this a constant if you want.

/*DOCUMENTATION

First you should put versioning.php in your root folder or the folder that you would like to make versions for. 
Then if you are using a web browser to complete this task, then visit this link but replace most of the info:

http://localhost/folder/versioning.php?version=1.0.0.0&branch=alpha&stable=1&product=HF

If you are this through the command line:

php versioning.php?version=1.0.0.0&branch=alpha&stable=1&product=HF

You can check your zip files in the build folder. 
*/

$filename = $product . '_' . $version . '_' . $branch . '_' . $stable . '.zip'; //Complete filename

if(isset($version, $branch, $product, $stable))
{
	HZip::zipDir(CURDIR, CURDIR . buildFolder . '/' . $filename)
	print ucfirst($product) . ' has been versioned at ' . $version . ' for the ' . $branch . ' and is currently ' . $stable . '.';
}

else
{
	print 'Something went wrong with the build. Check your URL to make sure you didn\'t leave out a GET parameter. ';
}

?>