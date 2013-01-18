// from http://davidwalsh.name/github-markdown

/* gets url */
function get_content_from_github($url) {
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
  $content = curl_exec($ch);
  curl_close($ch);
  return $content;
}

/* static settings */
$plugin = 'Overlay';
$cache_path = $_SERVER['DOCUMENT_ROOT'].'/plugin-cache/';
$cache_file = $plugin.'-github.txt';
$github_json = get_repo_json($cache_path.$cache_file,$plugin);

/* gets the contents of a file if it exists, otherwise grabs and caches */
function get_repo_json($file,$plugin) {
  //vars
  $current_time = time(); $expire_time = 24 * 60 * 60; $file_time = filemtime($file);
  //decisions, decisions
  if(file_exists($file) && ($current_time - $expire_time < $file_time)) {
    //echo 'returning from cached file';
    return json_decode(file_get_contents($file));
  }
  else {
    $json = array();
    $json['repo'] = json_decode(get_content_from_github('http://github.com/api/v2/json/repos/show/darkwing/'.$plugin),true);
    $json['commit'] = json_decode(get_content_from_github('http://github.com/api/v2/json/commits/list/darkwing/'.$plugin.'/master'),true);
    $json['readme'] = json_decode(get_content_from_github('http://github.com/api/v2/json/blob/show/darkwing/'.$plugin.'/'.$json['commit']['commits'][0]['parents'][0]['id'].'/Docs/'.$plugin.'.md'),true);
    $json['js'] = json_decode(get_content_from_github('http://github.com/api/v2/json/blob/show/darkwing/'.$plugin.'/'.$json['commit']['commits'][0]['parents'][0]['id'].'/Source/'.$plugin.'.js'),true);
    file_put_contents($file,json_encode($json));
    return $content;
  }
}



function github_test() {
/* build json */
if($github_json) {
  
  //get markdown
  include($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/walshbook3/PHP-Markdown-Extra-1.2.4/markdown.php');
  
  //build content
  $content = '<p>'.$github_json['repo']['repository']['description'].'</p>';
  $content.= '<h2>MooTools JavaScript Class</h2><pre class="js">'.$github_json['js']['blob']['data'].'</pre>';
  $content.= trim(str_replace(array('<code>','</code>'),'',Markdown($github_json['readme']['blob']['data'])));
}
return $content
}
