<?php
$videos = [
  "Music Video" => "QmVV1aurU6ZrTULffxpVPRcmQagiB2fP4RK6gdqeFo8KmA"
];
?>
<h2>Stored Videos</h2>
<ul>
<?php foreach($videos as $title => $cid): ?>
  <li>
    <?php echo htmlspecialchars($title); ?> -
    <a href="play.php?cid=<?php echo urlencode($cid); ?>">Play</a> |
    <a href="http://192.168.50.102:8080/ipfs/<?php echo $cid; ?>" target="_blank">IPFS Link</a>
  </li>
<?php endforeach; ?>
</ul>
<h2>Live Stream</h2>
<video id="liveVideo" controls autoplay width="640" height="360"></video>
<script src="/hls.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var video = document.getElementById('liveVideo');
    var videoSrc = 'http://192.168.50.102/stream.m3u8';
    if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
        hls.on(Hls.Events.MANIFEST_PARSED, function() {
            video.play();
        });
    } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
        video.src = videoSrc;
        video.addEventListener('loadedmetadata', function() {
            video.play();
        });
    } else {
        video.outerHTML = '<div>Your browser does not support HLS live streaming.</div>';
    }
});
</script>

