<?php
$cid = $_GET['cid'];
?>
<h2>Playing Video</h2>
<video controls autoplay width="640">
  <source src="http://192.168.50.103:8080/ipfs/<?php echo htmlspecialchars($cid); ?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
