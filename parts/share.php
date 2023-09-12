<?php
  //default
  $url        = get_permalink();
  $title      = strip_tags(get_the_title());
  $sitename   = get_bloginfo('name');

  //encoded
  $u = urlencode($url);
  $t = urlencode($title).'｜'.urlencode($sitename);
?>
<div class="share-area">
  <ul>
    <li>
      <a href="//twitter.com/intent/tweet?url=<?php echo $u; ?>&text=<?php echo $t; ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="fab fa-twitter"></i></a>
    </li>
    <li>
      <a href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $u;?>&t=<?php echo $t;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="fab fa-facebook-f"></i></a>
    </li>
    <li>
      <a href="https://social-plugins.line.me/lineit/share?url=<?php echo $u;?>" target="_blank"><i class="fab fa-line"></i></a>
    </li>
    <li>
      <a class="copy_btn" data-clipboard-text="<?php echo $title . ' | ' . $sitename . ' ' . $url; ?>"><i class="fas fa-link"></i></a>
    </li>
  </ul>
</div>