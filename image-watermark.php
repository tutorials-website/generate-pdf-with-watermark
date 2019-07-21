<?php

// Include autoloader 
require_once 'dompdf/autoload.inc.php';

// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
// Reference the Options namespace 
use Dompdf\Options; 
 
// Set options to enable embedded PHP 
$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 
 
// Instantiate dompdf class 
$dompdf = new Dompdf($options); 
 
// Load HTML content 
$dompdf->loadHtml('<h3>https://www.TutorialsWebsite.com</h3><center><h1>Welcome to Tutorials Website</h1><div class="wpb_wrapper">
			<p><strong>Tutorialswebsite</strong> is a leading online education portal that helps technologies, software, business and creative skills readers to learn new skills at their own place from the comforts of their drawing rooms. Individual, corporate and academic members have access to learn anything on <a href="https://www.tutorialswebsite.com">tutorialswebsite.com</a> likes video tutorials, blogs content etc.</p>
<p>From 5 years, we worked our way to adding new fresh articles on topics ranging from programming languages that helps students, leaders, IT and design professionals, project managers or anyone who is working with software development, creatives and business skills.</p>
<h2 style="text-align: center;">Mission</h2>
<p>Our mission is to deliver easy and best online resources on programming and web development to encourage our readers acquire as many skills as they would like to. We offer the useful and best tutorials for web professionals-developers, programmers, freelancer free of cost. We don’t force our readers to sign up with us or submit their details.</p>

		</div><h2 style="font-size: 24px;text-align: center;font-family:Roboto;font-weight:700;font-style:normal" class="vc_custom_heading">About Author</h2>
	<p>
<strong><a href="https://www.pradeepmaurya.in/">Pradeep Maurya</a></strong> is the Professional Web Developer and Founder of &nbsp;<a href="https://www.tutorialswebsite.com">“Tutorialswebsite”</a>. He lives in Delhi and loves to be a self dependent person. As an author, he is trying his best to improve this platform day by day.
You can contact him <strong><a href="https://www.facebook.com/erpradeepmauryarkt" target="_blank" rel="noopener noreferrer">@facebook</a></strong><strong>Website:</strong> <a href="https://www.pradeepmaurya.in" target="_blank" rel="noopener noreferrer">https://www.pradeepmaurya.in</a></p></center>
'); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', ''); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Instantiate canvas instance 
$canvas = $dompdf->getCanvas(); 
 
// Get height and width of page 
$w = $canvas->get_width(); 
$h = $canvas->get_height(); 
 
// Specify watermark image 
$imageURL = 'tutorials-website-logo.png'; 
$imgWidth = 500; 
$imgHeight = 250; 
 
// Set image opacity 
$canvas->set_opacity(.5); 
 
// Specify horizontal and vertical position 
$x = (($w-$imgWidth)/2); 
$y = (($h-$imgHeight)/3); 
 
// Add an image to the pdf 

/** 
 * Add an image to the pdf. 
 * 
 * The image is placed at the specified x and y coordinates with the 
 * given width and height. 
 * 
 * @param string $img_url the path to the image 
 * @param float $x x position 
 * @param float $y y position 
 * @param int $w width (in pixels) 
 * @param int $h height (in pixels) 
 * @param string $resolution The resolution of the image 
 */ 
$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight,$resolution = "normal"); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream('document.pdf', array("Attachment" => 0));