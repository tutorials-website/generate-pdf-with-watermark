<?php
// Include autoloader 
require_once 'dompdf/autoload.inc.php';
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
// Reference the Options namespace 
use Dompdf\Options; 
// Reference the Font Metrics namespace 
use Dompdf\FontMetrics; 
 
// Set options to enable embedded PHP 
$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 
 
// Instantiate dompdf class 
$dompdf = new Dompdf($options); 
 
// Load HTML content 
$dompdf->loadHtml('<img class="alignleft" src="./tutorials-website-logo.png" alt="Pradeep Maurya" width="100%"><center><h1>Welcome to Tutorials Website</h1><div class="wpb_wrapper">
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
 
// Instantiate font metrics class 
$fontMetrics = new FontMetrics($canvas, $options); 
 
// Get height and width of page 
$w = $canvas->get_width(); 
$h = $canvas->get_height(); 
 
// Get font family file 
$font = $fontMetrics->getFont('times'); 
 
// Specify watermark text 
$text = "https://www.tutorialswebsite.com"; 
 
// Get height and width of text 
$txtHeight = $fontMetrics->getFontHeight($font, 150); 
$textWidth = $fontMetrics->getTextWidth($text, $font, 40); 
 
// Set text opacity 
$canvas->set_opacity(.2); 
 
// Specify horizontal and vertical position 
$x = (($w-$textWidth)/2); 
$y = (($h-$txtHeight)/2); 
 
 /** 
 * Writes text at the specified x and y coordinates. 
 * 
 * @param float $x 
 * @param float $y 
 * @param string $text the text to write 
 * @param string $font the font file to use 
 * @param float $size the font size, in points 
 * @param array $color 
 * @param float $word_space word spacing adjustment 
 * @param float $char_space char spacing adjustment 
 * @param float $angle angle 
 */ 
 
// Writes text at the specified x and y coordinates 
$canvas->text($x, $y, $text, $font, 40,$color = array(255,0,0), $word_space = 0.0, $char_space = 0.0, $angle = 20.0); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream('document.pdf', array("Attachment" => 0));